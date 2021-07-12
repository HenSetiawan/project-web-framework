<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-5">
      <!-- Page Heading -->
      <h3 class="h3 mb-4 text-gray-800 bold">Kegiatan Yang Tersedia</h3>
      <div class="row">
        <div class="col-md-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <router-link
                :to="{ name: 'addNewEvent' }"
                class="btn-sm btn btn-primary btn-sm"
                >Tambah Data</router-link
              >
            </div>
            <div class="card-body">
              <b-table
                hover
                head-variant="dark"
                id="pages-table"
                :items="allEvents"
                :fields="fields"
              >
                <template #cell(Aksi)="row">
                  <router-link
                    class="btn-sm btn btn-warning btn-sm w-100"
                    :to="{ name: 'updateEvent', params: { id: row.item.ID } }"
                    >Update</router-link
                  ><br />
                  <button
                    class="btn btn-danger btn-sm mt-2 w-100"
                    @click="deleteEvent(row.item.ID)"
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
        { key: "Judul" },
        { key: "Waktu" },
        { key: "Deskripsi" },
        { key: "Tempat" },
        { key: "Aksi" },
      ],
      allEvents: [],
    };
  },
  created() {
    this.getAllEvent();
  },
  methods: {
    deleteEvent(id) {
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
              .delete(`/api/v1/event/${id}`, {
                headers: {
                  Authorization: `Bearer ${store.state.accessToken}`,
                },
              })
              .then((response) => {
                console.log(response);
                this.getAllEvent();
              })
              .catch((err) => {
                console.log(err);
              });
          }
        });
    },
    getAllEvent() {
      axios("/api/v1/events")
        .then((result) => {
          console.log(result.data);
          let eventItems = [];
          result.data.data.forEach((event) => {
            let temp = {
              ID: event.id,
              Judul: event.judul_agenda,
              Waktu: event.waktu,
              Deskripsi: event.deskripsi,
              Tempat: event.lokasi,
            };

            eventItems.push(temp);
          });

          this.allEvents = eventItems;
          console.log(eventItems);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
