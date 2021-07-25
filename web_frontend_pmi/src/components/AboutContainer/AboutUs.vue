<template>
  <div>
    <navbar />
    <section class="mb-2">
      <div class="container about-component">
        <div class="row">
          <section class="col-lg-12 text-center">
            <h2>About Us</h2>
            <p class="w-75 mx-auto">
              Profesional, berintegritas dan bergerak bersama masyarakat
            </p>
          </section>
        </div>
        <div class="row mt-5">
          <section class="col-lg-12">
            <h3 class="mb-3">Pengertian Palang Merah Indonesia</h3>
            <p>
              <strong>PALANG MERAH INDONESIA (PMI)</strong> adalah sebuah
              organisasi perhimpunan nasional di Indonesia yang bergerak dalam
              bidang sosial kemanusiaan. PMI tidak memihak golongan politik,
              ras, suku ataupun agama tertentu. Palang Merah Indonesia dalam
              pelaksanaannya juga tidak melakukan pembedaan, tetapi mengutamakan
              korban yang paling membutuhkan pertolongan segera untuk
              keselamatan jiwanya.<br /><br />
              Dalam melaksanakan aksi-aksi kemanusiaannya, PMI selalu memegang
              teguh
              <b
                >7 (tujuh) Prinsip Dasar Gerakan Internasional Palang Merah dan
                Bulan Sabit Merah yaitu Kemanusiaan, Kesamaan, Kesukarelaan,
                Kemandirian, Kesatuan, Kenetralan dan Kesemestaan</b
              >.
            </p>
            <h3 class="mb-3 mt-5">Apa itu AIMA ?</h3>
            <p>
              <strong>AIMA</strong> adalah sistem informasi PMI Bondowoso yang
              memudahkan petugas dan relawan unutuk mendata dan mendaftarkan
              diri sebagai pedonor darah yang bisa di akses di mana saja AIMA
              juga memuduhkan masyarat untuk melihat informasi tentang stok
              darah yang ada di PMI Bondowoso. Dengan adanya aplikasi ini kami
              berharap memberikan solusi untu masyarakat yang yang ingin
              mendonorkan darahnya di PMI Bondowoso dengan mudah. Aplikasi ini
              dirancang oleh mahasiswa Politeknik Negeri Jember dalam rangka
              <strong>Tugas Akhir Workshop</strong>. Berikut daftar list
              kelompok : <br/><br/>
            <ul class="ml-3">
              <li>Hendy Setiawan (E41191280)</li>
              <li>Dwi Rifki Novianto (E41191107)</li>
              <li>Mochammad Fajar Fitrian Nurbayu (E41191240)</li>
              <li>Dewi Agerti Nurifiani (E41191202)</li>
              <li>Tegar Ar Rasyiid Saifullah (E41191211)</li>
            </ul>
            </p>
          </section>
        </div>
      </div>
    </section>
    <footer-vue/>
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
.about-component {
  margin-top: 80px;
  font-family: "Mulish", sans-serif;
}
.about-component h2 {
  font-weight: 700;
  font-size: 36px;
}
.about-component h3 {
  font-weight: 700;
  font-size: 20px;
}
.about-component p {
  color: #7d7987;
}
</style>
