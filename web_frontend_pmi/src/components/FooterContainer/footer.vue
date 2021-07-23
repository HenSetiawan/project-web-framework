<template>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4 mt-4">
          <h5><span class="circle-trafalgar text-center">T</span> Trafalgar</h5>
          <p class="mt-3">
            Trafalgar provides progressive, and affordable healthcare,
            accessible on mobile and online for everyone
          </p>
          <p>©Trafalgar PTY LTD 2020. All rights reserved</p>
        </div>
        <div class="col-md-8 col-lg-8">
          <div class="row">
            <div class="col-md-4 mt-5 col-lg-4">
              <h5>Features</h5>
              <ul class="mt-4">
                <li><router-link :to="{ name: 'home' }">About</router-link></li>
                <li>
                  <router-link :to="{ name: 'bloods' }">Stok Darah</router-link>
                </li>
                <li>
                  <router-link :to="{ name: 'blog' }">Artikel</router-link>
                </li>
                <li>
                  <router-link :to="{ name: 'home' }">Agenda</router-link>
                </li>
              </ul>
            </div>
            <div class="col-md-4 mt-5 col-lg-4">
              <h5>Area</h5>
              <ul class="mt-4">
                <li>
                  <a
                    href="https://www.google.com/maps/place/PMI+BONDOWOSO/@-7.9199336,113.8159895,15z/data=!4m5!3m4!1s0x0:0xbbdc77adedca9e4f!8m2!3d-7.919932!4d113.816051"
                    >Bondowoso</a
                  >
                </li>
                <li>
                  <a
                    href="https://www.google.com/maps/place/UDD+PMI+Kabupaten+Jember/@-8.1405127,113.7201315,15z/data=!4m5!3m4!1s0x0:0x9c50159aa2b88687!8m2!3d-8.1405127!4d113.7201315"
                    >Jember</a
                  >
                </li>
              </ul>
            </div>
            <div class="col-md-4 mt-5 col-lg-4">
              <h5>Help</h5>
              <ul class="mt-4">
                <li><a href="#">Help Center</a></li>
                <li><a href="#">Contact Suport</a></li>
                <li><a href="#">Instructions</a></li>
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
