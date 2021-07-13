<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-5">
      <!-- Page Heading -->
      <h3 class="h3 mb-4 text-gray-800 bold">Daftar Users</h3>
      <div class="row">
        <div class="col-md-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3"></div>
            <div class="card-body">
              <b-table
                hover
                responsive
                head-variant="dark"
                id="pages-table"
                :items="allUsers"
                :fields="fields"
                class="text-center"
              >
                <template #cell(Aksi)="row">
                  <button
                    class="btn btn-danger btn-sm ml-1 w-100"
                    @click="deleteUser(row.item.ID)"
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
      allUsers: [],
    };
  },
  created() {
    this.getAllUsers();
  },
  methods: {
    deleteUser(id) {
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
              .delete(`/api/v1/users/${id}`, {
                headers: {
                  Authorization: `Bearer ${store.state.accessToken}`,
                },
              })
              .then((response) => {
                console.log(response);
                this.getAllUsers();
              })
              .catch((err) => {
                console.log(err);
              });
          }
        });
    },
    getAllUsers() {
      axios("/api/v1/users/", {
        headers: {
          Authorization: `Bearer ${store.state.accessToken}`,
        },
      })
        .then((result) => {
          console.log(result.data);
          let userItems = [];
          result.data.data.forEach((data) => {
            let temp = {
              ID: data.id,
              Nama: data.username,
              Email: data.email,
              Telp: data.no_hp,
            };

            userItems.push(temp);
          });

          this.allUsers = userItems;
          console.log(userItems);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
