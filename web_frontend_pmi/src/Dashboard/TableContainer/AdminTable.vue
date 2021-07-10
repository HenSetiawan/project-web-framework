<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-5">
      <!-- Page Heading -->
      <h3 class="h3 mb-4 text-gray-800 bold">Daftar Admin</h3>
      <div class="row">
        <div class="col-md-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3"></div>
            <div class="card-body">
              <router-link
                :to="{ name: 'addNewEvent' }"
                class="btn-sm btn btn-primary btn-sm mb-2"
                >Tambah Data</router-link
              >
              <b-table
                hover
                head-variant="dark"
                id="pages-table"
                :items="allAdmins"
                :fields="fields"
              >
                <template #cell(Aksi)="row">
                  <router-link
                    :to="{ name: 'eventTable' }"
                    class="btn-sm btn btn-warning btn-sm"
                    >Update</router-link
                  >
                  <button
                    class="btn btn-danger btn-sm ml-1"
                    @click="deleteAdmin(row.item.ID)"
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
  name: "eventTable",
  components: { Sidebar },
  data() {
    return {
      fields: [
        { key: "ID" },
        { key: "Nama" },
        { key: "Email" },
        { key: "Telp" },
        { key: "Aksi" },
      ],
      allAdmins: [],
    };
  },
  created() {
    this.getAllAdmins();
  },
  methods: {
    deleteAdmin(id) {
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
              .delete(`/api/v1/admin/${id}`, {
                headers: {
                  Authorization: `Bearer ${store.state.accessToken}`,
                },
              })
              .then((response) => {
                console.log(response);
                this.getAllAdmins();
              })
              .catch((err) => {
                console.log(err);
              });
          }
        });
    },
    getAllAdmins() {
      axios("/api/v1/admins", {
        headers: {
          Authorization: `Bearer ${store.state.accessToken}`,
        },
      })
        .then((result) => {
          console.log(result.data);
          let adminItems = [];
          result.data.data.forEach((data) => {
            let temp = {
              ID: data.id,
              Nama: data.username,
              Email: data.email,
              Telp: data.no_hp,
            };

            adminItems.push(temp);
          });

          this.allAdmins = adminItems;
          console.log(adminItems);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
