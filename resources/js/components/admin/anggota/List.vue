<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title mt-1">
                                {{
                                    $t(
                                        $route.name
                                            .replace(/([A-Z])/g, " $1")
                                            .trim()
                                    )
                                }}
                            </h3>
                            <div class="card-tools">
                                <el-button
                                    @click="multipleDelete"
                                    v-if="
                                        multipleSelection.length > 0 &&
                                        adminInfox.role_id == 1
                                    "
                                    type="danger"
                                    size="small"
                                    ><i class="far fa-trash-alt"></i>
                                    {{ $t("Multiple Delete") }}</el-button
                                >
                                <router-link :to="{ name: 'AnggotaAdd' }">
                                    <el-button type="primary" size="small">
                                        <i class="fas fa-plus"></i>
                                        {{ $t("Add New") }}
                                    </el-button>
                                </router-link>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div style="margin-bottom: 10px">
                                <el-button @click="exportToJson">
                                    Export to JSON
                                </el-button>
                                <el-button @click="exportToCsv"
                                    >Export to CSV</el-button
                                >
                                <el-button @click="exportToXlsx"
                                    >Export to Excel</el-button
                                >
                                <el-button @click="exportToPdf"
                                    >Export to PDF</el-button
                                >
                            </div>

                            <el-table
                                ref="multipleTable"
                                :data="anggotas.data"
                                style="width: 100%"
                                @selection-change="handleSelectionChange"
                                @filter-change="handleFilterChange"
                                border
                                fit
                                highlight-current-row
                                v-loading="loading"
                                v-if="!isExported"
                            >
                                <el-table-column type="selection" width="55">
                                </el-table-column>
                                <el-table-column
                                    property="ktp_image"
                                    :label="`${$t('Image')}`"
                                >
                                    <template slot-scope="scope">
                                        <img
                                            :src="`/uploads/${scope.row.ktp_image}`"
                                            alt=""
                                            class="tImg"
                                        />
                                    </template>
                                </el-table-column>
                                <el-table-column
                                    property="nama"
                                    :label="`${$t('Nama')}`"
                                >
                                </el-table-column>
                                <el-table-column
                                    prop="rt"
                                    :label="`${$t('RT')}`"
                                    :filters="getRtFilters()"
                                    :filter-method="handleRtFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="rw"
                                    :label="`${$t('RW')}`"
                                    :filters="getRwFilters()"
                                    :filter-method="handleRwFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="kelurahan"
                                    :label="`${$t('Kelurahan')}`"
                                    :filters="getKelurahanFilters()"
                                    :filter-method="handleKelurahanFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="kecamatan"
                                    :label="`${$t('Kecamatan')}`"
                                    :filters="getKecamatanFilters()"
                                    :filter-method="handleKecamatanFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="korwil"
                                    :label="`${$t('Korwil')}`"
                                    :filters="getKorwilFilters()"
                                    :filter-method="handleKorwilFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="tps"
                                    :label="`${$t('TPS')}`"
                                    :filters="getTpsFilters()"
                                    :filter-method="handleTpsFilter"
                                >
                                </el-table-column>
                                <el-table-column :label="`${$t('Action')}`">
                                    <template slot-scope="scope">
                                        <router-link
                                            v-if="
                                                adminInfox.role_id == 1 ||
                                                adminInfox.role_id == 2
                                            "
                                            :to="{
                                                name: 'AnggotaView',
                                                params: { id: scope.row.id },
                                            }"
                                        >
                                            <el-button size="mini">{{
                                                $t("View")
                                            }}</el-button>
                                        </router-link>
                                        <router-link
                                            v-if="adminInfox.role_id == 1"
                                            :to="{
                                                name: 'AnggotaEdit',
                                                params: { id: scope.row.id },
                                            }"
                                        >
                                            <el-button size="mini">{{
                                                $t("Edit")
                                            }}</el-button>
                                        </router-link>
                                        <el-button
                                            v-if="adminInfox.role_id == 1"
                                            size="mini"
                                            type="danger"
                                            @click="
                                                deleteDialogFunc(scope.row.id)
                                            "
                                            >{{ $t("Delete") }}</el-button
                                        >
                                    </template>
                                </el-table-column>
                            </el-table>
                            <!-- <el-table
                                ref="filteredTable"
                                :data="filteredData"
                                style="width: 100%"
                                @selection-change="handleSelectionChange"
                                border
                                fit
                                highlight-current-row
                                v-loading="loading"
                                v-if="isExported"
                            >
                                <el-table-column type="selection" width="55">
                                </el-table-column>
                                <el-table-column
                                    property="ktp_image"
                                    :label="`${$t('Image')}`"
                                >
                                    <template slot-scope="scope">
                                        <img
                                            :src="`/uploads/${scope.row.ktp_image}`"
                                            alt=""
                                            class="tImg"
                                        />
                                    </template>
                                </el-table-column>
                                <el-table-column
                                    property="nama"
                                    :label="`${$t('Nama')}`"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="rt"
                                    :label="`${$t('RT')}`"
                                    :filters="getRtFilters()"
                                    :filter-method="handleRtFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="rw"
                                    :label="`${$t('RW')}`"
                                    :filters="getRwFilters()"
                                    :filter-method="handleRwFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="kelurahan"
                                    :label="`${$t('Kelurahan')}`"
                                    :filters="getKelurahanFilters()"
                                    :filter-method="handleKelurahanFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="kecamatan"
                                    :label="`${$t('Kecamatan')}`"
                                    :filters="getKecamatanFilters()"
                                    :filter-method="handleKecamatanFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="korwil"
                                    :label="`${$t('Korwil')}`"
                                    :filters="getKorwilFilters()"
                                    :filter-method="handleKorwilFilter"
                                >
                                </el-table-column>
                                <el-table-column
                                    property="tps"
                                    :label="`${$t('TPS')}`"
                                    :filters="getTpsFilters()"
                                    :filter-method="handleTpsFilter"
                                >
                                </el-table-column>
                            </el-table> -->
                            <div v-if="anggotas.meta">
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
                            <el-dialog
                                :visible.sync="deleteDialog"
                                :title="$t('Warning!!')"
                                width="30%"
                                center
                            >
                                <div class="text-center">
                                    <h4>{{ $t("Are you sure?") }}</h4>
                                    <span>{{
                                        $t("You won't be able to revert this!")
                                    }}</span>
                                </div>
                                <span slot="footer" class="dialog-footer">
                                    <el-button @click="deleteDialog = false">{{
                                        $t("Cancel")
                                    }}</el-button>
                                    <el-button
                                        type="primary"
                                        :loading="loading"
                                        @click="deleteFunc(dataDeleteId)"
                                        >{{ $t("Confirm") }}</el-button
                                    >
                                </span>
                            </el-dialog>
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
import Papa from "papaparse";
import * as XLSX from "xlsx";
import jsPDF from "jspdf";
import "jspdf-autotable";

