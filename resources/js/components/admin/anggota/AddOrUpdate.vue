<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">
                                {{ $t($route.name.replace(/([A-Z])/g, ' $1').trim()) }}
                            </h3>
                            <div class="card-tools">
                                <router-link :to="{ name: 'AnggotaList' }">
                                    <el-button type="primary" size="small">
                                        <i class="fas fa-angle-double-left"></i>
                                        {{ $t('Back') }}
                                    </el-button>
                                </router-link>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <el-form label-position="top" @submit.prevent="saveOrUpdate">
                                        <el-form-item :label="`${$t('Image')} *`">
                                            <image-show
                                                :routeParamsId="
                                                    $route.params.id
                                                "
                                                :viewImage="viewImage"
                                                :image="anggota.ktp_image"
                                            ></image-show>
                                            <div class="custom-file">
                                                <label
                                                    class="custom-file-label"
                                                    for="ktp_image"
                                                    >{{ $t('Choose Image') }}</label
                                                >
                                                <input
                                                    type="file"
                                                    class="custom-file-input"
                                                    @change="onFileSelected"
                                                    id="ktp_image"
                                                />
                                            </div>
                                            <span
                                                class="text-danger"
                                                v-if="errors.ktp_image"
                                            >
                                                {{ errors.ktp_image[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('Nama')} *`">
                                            <el-input
                                                v-model="form.nama"
                                            ></el-input>
                                            <span
                                                class="text-danger"
                                                v-if="errors.nama"
                                            >
                                                {{ errors.nama[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('Gender')} *`">
                                            <el-select
                                                v-model="form.gender"
                                                :placeholder="$t('Select Gender')"
                                            >
                                                <el-option
                                                    key="Laki-laki"
                                                    label="Laki-laki"
                                                    value="Laki-laki"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="Perempuan"
                                                    label="Perempuan"
                                                    value="Perempuan"
                                                >
                                                </el-option>
                                            </el-select>
                                            <span
                                                class="text-danger d-block mb-2"
                                                v-if="errors.gender"
                                            >
                                                {{ errors.gender[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item label="Tanggal Lahir">
                                            <el-date-picker
                                            v-model="form.tanggal_lahir"
                                            type="date"
                                            placeholder="Pilih Tanggal Lahir"
                                            style="width: 100%"
                                            />
                                        </el-form-item>

                                        <el-form-item :label="`${$t('NIK')} *`">
                                            <el-input
                                                v-model="form.nik"
                                            ></el-input>
                                            <span
                                                class="text-danger"
                                                v-if="errors.nik"
                                            >
                                                {{ errors.nik[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('Pekerjaan')} *`">
                                            <el-select
                                                v-model="form.pekerjaan"
                                                :placeholder="$t('Pilih Pekerjaan')"
                                            >
                                                <el-option
                                                    key="Wiraswasta"
                                                    label="Wiraswasta"
                                                    value="Wiraswasta"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="ASN"
                                                    label="ASN"
                                                    value="ASN"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="Pelajar"
                                                    label="Pelajar"
                                                    value="Pelajar"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="Lainnya"
                                                    label="Lainnya"
                                                    value="Lainnya"
                                                >
                                                </el-option>
                                            </el-select>
                                            <span
                                                class="text-danger d-block mb-2"
                                                v-if="errors.pekerjaan"
                                            >
                                                {{ errors.pekerjaan[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('Alamat')} *`">
                                            <el-input
                                                type="textarea"
                                                rows="4"
                                                v-model="form.alamat"
                                            ></el-input>
                                            <span
                                                class="text-danger"
                                                v-if="errors.alamat"
                                            >
                                                {{ errors.alamat[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('Kabupaten / Kota')} *`">
                                            <el-select
                                                v-model="form.kabupaten_kota"
                                                :placeholder="$t('Pilih Kabupaten / Kota')"
                                            >
                                                <el-option
                                                    key="Kota Tangerang"
                                                    label="Kota Tangerang"
                                                    value="Kota Tangerang"
                                                >
                                                </el-option>
                                            </el-select>
                                            <span
                                                class="text-danger d-block mb-2"
                                                v-if="errors.kabupaten_kota"
                                            >
                                                {{ errors.kabupaten_kota[0] }}
                                            </span>
                                        </el-form-item>

                                        <div class="el-form-item">
                                            <label for="kecamatan" class="el-form-item__label">Kecamatan *</label>
                                            <select class="form-control" id="kecamatan" name="kecamatan"  @focus="getKecamatanKd()" v-model="form.kecamatan">
                                                <option value="">Pilih Kecamatan</option>
                                                <option v-for="i in bkecamatans" :key="i.kecamatan_id" :value="i.kecamatan" :data-rc="i.kecamatan_kd">
                                                {{ i.kecamatan }}
                                                </option>
                                            </select>
                                        </div>

                                        <el-form-item :label="`${$t('Kelurahan')} *`">
                                            <el-select
                                                v-model="form.kelurahan"
                                                :placeholder="$t('Pilih Kelurahan')"
                                            >
                                                <el-option
                                                    v-for="i in bkelurahans.kelurahan" 
                                                    :key="i.kelurahan_id" 
                                                    :value="i.kelurahan_desa" 
                                                    :label="i.kelurahan_desa"
                                                ></el-option>
                                            </el-select>
                                            <span
                                                class="text-danger"
                                                v-if="errors.kelurahan"
                                            >
                                                {{ errors.kelurahan[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('RT')} *`">
                                            <el-select
                                                v-model="form.rt"
                                                :placeholder="$t('Pilih RT')"
                                            >
                                                <el-option
                                                    key="1"
                                                    label="1"
                                                    value="1"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="2"
                                                    label="2"
                                                    value="2"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="3"
                                                    label="3"
                                                    value="3"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="4"
                                                    label="4"
                                                    value="4"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="5"
                                                    label="5"
                                                    value="5"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="6"
                                                    label="6"
                                                    value="6"
                                                >
                                                </el-option>
                                            </el-select>
                                            <span
                                                class="text-danger d-block mb-2"
                                                v-if="errors.rt"
                                            >
                                                {{ errors.rt[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('RW')} *`">
                                            <el-select
                                                v-model="form.rw"
                                                :placeholder="$t('Pilih RW')"
                                            >
                                                <el-option
                                                    key="1"
                                                    label="1"
                                                    value="1"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="2"
                                                    label="2"
                                                    value="2"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="3"
                                                    label="3"
                                                    value="3"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="4"
                                                    label="4"
                                                    value="4"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="5"
                                                    label="5"
                                                    value="5"
                                                >
                                                </el-option>
                                                <el-option
                                                    key="6"
                                                    label="6"
                                                    value="6"
                                                >
                                                </el-option>
                                            </el-select>
                                            <span
                                                class="text-danger d-block mb-2"
                                                v-if="errors.rw"
                                            >
                                                {{ errors.rw[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('Korwil')} *`">
                                            <el-input
                                                v-model="form.korwil"
                                            ></el-input>
                                            <span
                                                class="text-danger"
                                                v-if="errors.korwil"
                                            >
                                                {{ errors.korwil[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('TPS')} *`">
                                            <el-input
                                                v-model="form.tps"
                                            ></el-input>
                                            <span
                                                class="text-danger"
                                                v-if="errors.tps"
                                            >
                                                {{ errors.tps[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('Apakah Bapak / Ibu tau NASDEM?')} `">
                                            <el-radio-group v-model="form.question_1">
                                                <el-radio 
                                                    key="Ya"
                                                    label="Ya"
                                                    value="Ya">
                                                </el-radio>
                                                <el-radio 
                                                    key="Tidak"
                                                    label="Tidak"
                                                    value="Tidak">
                                                </el-radio>
                                            </el-radio-group>
                                            <span
                                                class="text-danger d-block mb-2"
                                                v-if="errors.question_1"
                                            >
                                                {{ errors.question_1[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('Apakah Bapak / Ibu kenal CALEG NASDEM Ibu Hj. Nur Nadlifah nomor urut 2?')} `">
                                            <el-radio-group v-model="form.question_2">
                                                <el-radio 
                                                    key="Kenal"
                                                    label="Kenal"
                                                    value="Kenal">
                                                </el-radio>
                                                <el-radio 
                                                    key="Tidak"
                                                    label="Tidak Kenal"
                                                    value="Tidak">
                                                </el-radio>
                                            </el-radio-group>
                                            <span
                                                class="text-danger d-block mb-2"
                                                v-if="errors.question_2"
                                            >
                                                {{ errors.question_2[0] }}
                                            </span>
                                        </el-form-item>

                                        <el-form-item :label="`${$t('Apakah Bapak / Ibu suka dengan NASDEM?')} `">
                                            <el-radio-group v-model="form.question_3">
                                                <el-radio 
                                                    key="Suka"
                                                    label="Suka"
                                                    value="Suka">
                                                </el-radio>
                                                <el-radio 
                                                    key="Tidak"
                                                    label="Tidak Suka"
                                                    value="Tidak">
                                                </el-radio>
                                                <el-radio 
                                                    key="Belum"
                                                    label="Belum Memuaskan"
                                                    value="Belum">
                                                </el-radio>
                                            </el-radio-group>
                                            <span
                                                class="text-danger d-block mb-2"
                                                v-if="errors.question_3"
                                            >
                                                {{ errors.question_3[0] }}
                                            </span>
                                        </el-form-item>


                                        <!-- BUTTON UPDATE -->
                                        <el-button
                                            v-if="$route.params.id"
                                            @click.prevent="saveOrUpdate"
                                            type="primary"
                                            :loading="loading"
                                            >{{ $t('Update') }}</el-button
                                        >
                                        <!-- BUTTON SAVE -->
                                        <el-button
                                            v-else
                                            @click.prevent="saveOrUpdate"
                                            type="primary"
                                            :loading="loading"
                                            >{{ $t('Save') }}</el-button
                                        >
                                    </el-form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
</template>

<script>
import ImageShow from "../helper/ImageShow.vue";
export default {
    name: "AddOrUpdate",
    data() {
        return {
            loading: false,
            errors: {},
            viewImage: null,
            form: {
                nama: "",
                gender: "",
                tanggal_lahir: "",
                nik: "",
                pekerjaan: "",
                alamat: "",
                rt: "",
                rw: "",
                kelurahan: "",
                kecamatan: "",
                kabupaten_kota: "",
                korwil: "",
                tps: "",
                ktp_image: "",
                question_1: "",
                question_2: "",
                question_3: "",
                question_4: "",
                question_5: "",
            },
            bkecamatans: [],
            bkelurahans: []
        };
    },
    components: {
        ImageShow
    },
    methods: {
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
            })
            .catch(function (error) {
                console.log(error);
            });
        },
        getKecamatanKd() {
            var e = document.getElementById("kecamatan");
            var option= e.options[e.selectedIndex];
            var kecamatan_kd = option.getAttribute("data-rc");
            // this.reqUpdateAddr.districtKd = kecamatan_kd
            this.getKelurahan(kecamatan_kd)
        },
        getKelurahan(districtKd){
            var axios = require('axios');

            var config = {
            method: 'get',
            url: `https://jaja.id/backend/master/kelurahan?kd_kec=${districtKd}`,
            headers: { }
            };

            axios(config)
            .then((response)=>{
                this.bkelurahans = response.data
            })
            .catch(function (error) {
            console.log(error);
            });
        },
        onFileSelected(event) {
            let file = event.target.files[0];
            if (file.size > 1048770) {
                this.$notify({
                    title: 'Success',
                    message: 'Max Image Size 2 MB',
                    type: 'warning'
                });
            } else {
                this.form.ktp_image = event.target.files[0];
                let reader = new FileReader();
                reader.onload = event => {
                    this.viewImage = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        },
        // anggotaCategoryListAll() {
        //     this.$store.dispatch("anggotaCategory/anggotaCategoryListAll");
        // },
        save(formData) {
            

            axios
                .post("/api/admin/anggotas", formData)
                .then(result => {
                    this.loading = false;
                    this.form = null;
                    this.$router.push({ name: "AnggotaList" });
                    this.$notify({
                        title: 'Success',
                        message: 'Data Added Successfully',
                        type: 'success'
                    });
                })
                .catch(err => {
                    if (err) {
                        this.loading = false;
						this.$notify({
                        title: "Gagal",
                        message: err.response.data.message,
                        type: "error",
                        });
                    }
                    this.errors = err.response.data.errors;
                    
                });
        },
        update(formData) {
            this.loading = true;
            axios
                .post(
                    `/api/admin/anggotas/update/${this.$route.params.id}`,
                    formData
                )
                .then(result => {
                    this.loading = false;
                    this.form = null;
                    this.$router.push({ name: "AnggotaList" });
                    this.$notify({
                        title: 'Success',
                        message: 'Data Updated Successfully',
                        type: 'success'
                    });
                })
                .catch(err => {
                    if (err) {
                        this.loading = false;
						this.$notify({
                        title: "Gagal",
                        message: err.response.data.message,
                        type: "error",
                        });
                    }
                    this.errors = err.response.data.errors;
                });
        },
        saveOrUpdate() {
            let formData = new FormData();
            formData.append("nama", this.form.nama);
            formData.append("gender", this.form.gender);
            formData.append("tanggal_lahir", this.form.tanggal_lahir);
            formData.append("nik", this.form.nik);
            formData.append("pekerjaan", this.form.pekerjaan);
            formData.append("alamat", this.form.alamat);
            formData.append("rt", this.form.rt);
            formData.append("rw", this.form.rw);
            formData.append("kelurahan", this.form.kelurahan);
            formData.append("kecamatan", this.form.kecamatan);
            formData.append("kabupaten_kota", this.form.kabupaten_kota);
            formData.append("korwil", this.form.korwil);
            formData.append("tps", this.form.tps);
            formData.append("ktp_image", this.form.ktp_image);
            formData.append("question_1", this.form.question_1);
            formData.append("question_2", this.form.question_2);
            formData.append("question_3", this.form.question_3);
            formData.append("question_4", this.form.question_4);
            formData.append("question_5", this.form.question_5);

            if (this.form.id) {
                this.update(formData);
            } else {
                this.save(formData);
            }
        },
        edit() {
            this.$store.dispatch("anggota/editAnggota", this.$route.params.id);
        }
    },
    created() {
        this.getKecamatan();
        if (this.$route.params.id) {
            this.edit();
        }
    },
    computed: {
        // anggotaCategories() {
        //     return this.$store.getters["anggotaCategory/anggotaCategoryList"];
        // },
        anggota() {
            return this.$store.getters["anggota/singleAnggota"];
        }
    },
    watch: {
        anggota() {
            this.form = this.anggota;
        }
    }
};
</script>

<style></style>
