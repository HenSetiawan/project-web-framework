<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="mt-2 mb-4 h3 text-gray-800 bold">Tambah Data Admin</h3>
          <b-form class="mt-2">
            <b-form-group
              id="input-group-1"
              label="Masukan Username :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="text"
                placeholder="Enter your username"
                required
                v-model="form.username"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-2"
              label="Masukan Email :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-2"
                type="email"
                placeholder="Enter your email"
                required
                v-model="form.email"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-3"
              label="Masukan No Handphone :"
              label-for="input-3"
              autocomplete="off"
            >
              <b-form-input
                id="input-3"
                type="text"
                placeholder="ex: 083827753611"
                required
                v-model="form.handphone"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-4"
              label="Masukan Password :"
              label-for="input-4"
              autocomplete="off"
            >
              <b-form-input
                id="input-4"
                type="password"
                placeholder="Enter your password"
                required
                v-model="form.password"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-5"
              label="Masukan Konfirmasi Password :"
              label-for="input-5"
              autocomplete="off"
            >
              <b-form-input
                id="input-5"
                type="password"
                placeholder="Enter your confirm password"
                required
                v-model="form.konfirmasiPassword"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>

            <b-button variant="primary" class="btn" @click="sendNewData"
              >Tambah Data</b-button
            >
          </b-form>
        </div>
        <div class="col-lg-6"></div>
      </div>
    </div>
  </section>
</template>
<script>
import Sidebar from "../SidebarContainer/Sidebar.vue";
import store from "../../store";
import axios from "axios";
export default {
  name: "eventForm",
  components: {
    Sidebar,
  },
  data() {
    return {
      form: {
        username: "",
        email: "",
        handphone: "",
        password: "",
        konfirmasiPassword: "",
      },
    };
  },
  methods: {
    sendNewData() {
      store.dispatch("fetchAccessToken");
      axios
        .post(
          `/api/v1/admin`,
          {
            username: this.form.username,
            email: this.form.email,
            no_hp: this.form.handphone,
            password: this.form.password,
            confirm_password: this.form.konfirmasiPassword,
          },
          {
            headers: {
              Authorization: `Bearer ${store.state.accessToken}`,
            },
          }
        )
        .then(() => {
          this.$router.push("/dashboard/admin");
        })
        .catch((err) => {
          this.$swal.fire({
            icon: "error",
            title: "Oops...",
            text: err,
          });
        });
    },
  },
};
</script>
