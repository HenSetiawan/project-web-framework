<template>
  <section>
    <navbar />
    <list-blog />
  </section>
</template>
<script>
import navbar from "../components/HeaderContainer/Navbar.vue";
import listBlog from "../components/BlogContainer/ListBlog.vue";
export default {
  name: "Blog",
  components: {
    navbar,
    listBlog,
  },
};
</script>
