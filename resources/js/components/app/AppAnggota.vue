<template>
  <div class="anggota-area portfolio-page section-gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row justify-content-center">
            <div
              v-for="(anggota, i) in anggotas.data"
              :key="i"
              class="col-md-6 about-contnent wow fadeInUp"
              data-wow-delay="0.3s"
            >
              <div class="latest-news-box mt-30">
                <div class="post-thumb text-center">
                  <img v-lazy="`/uploads/${anggota.ktp_image}`" style="max-height: 100%; max-width: 100%; width: auto; height: 20vw;"/>
                </div>
                <div class="post-content">
                  <ul class="post-meta">
                    <li>
                      <span>By {{anggota.user}},</span>
                    </li>
                    <li>
                      <span>{{ anggota.created_at | timeFormat }}</span>
                    </li>
                  </ul>
                  <h4 class="title">
                    <router-link
                      router-link
                      :to="{ name: 'AnggotaDetails', params: { slug: anggota.slug } }"
                    >
                      {{
                        anggota.nama && anggota.nama.length > 40
                          ? anggota.nama.substring(0, 40) + "..."
                          : anggota.nama
                      }}
                    </router-link>
                  </h4>
                  <router-link
                    router-link
                    :to="{ name: 'AnggotaDetails', params: { slug: anggota.slug } }"
                    class="read-more-btn"
                    >{{ $t("Read More") }}
                    <i class="fal fa-long-arrow-right"></i
                  ></router-link>
                </div>
              </div>
            </div>
          </div>
          <template v-if="anggotas.meta">
            <div class="row" v-if="anggotas.meta.total > 6">
              <div class="col-lg-12 text-center" v-if="anggotas.meta">
                <el-pagination
                  class="text-center mt-4"
                  background
                  @current-change="handleCurrentChange"
                  :current-page.sync="currentPage"
                  :page-size="anggotas.meta.per_page"
                  layout="prev, pager, next"
                  :total="anggotas.meta.total"
                >
                </el-pagination>
              </div>
            </div>
          </template>
        </div>
        <div class="col-lg-4 anggota-sidebar order-first order-lg-last">
          <div class="widget search-widget">
            <h4 class="widget-title">{{ $t("Search Anggota") }}</h4>
            <div class="input-box">
              <input
                name="term"
                type="text"
                :placeholder="`${$t('Search Anggota...')}`"
                value=""
                v-model="anggotaSearchText"
                @keyup="anggotaBySearch"
              />
            </div>
          </div>
          <div class="widget categories-widget">
            <h4 class="widget-title">{{ $t("All Categories") }}</h4>
            <ul>
              <li>
                <a
                  @click.prevent="resortAllAnggota"
                  :class="currentBcategory == '' ? 'active' : ''"
                  href="#"
                  class=""
                  >{{ $t("All") }}
                </a>
              </li>
              <li v-for="(bcategory, i) in bcategories" :key="i">
                <a
                  href="#"
                  :class="currentBcategory == bcategory.slug ? 'active' : ''"
                  @click.prevent="anggotaByCategory(bcategory.slug)"
                  class=""
                  >{{ bcategory.name }}</a
                >
              </li>
            </ul>
          </div>
          <div class="widget social-links">
            <h4 class="widget-title">{{ $t("Never Miss News") }}</h4>
            <ul>
              <li v-for="(socialLink, i) in socialLinks" :key="i">
                <a :href="socialLink.url"><i :class="socialLink.icon"></i></a>
              </li>
            </ul>
          </div>
          <div></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  data() {
    return {
      currentPage: 1,
      currentBcategory: "",
      number: [],
      anggotaSearchText: "",
    };
  },
  methods: {
    ...mapActions({
      getBcategories: "index/getBcategories",
    }),
    getAnggotas() {
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        category: this.currentBcategory,
        search: this.anggotaSearchText,
      });
    },
    handleCurrentChange() {
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        category: this.currentBcategory,
        search: this.anggotaSearchText,
      });
    },
    anggotaByCategory(bcategory) {
      this.currentBcategory = bcategory;
      this.currentPage = 1;
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        category: this.currentBcategory,
        search: this.anggotaSearchText,
      });
    },
    anggotaBySearch() {
      this.currentPage = 1;
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        category: this.currentBcategory,
        search: this.anggotaSearchText,
      });
    },
    resortAllAnggota() {
      this.currentPage = 1;
      this.currentBcategory = "";
      this.anggotaSearchText = "";
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        category: this.currentBcategory,
        search: this.anggotaSearchText,
      });
    },
  },
  computed: {
    ...mapGetters({
      anggotas: "index/getAnggotas",
      bcategories: "index/getBcategories",
      socialLinks: "index/getSocialLinks",
    }),
  },
  created() {
    this.getAnggotas();
    this.getBcategories();
  },
};
</script>