export default {
    name: "List",
    data() {
        return {
            deleteDialog: false,
            currentPage: 1,
            multipleSelection: [],
            form: {},
            dataDeleteId: "",
            loading: false,
            rtFilter: "",
            rwFilter: "",
            kelurahanFilter: "",
            kecamatanFilter: "",
            korwilFilter: "",
            tpsFilter: "",
            supportType: ["csv", "txt", "json", "xls"],
            exportType: "csv",
            filteredData: [],
            isExported: false,
            isFiltered: false,
            filterStatus: {},
        };
    },
    created() {
        this.List();
    },
    methods: {
        exportToJson() {
            const jsonData = JSON.stringify(
                this.isFiltered ? this.filteredData : this.anggotas.data
            );
            const blob = new Blob([jsonData], { type: "application/json" });
            const url = URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.href = url;
            a.download = "data.json";
            a.click();
            URL.revokeObjectURL(url);
        },
        exportToCsv() {
            const csv = Papa.unparse(
                this.isFiltered ? this.filteredData : this.anggotas.data
            );
            const blob = new Blob([csv], { type: "text/csv" });
            const url = URL.createObjectURL(blob);
            const a = document.createElement("a");
            a.href = url;
            a.download = "data.csv";
            a.click();
            URL.revokeObjectURL(url);
        },

        exportToXlsx() {
            const dataPDF = this.isFiltered
                ? this.filteredData
                : this.anggotas.data;
            const worksheet = XLSX.utils.json_to_sheet(dataPDF);
            const workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Sheet1");
            XLSX.writeFile(workbook, "data.xlsx");
        },
        exportToPdf() {
            const dataPDF = this.isFiltered
                ? this.filteredData
                : this.anggotas.data;
            const doc = new jsPDF();
            doc.text("Data to Export", 10, 10);
            doc.autoTable({
                head: [
                    [
                        "Nama",
                        "RT",
                        "RW",
                        "Kelurahan",
                        "Kecamatan",
                        "Korwil",
                        "TPS",
                    ],
                ],
                body: dataPDF.map(
                    ({ nama, rt, rw, kelurahan, kecamatan, korwil, tps }) => [
                        nama,
                        rt,
                        rw,
                        kelurahan,
                        kecamatan,
                        korwil,
                        tps,
                    ]
                ),
            });
            doc.save("data.pdf");
        },
        formatterHandler(row) {
            return "formatter: " + row.remark;
        },
        toggleSelection(rows) {
            if (rows) {
                rows.forEach((row) => {
                    this.$refs.multipleTable.toggleRowSelection(row);
                });
            } else {
                this.$refs.multipleTable.clearSelection();
            }
        },
        handleSelectionChange(val) {
            this.multipleSelection = val;
        },
        handleCurrentChange() {
            this.loading = true;
            this.$store
                .dispatch("anggota/anggotaList", this.currentPage)
                .then((result) => {
                    this.loading = false;
                });
        },
        handelDataChange() {
            this.$store
                .dispatch("anggota/anggotaList", this.currentPage)
                .then((result) => {
                    this.loading = false;
                });
        },
        List() {
            this.loading = true;
            this.$store
                .dispatch("anggota/anggotaList", this.currentPage)
                .then((result) => {
                    this.loading = false;
                });
        },
        multipleDelete() {
            this.loading = true;
            axios
                .post(
                    "/api/admin/anggotas/multiple-delete",
                    this.multipleSelection
                )
                .then((result) => {
                    this.$notify({
                        title: "Success",
                        message: "Data Deleted Successfully",
                        type: "success",
                    });
                    this.handelDataChange();
                })
                .catch((err) => {});
        },
        deleteFunc(id) {
            this.loading = true;
            axios
                .delete("/api/admin/anggotas/" + id)
                .then((result) => {
                    this.$notify({
                        title: "Success",
                        message: "Data Deleted Successfully",
                        type: "success",
                    });
                    this.deleteDialog = false;
                    this.handelDataChange();
                })
                .catch((err) => {});
        },
        deleteDialogFunc(id) {
            this.deleteDialog = true;
            this.dataDeleteId = id;
        },

        getRtFilters() {
            const rtList = this.anggotas.data.map((anggota) => anggota.rt);
            return Array.from(new Set(rtList)).map((rt) => ({
                text: rt,
                value: rt,
            }));
        },

        getRwFilters() {
            const rwList = this.anggotas.data.map((anggota) => anggota.rw);
            return Array.from(new Set(rwList)).map((rw) => ({
                text: rw,
                value: rw,
            }));
        },

        getKelurahanFilters() {
            const kelurahanList = this.anggotas.data.map(
                (anggota) => anggota.kelurahan
            );
            return Array.from(new Set(kelurahanList)).map((kelurahan) => ({
                text: kelurahan,
                value: kelurahan,
            }));
        },

        getKecamatanFilters() {
            const kecamatanList = this.anggotas.data.map(
                (anggota) => anggota.kecamatan
            );
            return Array.from(new Set(kecamatanList)).map((kecamatan) => ({
                text: kecamatan,
                value: kecamatan,
            }));
        },

        getKorwilFilters() {
            const korwilList = this.anggotas.data.map(
                (anggota) => anggota.korwil
            );
            return Array.from(new Set(korwilList)).map((korwil) => ({
                text: korwil,
                value: korwil,
            }));
        },

        getTpsFilters() {
            const tpsList = this.anggotas.data.map((anggota) => anggota.tps);
            return Array.from(new Set(tpsList)).map((tps) => ({
                text: tps,
                value: tps,
            }));
        },

        handleRtFilter(value, row) {
            this.filteredData = this.anggotas.data.filter(
                (anggota) => anggota.rt.indexOf(value) !== -1
            );
            return row.rt.indexOf(value) !== -1;
        },

        handleRwFilter(value, row) {
            this.filteredData = this.anggotas.data.filter(
                (anggota) => anggota.rw.indexOf(value) !== -1
            );
            return row.rw.indexOf(value) !== -1;
        },

        handleKelurahanFilter(value, row) {
            this.filteredData = this.anggotas.data.filter(
                (anggota) => anggota.kelurahan.indexOf(value) !== -1
            );
            return row.kelurahan.indexOf(value) !== -1;
        },

        handleKecamatanFilter(value, row) {
            this.filteredData = this.anggotas.data.filter(
                (anggota) => anggota.kecamatan.indexOf(value) !== -1
            );
            return row.kecamatan.indexOf(value) !== -1;
        },

        handleKorwilFilter(value, row) {
            this.filteredData = this.anggotas.data.filter(
                (anggota) => anggota.korwil.indexOf(value) !== -1
            );
            return row.korwil.indexOf(value) !== -1;
        },

        handleTpsFilter(value, row) {
            this.filteredData = this.anggotas.data.filter(
                (anggota) => anggota.tps.indexOf(value) !== -1
            );
            return row.tps.indexOf(value) !== -1;
        },
        handleFilterChange(filters) {
            // Update the filterStatus object based on the applied filters
            Object.keys(filters).forEach((column) => {
                this.filterStatus[column] = filters[column].length > 0;
            });

            this.isFiltered = Object.values(this.filterStatus).some(
                (value) => value
            );

            if (!this.isFiltered) {
                this.filteredData = this.anggotas.data;
            }
        },
    },
    computed: {
        anggotas() {
            return this.$store.getters["anggota/anggotaList"];
        },
        adminInfox() {
            return this.$store.getters["dashboard/getAdminInfo"];
        },
    },
};
</script>

<style></style>
