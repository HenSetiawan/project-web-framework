<template>
  <section class="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="all-blog-posts">
            <div class="row">
              <div class="col-lg-12">
                <div class="blog-post">
                  <div class="blog-thumb">
                    <img :src="results.thumbnail" alt="" />
                  </div>
                  <div class="down-content">
                    <a href="#"
                      ><h4>{{ results.judul_blog }}</h4></a
                    >
                    <ul class="post-info">
                      <li><a href="#">Admin</a></li>
                      <li>
                        <a href="#"> Created {{ results.created_at }}</a>
                      </li>
                      <li>
                        <a href="#" class="username">{{ results.username }}</a>
                      </li>
                    </ul>
                    <p v-html="results.content"></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <recent-blog />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import recentBlog from "../BlogContainer/RecentBlog.vue";
import axios from "axios";
export default {
  name: "ContentBlog",
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
      .get(`/api/v1/blog/${this.$route.params.id}`)
      .then((response) => {
        this.results = response.data.data;
      })
      .catch((err) => {
        console.log(err);
      });
  },
  watch: {
    $route() {
      location.reload();
    },
  },
};
</script>
<style scoped>
.username {
  text-transform: capitalize;
}
@media only screen and (max-width: 450px) {
  .blog-posts .blog-thumb img {
    height: 220px !important;
  }
}
@media screen and (max-width: 1400px) and (min-width: 520px) {
  .blog-posts .blog-thumb img {
    height: 400px !important;
  }
}
</style>
