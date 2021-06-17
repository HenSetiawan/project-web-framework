<template>
  <div class="row mt-5 services-list mb-5">
    <div class="col-lg-4" v-for="service in services" :key="service.title">
      <card-services :title="service.title" :description="service.desc"/>
    </div>
  </div>
</template>
<script>
import cardServices from "../utilities/Card.vue";
export default {
  data() {
    return {
      services: [
        { title: "Donor Darah", desc: "Anda Dapat Menemukan Agenda Donor Darah Dan Turut Menjadi Relawan" },
        { title: "Cari Stok Darah", desc: "Anda Dapat Mencari Stok Darah Yang Tersedia Pada Unit Transfusi Darah" },
        { title: "Temukan Relawan", desc: "Anda Dapat Menemukan Relawan Yang Cocok Dengan Anda Atau Keluarga Anda" },
      ],
    };
  },
  components: {
    cardServices,
  },
};
</script>
