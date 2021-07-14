<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="mt-2 mb-4 h3 text-gray-800 bold">Tambah Data Volunteer</h3>
          <b-form class="mt-2">
            <b-form-group
              id="input-group-1"
              label="Masukan Nama Lengkap :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="text"
                placeholder="Enter your full name"
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
                placeholder="Enter your email"
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
                placeholder="ex: 083827753611"
                required
                v-model="form.handphone"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <div>
              <label for="example-datepicker">Masukan Golongan Darah :</label>
              <b-form-select
                v-model="form.selected"
                :options="form.options"
                class="mb-3"
              ></b-form-select>
            </div>
            <div>
              <label for="example-datepicker">Masukan Tanggal Lahir :</label>
              <b-form-datepicker
                id="example-datepicker"
                v-model="form.tanggal_lahir"
                class="mb-3"
              ></b-form-datepicker>
            </div>
            <div>
              <label for="example-datepicker">Masukan Alamat :</label>
              <b-form-textarea
                id="textarea"
                v-model="form.alamat"
                placeholder="Enter something..."
                rows="3"
                max-rows="6"
              ></b-form-textarea>
            </div>
            <b-form-group
              id="input-group-1"
              label="Masukan Password :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="password"
                placeholder="Enter your password"
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
                placeholder="Enter your confirm password"
                required
                v-model="form.konfirmasiPassword"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>

            <b-button variant="primary" class="btn mb-3" @click="sendNewData"
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
import axios from "axios";
export default {
  name: "VolunteerForm",
  components: {
    Sidebar,
  },
  data() {
    return {
      form: {
        username: "",
        email: "",
        handphone: "",
        tanggal_lahir: "",
        alamat: "",
        password: "",
        konfirmasiPassword: "",
        selected: null,
        options: [
          { value: null, text: "Please select an option" },
          { value: "A", text: "Golongan Darah A" },
          { value: "B", text: "Golongan Darah B" },
          { value: "AB", text: "Golongan Darah AB" },
          { value: "O", text: "Golongan Darah O" },
        ],
      },
    };
  },
  methods: {
    sendNewData() {
      axios
        .post(`/api/v1/auth/volunteer/register`, {
          username: this.form.username,
          email: this.form.email,
          no_hp: this.form.handphone,
          tanggal_lahir: this.form.tanggal_lahir,
          gol_darah: this.form.selected,
          alamat: this.form.alamat,
          password: this.form.password,
          confirm_password: this.form.konfirmasiPassword,
        })
        .then(() => {
          this.$router.push("/dashboard/volunteer");
        })
        .catch((err) => {
          this.$swal.fire({
            icon: "error",
            title: "Oops...",
            text: err.response.data.message,
          });
        });
    },
  },
};
</script>
