<template>
  <section class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div class="col-lg-6"><card-blog /></div>
          <div class="col-lg-6"><card-blog /></div>
          <div class="col-lg-6"><card-blog /></div>
          <div class="col-lg-6"><card-blog /></div>
        </div>
      </div>
      <div class="col-lg-4 mt-5">
        <recent-blog />
      </div>
    </div>
  </section>
</template>

<script>
import cardBlog from "../BlogContainer/CardBlog.vue";
import recentBlog from "../BlogContainer/RecentBlog.vue";
export default {
  name: "listBlog",
  data() {
    return {
      blogs: [
        { title: "Donor Darah", desc: "Anda Dapat Mendonorkan Darah Anda" },
        { title: "Donor Darah", desc: "Anda Dapat Mendonorkan Darah Anda" },
        { title: "Donor Darah", desc: "Anda Dapat Mendonorkan Darah Anda" },
      ],
    };
  },
  components: {
    cardBlog,
    recentBlog,
  },
};
</script>

<style scoped>
@import "../../assets/css/blog/templatemo-stand-blog.css";
@import "../../assets/css/blog/owl.css";
</style>
