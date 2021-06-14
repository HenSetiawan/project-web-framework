<template>
  <!-- services -->
  <section class="services-list">
    <div class="container services-component">
      <div class="row">
        <section class="col-lg-12 text-center">
          <h2>Layanan Kami</h2>
          <p class="w-75 mx-auto">
            We provide to you the best choiches for you. Adjust it to your
            health needs and make sure your undergo treatment with our highly
            qualified doctors you can consult with us which type of service is
            suitable for your health
          </p>
        </section>
      </div>
      <div class="row">
        <Card-list/>
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
import CardList from '../utilities/CardList.vue';
export default {
  components: { CardList },
};
</script>
