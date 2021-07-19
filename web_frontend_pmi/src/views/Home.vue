<template>
  <div class="home">
    <navbar />
    <header-vue />
    <services />
    <mobile-app />
    <latest-blog />
    <list-faq />
    <footer-vue />
  </div>
</template>
<script>
import navbar from "../components/HeaderContainer/Navbar.vue";
import headerVue from "../components/HeaderContainer/Header.vue";
import services from "../components/BodyContainer/Services.vue";
import mobileApp from "../components/BodyContainer/MobileApps.vue";
import latestBlog from "../components/BlogContainer/LatestBlog.vue";
import footerVue from "../components/FooterContainer/footer.vue";
import listFaq from "../components/FAQsContainer/ListFAQ.vue";
export default {
  name: "Home",
  components: {
    navbar,
    headerVue,
    services,
    mobileApp,
    latestBlog,
    listFaq,
    footerVue,
  },
};
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;700&display=swap");
@import "../assets/css/home.css";
</style>
