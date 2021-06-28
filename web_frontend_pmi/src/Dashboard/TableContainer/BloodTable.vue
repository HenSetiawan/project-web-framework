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
                :items="bloodItems"
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
export default {
  name: "BloodTable",
  data() {
    return {
      bloodItems: [],
      fields: [
        { key: "Kategori" },
        { key: "A" },
        { key: "B" },
        { key: "AB" },
        { key: "O" },
        { key: "Aksi" },
      ],
    };
  },
  components: {
    Sidebar,
  },
  created() {
    fetch("http://127.0.0.1:8000/api/v1/bloods")
      .then((response) => {
        return response.json();
      })
      .then((data) => {
        data.data.forEach((item) => {
          let temp = {
            Kategori: item.kategori,
            A: item.jumlah_gol_A,
            B: item.jumlah_gol_B,
            AB: item.jumlah_gol_AB,
            O: item.jumlah_gol_O,
          };
          this.bloodItems.push(temp);
        });
      });

    console.log(this.bloodItems);
  },
  methods: {
    resetItem(row) {
      console.log(row);
    },
    updateItem(){
      console.log('update')
    }
  },
};
</script>
