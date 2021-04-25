<template>
  <!-- header -->
  <section class="container">
    <div class="row header-component">
      <section class="col-lg-6">
        <h1>Give Blood Safe Live</h1>
        <p>
          Darahmu bisa menyelamatkan nyawa mereka, donor darah anda adalah hadiah luar biasa untuk orang-orang yang membutuhkannya
        </p>
        <a href="#" class="btn btn-sm btn-volunteer">Menjadi Relawan</a>
      </section>
      <section class="col-lg-6">
        <img
          src="../../../public/img/ilustration/blood.jpg"
          alt=""
          class="img-fluid"
        />
      </section>
    </div>
  </section>
  <!-- header end -->
</template>

<script>
export default {
  name: "header",
};
</script>

<style scoped>
.header-component h1 {
  font-family: "Mulish", sans-serif;
  font-weight: 700;
  font-size: 48px;
  margin-top: 120px;
}
.header-component p {
  font-family: "Mulish", sans-serif;
  font-size: 21px;
  font-style: normal;
  font-weight: 300;
  line-height: 32px;
  letter-spacing: 0em;
  text-align: left;
  color: #7d7987;
}
.btn-volunteer {
  margin-top: 45px;
  width: 200px !important;
  font-size: 18px !important;
  height: 56px !important;
  color: white !important;
  font-family: "Mulish", sans-serif !important;
  font-weight: 700 !important;
  line-height: 45px !important;
  border-radius: 55px !important;
  background-color:#fa1140 !important;
}
</style>
