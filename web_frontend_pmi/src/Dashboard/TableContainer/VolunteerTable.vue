<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-5">
      <!-- Page Heading -->
      <h3 class="h3 mb-4 text-gray-800 bold">Daftar Relawan</h3>
      <div class="row">
        <div class="col-md-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <router-link
                :to="{ name: 'addNewVolunteer' }"
                class="btn-sm btn btn-primary btn-sm"
                >Tambah Data</router-link
              >
            </div>
            <div class="card-body">
              <b-table
                hover
                responsive
                head-variant="dark"
                id="pages-table"
                :items="allVolunteers"
                :fields="fields"
              >
                <template #cell(Aksi)="row">
                  <button
                    class="btn btn-danger btn-sm mt-2 w-100"
                    @click="deleteVolunteer(row.item.ID)"
                  >
                    Delete
                  </button>
                </template>
              </b-table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Sidebar from "../SidebarContainer/Sidebar.vue";
import axios from "axios";
import store from "../../store";
export default {
  name: "volunteerTable",
  components: { Sidebar },
  data() {
    return {
      fields: [
        { key: "ID" },
        { key: "Nama" },
        { key: "Alamat" },
        { key: "Golongan_Darah" },
        { key: "Tanggal_Lahir" },
        { key: "Aksi" },
      ],
      allVolunteers: [],
    };
  },
  created() {
    this.getAllVolunteers();
  },
  methods: {
    deleteVolunteer(id) {
      store.dispatch("fetchAccessToken");
      this.$swal
        .fire({
          title: "Apakah Anda Yakin?",
          text: "Data ini akan terhapus secara permanen",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Hapus Data!",
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios
              .delete(`/api/v1/volunteer/${id}`, {
                headers: {
                  Authorization: `Bearer ${store.state.accessToken}`,
                },
              })
              .then((response) => {
                console.log(response);
                this.getAllVolunteers();
              })
              .catch((err) => {
                console.log(err);
              });
          }
        });
    },
    getAllVolunteers() {
      axios("/api/v1/volunteers", {
        headers: {
          Authorization: `Bearer ${store.state.accessToken}`,
        },
      })
        .then((result) => {
          console.log(result.data);
          let volunteerItems = [];
          result.data.data.forEach((data) => {
            let temp = {
              ID: data.id,
              Nama: data.username,
              Alamat: data.alamat,
              Golongan_Darah: data.gol_darah,
              Tanggal_Lahir: data.tanggal_lahir,
            };

            volunteerItems.push(temp);
          });

          this.allVolunteers = volunteerItems;
          console.log(volunteerItems);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
