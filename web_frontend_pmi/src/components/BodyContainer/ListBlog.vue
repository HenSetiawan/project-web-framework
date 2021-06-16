<template>
  <!-- header blog -->
  <div class="main-banner header-text">
    <div class="container-fluid">
      <div class="owl-banner owl-carousel">
        <div class="item" v-for="blog in blogs" :key="blog.title">
          <img src="../../../public/img/cure.svg" alt="" />
          <div class="item-content">
            <div class="main-content">
              <div class="meta-category">
                <span>{{ blog.title }}</span>
              </div>
              <router-link to="/">
                <h5>{{ blog.desc }}</h5>
              </router-link>
              <ul class="post-info">
                <li><a href="#">Admin</a></li>
                <li><a href="#">May 12, 2020</a></li>
                <li><a href="#">12 Comments</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of header blog -->

  <!-- download -->

  <!-- end of download -->
</template>

<script>
export default {
  data() {
    return {
      blogs: [
        { title: "Donor Darah", desc: "Anda Dapat Mendonorkan Darah Anda" },
        { title: "Donor Darah", desc: "Anda Dapat Mendonorkan Darah Anda" },
        { title: "Donor Darah", desc: "Anda Dapat Mendonorkan Darah Anda" },
      ],
    };
  },
};
</script>
