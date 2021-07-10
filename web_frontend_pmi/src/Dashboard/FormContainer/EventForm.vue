<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="mt-2 mb-4 h3 text-gray-800 bold">
            Tambah Data Event Atau Agenda
          </h3>
          <b-form class="mt-2">
            <b-form-group
              id="input-group-1"
              label="Judul Event Atau Agenda :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="text"
                required
                v-model="form.judul"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-1"
              label="Deskripsi Event Atau Agenda :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="text"
                required
                v-model="form.deskripsi"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-1"
              label="Waktu Event Atau Agenda :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="datetime-local"
                required
                v-model="form.waktu"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-1"
              label="Lokasi Event Atau Agenda :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="text"
                required
                v-model="form.lokasi"
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
        judul: "",
        deskripsi: "",
        lokasi: "",
        waktu: "",
      },
    };
  },
  methods: {
    sendNewData() {
      store.dispatch("fetchAccessToken");
      axios
        .post(
          `/api/v1/event/`,
          {
            judul_agenda: this.form.judul,
            deskripsi: this.form.deskripsi,
            lokasi: this.form.lokasi,
            waktu: this.form.waktu,
          },
          {
            headers: {
              Authorization: `Bearer ${store.state.accessToken}`,
            },
          }
        )
        .then(() => {
          this.$router.push("/dashboard/event");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
