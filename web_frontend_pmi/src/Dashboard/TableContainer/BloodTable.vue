<template>
  <section class="d-flex">
    <sidebar />
    <!-- Begin Page Content -->
    <div class="container-fluid mt-5">
      <!-- Page Heading -->
      <h1 class="h3 mb-4 text-gray-800 bold">Formulir Stok Darah</h1>

      <div class="row">
        <div class="col-md-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <router-link
                :to="{ name: 'bloodform' }"
                class="btn-sm btn btn-primary"
                >Tambah Data</router-link
              >
            </div>
            <div class="card-body">
              <b-table
                hover
                head-variant="dark"
                id="pages-table"
                :items="allBloods"
                :fields="fields"
              >
                <template #cell(Aksi)="row">
                  <button
                    class="btn btn-warning btn-sm"
                    @click="updateItem(row)"
                  >
                    Update
                  </button>
                  <button
                    class="btn btn-danger btn-sm ml-2"
                    @click="resetItem(row)"
                  >
                    Reset
                  </button>
                </template>
              </b-table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
</template>
<script>
import Sidebar from "../SidebarContainer/Sidebar.vue";
import axios from "axios";
import store from "../../store";
export default {
  name: "BloodTable",
  data() {
    return {
      fields: [
        { key: "Kategori" },
        { key: "A" },
        { key: "B" },
        { key: "AB" },
        { key: "O" },
        { key: "Aksi" },
      ],
      allBloods:[]
    };
  },
  components: {
    Sidebar,
  },
  created() {
    this.getAllBloods();
  },
  methods: {
    resetItem(row) {
      store.dispatch("fetchAccessToken");
      const kategori = row.item.Kategori;
      fetch(`http://127.0.0.1:8000/api/v1/blood/${kategori}`, {
        method: "PUT",
        headers: {
          Authorization: `Bearer ${store.state.accessToken}`,
        },
      })
        .then((response) => {
          return response.json();
        })
        .then((response) => {
          console.log(response.data);
          this.getAllBloods();
        })
        .catch((err) => {
          console.log(err);
        });
    },

    updateItem() {
      console.log("update");
    },
    getAllBloods() {
      const bloodItems = [];
      axios("/api/v1/bloods").then((response) => {
        response.data.data.forEach((item) => {
          let temp = {
            Kategori: item.kategori,
            A: item.jumlah_gol_A,
            B: item.jumlah_gol_B,
            AB: item.jumlah_gol_AB,
            O: item.jumlah_gol_O,
          };
          bloodItems.push(temp);
        });
      });
      this.allBloods=bloodItems;
    },
  },
};
</script>
