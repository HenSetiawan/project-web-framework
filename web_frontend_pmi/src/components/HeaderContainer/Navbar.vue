<template>
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">
      <img src="../../../public/img/icons/pmi.jpg" alt="logo palang merah indonesia">
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item mr-2">
          <a class="nav-link" href="#">Beranda</a>
        </li>
        <li class="nav-item mr-2">
          <a class="nav-link" href="#">Stok Darah</a>
        </li>
        <li class="nav-item mr-2">
          <a class="nav-link" href="#">Daftar Relawan</a>
        </li>
        <li class="nav-item mr-2">
          <a class="nav-link" href="#">Tentang</a>
        </li>
        <li class="nav-item mr-2">
          <a class="nav-link" href="#">Artikel</a>
        </li>
        <li class="nav-item ml-5 rounded-pill">
          <a class="btn btn-sm btn-outline-danger mt-2" href="#">Masuk</a>
        </li>
      </ul>
    </div>
  </nav>
</div>
</template>

<script>
export default {
  name: "navbar",
};
</script>

<style scoped>
.navbar-nav {
  padding: 10px;
  display: flex;
  align-content: center;
}
li a,
.navbar-brand {
  font-family: "Mulish", sans-serif;
  font-weight: 400;
  color: #1f1534 im !important;
}

.navbar-brand>img{
  width: 55px;
  height: 55px;
}
</style>
