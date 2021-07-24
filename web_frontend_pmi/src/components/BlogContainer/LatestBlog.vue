<template>
  <section class="container blogs-component">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Check out our latest article</h2>
      </div>
    </div>
    <div class="row mb-5">
      <div
        class="col-md-4 col-lg-4 col-sm-6"
        v-for="(result, index) in results.data"
        :key="index"
      >
        <div class="card blog-card">
          <img :src="result.thumbnail" alt="blog image" height="200" />
          <div class="card-body">
            <h5 class="card-title">{{ result.judul_blog }}</h5>
            <p
              class="card-text"
              v-html="result.content.substring(0, 100) + ' ... '"
            ></p>
            <router-link :to="{ name: 'detailBlog', params: { id: result.id } }"
              >Read more <i class="fas fa-arrow-right"></i
            ></router-link>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center mt-3">
        <router-link
          :to="{ name: 'blog' }"
          class="btn btn-learn-more btn-outline-danger"
          >View All</router-link
        >
      </div>
    </div>
  </section>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      results: [],
    };
  },
  created() {
    axios
      .get(`/api/v1/blogs/current`)
      .then((response) => {
        this.results = response.data;
      })
      .catch((err) => {
        console.log(err);
      });
  },
};
</script>
<style scoped>
a {
  color: rgb(228, 91, 91) !important;
}
.btn-outline-danger:hover {
  color: white !important;
}
</style>
