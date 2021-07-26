<template>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4 mt-5">
          <h5>PMI Bondowoso</h5>
          <p class="mt-3">
            Profesional, berintegritas dan bergerak bersama masyarakat
          </p>
          <p>©PMI Bondowoso 2021. All rights reserved</p>
        </div>
        <div class="col-md-8 col-lg-8">
          <div class="row">
            <div class="col-md-4 mt-5 col-lg-4">
              <h5>Layanan</h5>
              <ul class="mt-4">
                <li>
                  <router-link :to="{ name: 'bloods' }"
                    >Pantau Stok Darah</router-link
                  >
                </li>
                <li>
                  <router-link :to="{ name: 'home' }"
                    >Temukan Pendonor</router-link
                  >
                </li>
                <li>
                  <a
                    href="https://drive.google.com/drive/folders/1YkXb-JL-vyWbgAKBvl8dV8XlRh5gzdFY?usp=sharing"
                    >Apps</a
                  >
                </li>
              </ul>
            </div>
            <div class="col-md-4 mt-5 col-lg-4">
              <h5>Wilayah</h5>
              <ul class="mt-4">
                <li>
                  <a href="https://goo.gl/maps/UqTpGbru8HQ8PTmx5">Bondowoso</a>
                </li>
              </ul>
            </div>
            <div class="col-md-4 mt-5 col-lg-4">
              <h5>Bantuan</h5>
              <ul class="mt-4">
                <li>
                  <a
                    href="https://mail.google.com/mail/?view=cm&fs=1&to=aimabws326@gmail.com"
                    >Help Center</a
                  >
                </li>
                <li>
                  <a href="https://api.whatsapp.com/send?phone=6283047550006"
                    >Contact Suport</a
                  >
                </li>
                <li>
                  <router-link :to="{ name: 'instruction' }"
                    >Instructions</router-link
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>

<style scoped>
p {
  color: white !important;
}
a:hover {
  font-weight: bold;
  color: white;
  text-decoration: none;
}
</style>
