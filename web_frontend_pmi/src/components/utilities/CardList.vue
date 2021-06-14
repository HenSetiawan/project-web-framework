<template>
  <div class="row mt-5 services-list mb-5">
    <div class="col-lg-4" v-for="service in services" :key="service.title">
      <card-services  />
    </div>
  </div>
</template>
<script>
import cardServices from "../utilities/Card.vue";
export default {
  data() {
    return {
      services: [
        { title: "Donor Darah", desc: "Anda Dapat Mendonorkan Darah Anda" },
        { title: "Donor Darah", desc: "Anda Dapat Mendonorkan Darah Anda" },
        { title: "Donor Darah", desc: "Anda Dapat Mendonorkan Darah Anda" },
      ],
    };
  },
  components: {
    cardServices,
  },
};
</script>
