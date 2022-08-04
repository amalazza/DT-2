<template>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-info">
            <span class="info-box-icon"
              ><i class="far fa-check-circle"></i
            ></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ $t("All Anggota") }}</span>
              <h4 class="info-box-number font-weight-normal">
                {{ data.anggota }}
              </h4>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
          <div class="info-box bg-info">
            <span class="info-box-icon"
              ><i class="far fa-check-circle"></i
            ></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ $t("Your Anggota") }}</span>
              <h4 class="info-box-number font-weight-normal">
                {{ data.anggotaUser }}
              </h4>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
  name: "Dashboard",
  data() {
    return {
      form: {},
    };
  },
  methods: {
    ...mapActions({
      getData: "dashboard/getData",
    }),
  },
  computed: {
    ...mapGetters({
      data: "dashboard/getData",
    }),
  },
  created() {
    this.getData();
  },
  mounted() {
    if (localStorage.getItem("reloaded")) {
      // The page was just reloaded. Clear the value from local storage
      // so that it will reload the next time this page is visited.
      localStorage.removeItem("reloaded");
    } else {
      // Set a flag so that we know not to reload the page twice.
      localStorage.setItem("reloaded", "1");
      location.reload();
    }
  },
};
</script>

<style></style>
