<template>
  <div class="blog-area blog-details section-gap">
    <div class="container">
      <div class="row">
          <div class="col-lg-12 text-right">
              <router-link :to="{name : 'Anggota'}" class="main-btn">{{ $t('View All Anggota') }}</router-link>
          </div>
        <div class="col-lg-12">
          <div class="blog-dteails-content">
            <!-- <img v-lazy="`/uploads/${anggota.ktp_image}`" alt="" /> -->
            <div class="content">
              <h3 class="title">
                {{ anggota.nama }}
              </h3>
              <ul class="post-meta">
                <li><i class="fal fa-user"></i> {{ $t("By Admin") }}</li>
                <li>
                  <i class="fal fa-calendar-alt"></i
                  >{{ anggota.created_at | timeFormat }}
                </li>
              </ul>
              <div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                        <td width="35%">{{ $t("Nama") }}</td>
                        <td>{{ anggota.nama }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Gender") }}</td>
                        <td>{{ anggota.gender }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Tanggal Lahir") }}</td>
                        <td>{{ anggota.tanggal_lahir }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("NIK") }}</td>
                        <td>{{ anggota.nik }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Pekerjaan") }}</td>
                        <td>{{ anggota.pekerjaan }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Alamat") }}</td>
                        <td>{{ anggota.alamat }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("RT") }}</td>
                        <td>{{ anggota.rt }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("RW") }}</td>
                        <td>{{ anggota.rw }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Kelurahan") }}</td>
                        <td>{{ anggota.kelurahan }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Kecamatan") }}</td>
                        <td>{{ anggota.kecamatan }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Kabupaten Kota") }}</td>
                        <td>{{ anggota.kabupaten_kota }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Korwil") }}</td>
                        <td>{{ anggota.korwil }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("TPS") }}</td>
                        <td>{{ anggota.tps }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("KTP") }}</td>
                        <td>
                            <img
                                :src="`/uploads/${anggota.ktp_image}`"
                                alt=""
                                class="tImg"
                            />
                        </td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Apakah Bapak / Ibu tau NASDEM?") }}</td>
                        <td>{{ anggota.question_1 }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Apakah Bapak / Ibu kenal CALEG NASDEM Ibu Hj. Nur Nadlifah nomor urut 2?") }}</td>
                        <td>{{ anggota.question_2 }}</td>
                        </tr>
                        <tr>
                        <td width="35%">{{ $t("Apakah Bapak / Ibu suka dengan NASDEM?") }}</td>
                        <td>{{ anggota.question_3 }}</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>
              </div>
              <div class="blog-details-bar mt-30">
                <div class="blog-social">
                  <h4 class="title">{{ $t("Social Share :") }}</h4>
                  <ShareNetwork
                    network="Facebook"
                    title="Facebook"
                    :url="this.$url + $route.fullPath"
                    hashtags="vuejs,vite"
                  >
                    <i class="fab fa-facebook-f"></i>
                  </ShareNetwork>
                  <ShareNetwork
                    network="Twitter"
                    title="Twitter"
                    :url="this.$url + $route.fullPath"
                    hashtags="vuejs,vite"
                  >
                    <i class="fab fa-twitter"></i>
                  </ShareNetwork>
                  <ShareNetwork
                    network="LinkedIn"
                    title="LinkedIn"
                    :url="this.$url + $route.fullPath"
                    hashtags="vuejs,vite"
                  >
                    <i class="fab fa-linkedin-in"></i>
                  </ShareNetwork>
                  <ShareNetwork
                    network="Pinterest"
                    title="Pinterest"
                    :url="this.$url + $route.fullPath"
                    hashtags="vuejs,vite"
                  >
                    <i class="fab fa-pinterest"></i>
                  </ShareNetwork>
                  <ShareNetwork
                    network="WhatsApp"
                    title="WhatsApp"
                    :url="this.$url + $route.fullPath"
                    hashtags="vuejs,vite"
                  >
                    <i class="fab fa-whatsapp"></i>
                  </ShareNetwork>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
Vue.prototype.$url = window.location.origin;
export default {
  methods: {
    getSingleAnggota() {
      this.$store.dispatch("index/getSingleAnggota", this.$route.params.slug);
    },
  },
  computed: {
    ...mapGetters({
      anggota: "index/getSingleAnggota",
    }),
  },
  created() {
    this.getSingleAnggota();
  },
};
</script>



