<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-5">
      <!-- Page Heading -->
      <h3 class="h3 mb-4 text-gray-800 bold">Daftar Artikel</h3>
      <div class="row">
        <div class="col-md-12">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <router-link
                :to="{ name: 'addNewBlog' }"
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
                :items="allBlogs"
                :fields="fields"
              >
                <template v-slot:cell(Thumbnail)="row">
                  <img
                    class="img-fluid img-thumbnail"
                    :src="row.item.Thumbnail"
                    alt="..."
                    width="100"
                  />
                </template>
                <template #cell(Aksi)="row">
                  <router-link
                    :to="{ name: 'editBlog', params: { id: row.item.ID } }"
                    class="btn-sm btn btn-warning btn-sm w-100"
                    >Update</router-link
                  ><br />
                  <button
                    class="btn btn-danger btn-sm mt-2 w-100"
                    @click="deleteBlog(row.item.ID)"
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
  name: "blogTable",
  components: { Sidebar },
  data() {
    return {
      fields: [
        { key: "ID" },
        { key: "Judul_Blog" },
        { key: "Thumbnail" },
        { key: "Nama_Penulis" },
        { key: "Created_at" },
        { key: "Aksi" },
      ],
      allBlogs: [],
    };
  },
  created() {
    this.getAllBlogs();
  },
  methods: {
    deleteBlog(id) {
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
              .delete(`/api/v1/blog/${id}`, {
                headers: {
                  Authorization: `Bearer ${store.state.accessToken}`,
                },
              })
              .then((response) => {
                console.log(response);
                this.getAllBlogs();
              })
              .catch((err) => {
                console.log(err);
              });
          }
        });
    },
    getAllBlogs() {
      axios("/api/v1/blogs")
        .then((result) => {
          console.log(result.data);
          let blogItems = [];
          result.data.data.forEach((data) => {
            let temp = {
              ID: data.id,
              Judul_Blog: data.judul_blog,
              Thumbnail: data.thumbnail,
              Nama_Penulis: data.username,
              Created_at: data.created_at,
            };

            blogItems.push(temp);
          });

          this.allBlogs = blogItems;
          console.log(blogItems);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>
