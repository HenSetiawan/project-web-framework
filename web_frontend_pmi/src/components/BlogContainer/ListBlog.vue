<template>
  <section class="container">
    <div class="row">
      <div class="col-lg-8">
        <div class="row">
          <div
            class="col-lg-6"
            v-for="(result, index) in results.data"
            :key="index"
          >
            <div class="card blog-card">
              <img :src="result.thumbnail" alt="blog image" height="200" />
              <div class="card-body">
                <h5 class="card-title">
                  {{ result.judul_blog }}
                </h5>
                <p
                  class="card-text"
                  v-html="result.content.substring(0, 100) + ' ... '"
                ></p>
                <router-link
                  :to="{ name: 'detailBlog', params: { id: result.id } }"
                  >Read more <i class="fas fa-arrow-right"></i
                ></router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 mt-5">
        <recent-blog />
      </div>
    </div>
  </section>
</template>

<script>
import recentBlog from "../BlogContainer/RecentBlog.vue";
import axios from "axios";
export default {
  name: "listBlog",
  components: {
    recentBlog,
  },
  data() {
    return {
      results: [],
    };
  },
  created() {
    axios
      .get("/api/v1/blogs")
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
@import "../../assets/css/blog/templatemo-stand-blog.css";
@import "../../assets/css/blog/owl.css";
a {
  color: rgb(228, 91, 91) !important;
}
</style>
