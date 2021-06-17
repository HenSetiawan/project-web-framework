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
      <div class="row mt-2">
        <div class="col-lg-12 col-md-12 text-center">
          <a href="#" class="btn btn-outline-danger btn-learn-more"
            >Learn more</a
          >
        </div>
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
