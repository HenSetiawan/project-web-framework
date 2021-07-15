<template>
  <section>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card border-5">
            <div class="card-header bg-transparent mb-0">
              <h5 class="text-center text-gray-800 bold">
                Selamat Datang Admin
              </h5>
            </div>
            <div class="card-body mb-2">
              <div v-if="loggingIn" class="container-loading">
                <img
                  src="../../../public/img/loading-container.gif"
                  alt="loading"
                />
              </div>
              <form @submit.prevent="login">
                <b-form-group
                  id="input-group-1"
                  label="Email address:"
                  label-for="input-1"
                  description="We'll never share your email with anyone else."
                  class="mb-3"
                >
                  <b-form-input
                    id="input-1"
                    v-model="form.email"
                    type="email"
                    placeholder="Enter email"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-group
                  id="input-group-2"
                  label="Password:"
                  label-for="input-2"
                  class="mb-4"
                >
                  <b-form-input
                    id="input-2"
                    v-model="form.password"
                    type="password"
                    placeholder=" Enter password"
                    required
                  ></b-form-input>
                </b-form-group>

                <b-form-checkbox
                  v-model="checked"
                  @change="storeData"
                  class="mb-3"
                  >Remember Me</b-form-checkbox
                >

                <b-button
                  :disabled="loggingIn"
                  type="submit"
                  variant="primary"
                  class="col-md-12"
                  >Login</b-button
                >
              </form>
              <p class="text-danger mt-2" v-if="loggingError">
                {{ loggingError }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { mapState } from "vuex";
export default {
  name: "loginForm",
  data() {
    return {
      form: {
        email: localStorage.getItem("email"),
        password: localStorage.getItem("password"),
      },
      checked: false,
    };
  },

  computed: {
    ...mapState(["loggingIn", "loggingError"]),
  },

  methods: {
    login() {
      this.$store.dispatch("doLogin", {
        email: this.form.email,
        password: this.form.password,
      });
      this.checked = false;
    },
    storeData() {
      localStorage.setItem("email", this.form.email);
      localStorage.setItem("password", this.form.password);
    },
  },
};
</script>

<style scoped>
.container-loading {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgb(0, 0, 0, 0.3);
}
img {
  width: 2rem;
  height: 2rem;
}
</style>
