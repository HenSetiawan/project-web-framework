<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="mt-2 mb-4 h3 text-gray-800 bold">Edit Data Admin</h3>
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
                required
                v-model="form.username"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-1"
              label="Masukan Email :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="email"
                required
                v-model="form.email"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-1"
              label="Masukan No Handphone :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="text"
                required
                v-model="form.handphone"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-1"
              label="Masukan Password :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="password"
                required
                v-model="form.password"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-1"
              label="Masukan Konfirmasi Password :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="password"
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
  created() {
    this.getAdminById();
  },
  methods: {
    getAdminById() {
      store.dispatch("fetchAccessToken");
      console.log(this.$route.params.id);
      axios
        .get(`/api/v1/admin/${this.$route.params.id}`, {
          headers: {
            Authorization: `Bearer ${store.state.accessToken}`,
          },
        })
        .then((response) => {
          console.log(response);
          this.form.username = response.data.data[0].username;
          this.form.email = response.data.data[0].email;
          this.form.handphone = response.data.data[0].no_hp;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    sendNewData() {
      store.dispatch("fetchAccessToken");
      axios
        .put(
          `/api/v1/admin/${this.$route.params.id}`,
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
          console.log(err);
        });
    },
  },
};
</script>
