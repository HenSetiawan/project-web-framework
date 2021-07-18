<template>
  <div class="sidebar-blog">
    <div class="row">
      <div class="col-lg-12 mt-4">
        <div class="sidebar-blog-item search">
          <form id="search_form" name="gs" method="GET" action="#">
            <input
              type="text"
              class="searchText"
              placeholder="type to search..."
              autocomplete="on"
              v-model="searchQuery"
            />
          </form>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="sidebar-blog-item recent-posts">
          <div class="sidebar-blog-heading">
            <h2 v-show="searchQuery == ''">Recent Posts</h2>
            <h2 v-show="searchQuery != ''">Hasil Pencarian</h2>
          </div>
          <div class="content">
            <ul>
              <li
                v-for="(result, index) in results"
                :key="index"
                v-show="searchQuery == ''"
              >
                <router-link
                  :to="{ name: 'detailBlog', params: { id: result.id } }"
                >
                  <h5>{{ result.judul_blog }}</h5>
                  <span>{{ result.created_at }}</span>
                </router-link>
              </li>
              <li
                v-for="response in resultQuery"
                :key="response.id"
                v-show="searchQuery != ''"
              >
                <router-link
                  :to="{ name: 'detailBlog', params: { id: response.id } }"
                >
                  <h5>{{ response.judul_blog }}</h5>
                  <span>{{ response.created_at }}</span>
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
      responses: [],
      searchQuery: "",
      isSearching: false,
      resultQuery: [],
    };
  },
  created() {
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
  mounted() {
    axios
      .get("/api/v1/blogs")
      .then((res) => {
        this.responses = res.data.data;
        console.log(this.responses);
      })
      .catch((err) => {
        console.log(err);
      });
  },
  watch: {
    searchQuery: function () {
      var vm = this;
      this.isSearching = true;
      setTimeout(function () {
        vm.resultQuery = vm.responses.filter(function (response) {
          return (
            response.judul_blog
              .toLowerCase()
              .indexOf(vm.searchQuery.toLowerCase()) !== -1
          );
        });
      }, 500);
    },
  },
};
</script>
<style scoped>
li {
  list-style: none;
}
</style>
