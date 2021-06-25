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
            <div class="card-body mb-4">
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

                <b-form-group id="input-group-4" v-slot="{ ariaDescribedby }">
                  <b-form-checkbox-group
                    v-model="form.checked"
                    id="checkboxes-4"
                    :aria-describedby="ariaDescribedby"
                  >
                    <b-form-checkbox value="me">Remember Me</b-form-checkbox>
                  </b-form-checkbox-group>
                </b-form-group>

                <b-button type="submit" variant="primary" class="col-md-12"
                  >Login</b-button
                >
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { mapState} from "vuex";
export default {
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
    };
  },

  computed: {
    ...mapState(["loggingIn", "loggingError"]),
  },

  methods: {
    login() {
      this.$store.dispatch('doLogin', {
        email: this.form.email,
        password: this.form.password,
      });
    },
  },
};
</script>
