<template>
  <section>
    <navbar-vue />
    <content-blog />
  </section>
</template>

<script>
import contentBlog from "../components/BlogContainer/ContentBlog.vue";
import navbarVue from "../components/HeaderContainer/Navbar.vue";
export default {
  name: "DetailBlog",
  components: {
    contentBlog,
    navbarVue,
  },
};
</script>
