<template>
  <div>
    <navbar />
    <section class="mb-2">
      <div class="container instruction-component">
        <div class="row">
          <section class="col-lg-12 text-center">
            <h2>Cara Penggunaan Aplikasi</h2>
          </section>
        </div>
        <div class="row mt-5">
          <section class="col-lg-12">
            <h3 class="mb-3">Cara mencari tahu jumlah stok darah ?</h3>
            <ul class="ml-3">
              <li>
                Pertama pilih bagian <strong> Stok Darah</strong> pada Navbar
                maupun Footer
              </li>
              <li>
                Atau Anda dapat kunjungi halaman berikut
                <router-link :to="{ name: 'bloods' }"
                  >Halaman Stok Darah</router-link
                >
              </li>
              <li>
                Sekarang Anda bisa temukan jumlah stok darah yang tersedia
              </li>
            </ul>
            <img
              src="../../../public/img/BloodsPMI.png"
              alt=""
              class="col-lg-6"
            />
            <h3 class="mb-3 mt-5">
              Cara mendaftarkan diri menjadi Relawan atau User ?
            </h3>
            <ul class="ml-3">
              <li>
                Pertama download aplikasi terlebih dahulu pada halaman berikut
                <router-link :to="{ name: 'home' }">Halaman Utama</router-link>
              </li>
              <li>Kemudian pada aplikasi cari icon akun</li>
              <li>Kemudian pilih registrasi, lalu isi data diri</li>
              <li>
                Selamat Anda telah berhasil mendaftarkan pada aplikasi kami
              </li>
              <li>
                Selanjutnya jika Anda mendaftarkan diri sebagai user, Anda
                berhak mengakses data relawan kami
              </li>
            </ul>
            <img
              src="../../../public/img/MobileAppsPMI.jpeg"
              alt=""
              class="ml-3"
              height="300"
            />
          </section>
        </div>
      </div>
    </section>
    <footer-vue />
  </div>
</template>
<script>
import navbar from "../HeaderContainer/Navbar.vue";
import footerVue from "../FooterContainer/footer.vue";
export default {
  components: {
    navbar,
    footerVue,
  },
};
</script>
<style scoped>
.instruction-component {
  margin-top: 80px;
  font-family: "Mulish", sans-serif;
}
.instruction-component h2 {
  font-weight: 700;
  font-size: 36px;
}
.instruction-component h3 {
  font-weight: 700;
  font-size: 20px;
}
.instruction-component p {
  color: #7d7987;
}
</style>
