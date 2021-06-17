<template>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="#">
        <img
          src="../../../public/img/icons/pmi.jpg"
          alt="logo palang merah indonesia"
        />
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
           <router-link :to="{ name: 'home'}" class="nav-link">Beranda</router-link>
          </li>
          <li class="nav-item mr-2">
            <a class="nav-link" href="#">Stok Darah</a>
          </li>
          <li class="nav-item mr-2">
           <router-link :to="{ name: 'blog'}" class="nav-link">Artikel</router-link>
          </li>
          <li class="nav-item mr-2">
            <a class="nav-link" href="#">Tentang</a>
          </li>
          <li class="nav-item mr-2">
            <a class="nav-link" href="#">FAQ</a>
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

.navbar-brand > img {
  width: 55px;
  height: 55px;
}

.nav-link::after {
  content: "";
  display: block;
  width: 0;
  height: 2px;
  background: #fa1140;
  transition: width 0.3s;
}

.nav-link:hover::after {
  width: 100%;
}
</style>
