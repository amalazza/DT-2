<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title mt-1">
                {{ $t($route.name.replace(/([A-Z])/g, " $1").trim()) }}
              </h3>
              <div class="card-tools">
                <router-link :to="{ name: 'AnggotaList' }">
                  <el-button type="primary" size="small">
                    <i class="fas fa-angle-double-left"></i>
                    {{ $t("Back") }}
                  </el-button>
                </router-link>
              </div>
            </div>
            <!-- /.card-header -->
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
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
</template>

<script>
export default {
  methods: {
    edit() {
      this.$store.dispatch("anggota/AnggotaView", this.$route.params.id);
    },
  },
  created() {
    this.edit();
  },
  computed: {
    anggota() {
      return this.$store.getters["anggota/AnggotaView"];
    },
  },
};
</script>

