<template>
  <div class="blog-area portfolio-page section-gap">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="row justify-content-center" v-if="anggotas.data.length > 0">
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
                      <span>By {{anggota.user_name}},</span>
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
          <div class="row justify-content-center" v-else>
            <h2>Data Tidak Ditemukan</h2>
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
        <div class="col-lg-4 blog-sidebar order-first order-lg-last">
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
            <h4 class="widget-title">{{ $t("Kecamatan") }}</h4>
            <ul>
              <li>
                <a
                  @click.prevent="resortAllAnggota"
                  :class="currentKecamatan == '' ? 'active' : ''"
                  href="#"
                  class=""
                  >{{ $t("All") }}
                </a>
              </li>
              <li v-for="(bkecamatan, i) in bkecamatans" :key="i">
                <a
                  href="#"
                  :class="currentKecamatan == bkecamatan.kecamatan ? 'active' : ''"
                  @click.prevent="anggotaByCategory(bkecamatan.kecamatan)"
                  class=""
                  >{{ bkecamatan.kecamatan }}</a
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
      currentKecamatan: "",
      number: [],
      anggotaSearchText: "",
      bkecamatans: []
    };
  },
  methods: {
    ...mapActions({
      getBcategories: "index/getBcategories",
    }),
    getAnggotas() {
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        kecamatan: this.currentKecamatan,
        search: this.anggotaSearchText,
      });
    },
    handleCurrentChange() {
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        kecamatan: this.currentKecamatan,
        search: this.anggotaSearchText,
      });
    },
    anggotaByCategory(bkecamatan) {
      this.currentKecamatan = bkecamatan;
      this.currentPage = 1;
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        kecamatan: this.currentKecamatan,
        search: this.anggotaSearchText,
      });
    },
    anggotaBySearch() {
      this.currentPage = 1;
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        kecamatan: this.currentKecamatan,
        search: this.anggotaSearchText,
      });
    },
    resortAllAnggota() {
      this.currentPage = 1;
      this.currentKecamatan = "";
      this.anggotaSearchText = "";
      this.$store.dispatch("index/getAnggotas", {
        page: this.currentPage,
        kecamatan: this.currentKecamatan,
        search: this.anggotaSearchText,
      });
    },
    getKecamatan() {
      var axios = require('axios');
      var config = {
        method: 'get',
        url: 'https://jaja.id/backend/master/kecamatan?city=456',
        headers: { }
      };

      axios(config)
      .then((response)=>{
        this.bkecamatans = response.data.kecamatan
        // console.log(this.kecamatan);
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  },
  computed: {
    ...mapGetters({
      anggotas: "index/getAnggotas",
      // bkecamatans: "index/getBcategories",
      socialLinks: "index/getSocialLinks",
    }),
  },
  created() {
    this.getAnggotas();
    // this.getBcategories();
    this.getKecamatan();
  },
};
</script>



