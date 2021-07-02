<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="mt-2 mb-4 h3 text-gray-800 bold">
            Data Stok Darah Untuk Kategori {{ kategori }}
          </h3>
          <b-form class="mt-2">
            <b-form-group
              id="input-group-1"
              label="Jumlah Gol A :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                v-model="form.a"
                type="text"
                placeholder="Jumlah Kantong Darah"
                required
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-2"
              label="Jumlah Gol B :"
              label-for="input-2"
            >
              <b-form-input
                id="input-2"
                v-model="form.b"
                type="text"
                placeholder="Jumlah Kantong Darah"
                required
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-3"
              label="Jumlah Gol AB :"
              label-for="input-3"
            >
              <b-form-input
                id="input-3"
                v-model="form.ab"
                type="text"
                placeholder="Jumlah Kantong Darah"
                required
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-4"
              label="Jumlah Gol O :"
              label-for="input-4"
            >
              <b-form-input
                id="input-4"
                v-model="form.o"
                type="text"
                placeholder="Jumlah Kantong Darah"
                required
                autocomplete="off"
              ></b-form-input>
            </b-form-group>

            <b-button variant="primary" class="btn" @click="sendNewData()"
              >Update Data</b-button
            >
          </b-form>
        </div>
        <div class="col-lg-6"></div>
      </div>
    </div>
  </section>
</template>
<script>
import axios from "axios";
import Sidebar from "../SidebarContainer/Sidebar.vue";
import store from "../../store";
export default {
  components: {
    Sidebar,
  },
  props: ["id"],
  data() {
    return {
      form: {
        a: 0,
        b: 0,
        ab: 0,
        o: 0,
      },
      kategori: null,
    };
  },
  created() {
    axios(`/api/v1/blood/${this.id}`).then((response) => {
      const data = response.data.data;
      this.form.a = data.jumlah_gol_A;
      this.form.b = data.jumlah_gol_B;
      this.form.ab = data.jumlah_gol_AB;
      this.form.o = data.jumlah_gol_O;
      this.kategori = data.kategori;
    });
  },
  methods: {
    sendNewData() {
      store.dispatch("fetchAccessToken");
      axios
        .post(
          `/api/v1/blood/${this.id}`,
          {
            jumlah_gol_A: this.form.a,
            jumlah_gol_B: this.form.b,
            jumlah_gol_AB: this.form.ab,
            jumlah_gol_O: this.form.o,
          },
          {
            headers: {
              Authorization: `Bearer ${store.state.accessToken}`,
            },
          }
        )
        .then((respose) => {
          this.$router.push("/dashboard/blood");
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
