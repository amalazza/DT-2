<template>
  <div class="hold-transition login-page">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="#" class="h1"
            ><b>{{ $t("Register") }}</b></a
          >
        </div>
        <div class="card-body">
          <p class="login-box-msg">{{ $t("Sign in to start your session") }}</p>
          <form action="#" method="post" @submit.prevent="register()">
            <div class="g-wrapper mb-3">
              <div class="input-group">
                <input
                  type="text"
                  class="form-control"
                  :placeholder="$t('Name')"
                  v-model="form.name"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger d-block mb-2" v-if="errors.name">
                {{ errors.name[0] }}
              </span>
            </div>
            <div class="g-wrapper mb-3">
              <div class="input-group">
                <input
                  type="email"
                  class="form-control"
                  :placeholder="$t('Email')"
                  v-model="form.email"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger d-block mb-2" v-if="errors.email">
                {{ errors.email[0] }}
              </span>
            </div>
            <input type="text" v-model="form.role_id"/>
            <div class="g-wrapper mb-3">
              <div class="input-group">
                <input
                  type="password"
                  class="form-control"
                  :placeholder="$t('Password')"
                  v-model="form.password"
                />
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <span class="text-danger d-block mb-2" v-if="errors.password">
                {{ errors.password[0] }}
              </span>
            </div>
            <div class="row">
              <!-- /.col -->
              <div class="col-12 text-center">
                <el-button @click="register()" :loading="loading" type="primary">
                  {{ $t("Sign In") }}</el-button
                >
              </div>
              <!-- /.col -->
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</template>

<script>
export default {
  name: "AdminRegister",
  data() {
    return {
      loading: false,
      errors: {},
      form: {},
    };
  },
  methods: {
    register() {
      this.loading = true;
      axios
        .post("/api/register", this.form)
        .then((result) => {
          this.loading = false;
          this.$notify({
            title: "Success",
            message: "Register Successfully !",
            type: "success",
          });
          this.$router.push({ name: "AdminLogin" });
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },
  },
};
</script>