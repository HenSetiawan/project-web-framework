<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-5">
      <!-- Page Heading -->
      <h3 class="h3 mb-4 text-gray-800 bold">Daftar Frequently Ask Question</h3>
      <div class="row">
        <div class="col-md-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <router-link
                :to="{ name: 'addNewFAQ' }"
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
                :items="allFAQs"
                :fields="fields"
              >
                <template #cell(Aksi)="row">
                  <router-link
                    :to="{ name: 'editFAQ', params: { id: row.item.ID } }"
                    class="btn-sm btn btn-warning btn-sm w-100"
                    >Update</router-link
                  ><br />
                  <button
                    class="btn btn-danger btn-sm mt-2 w-100"
                    @click="deleteFAQ(row.item.ID)"
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
  name: "FAQTable",
  components: { Sidebar },
  data() {
    return {
      fields: [
        { key: "ID" },
        { key: "Questions" },
        { key: "Answers" },
        { key: "Aksi" },
      ],
      allFAQs: [],
    };
  },
  created() {
    this.getAllFAQs();
  },
  methods: {
    deleteFAQ(id) {
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
              .delete(`/api/v1/ask/${id}`, {
                headers: {
                  Authorization: `Bearer ${store.state.accessToken}`,
                },
              })
              .then((response) => {
                console.log(response);
                this.getAllFAQs();
              })
              .catch((err) => {
                console.log(err);
              });
          }
        });
    },
    getAllFAQs() {
      axios("/api/v1/asks")
        .then((result) => {
          console.log(result.data);
          let FAQItems = [];
          result.data.data.forEach((data) => {
            let temp = {
              ID: data.id,
              Questions: data.question,
              Answers: data.answer,
            };

            FAQItems.push(temp);
          });

          this.allFAQs = FAQItems;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
