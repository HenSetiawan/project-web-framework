<template>
  <div class="sidebar-blog">
    <div class="row">
      <div class="col-lg-12 mt-4">
        <div class="sidebar-blog-item search">
          <form id="search_form" name="gs" method="GET" action="#">
            <input
              type="text"
              name="q"
              class="searchText"
              placeholder="type to search..."
              autocomplete="on"
            />
          </form>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-blog-item recent-posts">
          <div class="sidebar-blog-heading">
            <h2>Recent Posts</h2>
          </div>
          <div class="content">
            <ul>
              <li v-for="(result, index) in results" :key="index">
                <router-link
                  :to="{ name: 'detailBlog', params: { id: result.id } }"
                >
                  <h5>{{ result.judul_blog }}</h5>
                  <span>{{ result.created_at }}</span>
                </router-link>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "recentBlog",
  data() {
    return {
      results: [],
    };
  },
  mounted() {
    axios
      .get(`/api/v1/blogs/current`)
      .then((response) => {
        this.results = response.data.data;
        console.log(this.results);
      })
      .catch((err) => {
        console.log(err);
      });
  },
};
</script>
<style scoped>
li {
  list-style: none;
}
</style>
