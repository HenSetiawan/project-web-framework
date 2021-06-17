<template>
  <!-- services -->
  <section class="services-list mb-5">
    <div class="container services-component">
      <div class="row">
        <section class="col-lg-12 text-center">
          <h2>Layanan Kami</h2>
          <p class="w-75 mx-auto">
            Memelihara reputasi organisasi PMI di tingkat nasional dan
            internasional, Menjadi organisasi kemanusiaan terdepan yang
            memberikan layanan berkualitas
          </p>
        </section>
      </div>
      <div class="row">
        <Card-list />
      </div>
    </div>
  </section>
  <!-- services end -->
</template>

<script>
import CardList from "../utilities/ServiceList.vue";
export default {
  components: { CardList },
};
</script>
