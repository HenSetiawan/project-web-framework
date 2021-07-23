<template>
  <section>
    <navbar />
    <!-- Begin Page Content -->
    <div class="container-fluid mt-5">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-4">
          <h3 class="h3 mb-4 text-gray-800 bold text-center">
            Stok Darah BDD Bondowoso
          </h3>
          <img
            src="../../public/img/ilustration/blood.jpg"
            alt=""
            class="img-fluid"
          />
        </div>
        <div class="col-lg-8 mt-5">
          <!-- DataTales Example -->
          <div class="card shadow mt-5">
            <div class="card-header py-3"></div>
            <div class="card-body">
              <b-table
                hover
                responsive
                id="pages-table"
                :items="allBloods"
                :fields="fields"
              >
              </b-table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
    <footer-vue />
  </section>
</template>
<script>
import axios from "axios";
import navbar from "../components/HeaderContainer/Navbar.vue";
import footerVue from "../components/FooterContainer/footer.vue";
export default {
  name: "BloodTable",
  data() {
    return {
      fields: [
        { key: "ID" },
        { key: "Kategori" },
        { key: "A" },
        { key: "B" },
        { key: "AB" },
        { key: "O" },
      ],
      allBloods: [],
    };
  },
  components: {
    navbar,
    footerVue,
  },
  created() {
    this.getAllBloods();
    console.log(this.allBloods);
  },
  methods: {
    getAllBloods() {
      const bloodItems = [];
      axios("/api/v1/bloods").then((response) => {
        response.data.data.forEach((item) => {
          let temp = {
            ID: item.id,
            Kategori: item.kategori,
            A: item.jumlah_gol_A,
            B: item.jumlah_gol_B,
            AB: item.jumlah_gol_AB,
            O: item.jumlah_gol_O,
          };
          bloodItems.push(temp);
        });
      });
      this.allBloods = bloodItems;
    },
  },
};
</script>

<style scoped>
h3 {
  font-family: "Mulish", sans-serif;
  font-weight: 700;
  font-size: 28px;
}
</style>
