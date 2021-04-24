<template>
  <div class="home">
    <navbar></navbar>
    <header-vue></header-vue>
  </div>
</template>
<script>
import navbar from "../components/HeaderContainer/Navbar.vue";
import headerVue from "../components/HeaderContainer/Header.vue";
export default {
  name: "Home",
  components: {
    navbar,
    headerVue,
  },
};
</script>
