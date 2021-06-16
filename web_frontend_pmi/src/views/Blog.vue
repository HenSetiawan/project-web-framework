<template>
  <div>
    <navbar />
    <list-blog />
  </div>
</template>

<script>
import listBlog from "../components/BodyContainer/ListBlog.vue";
import navbar from "../components/HeaderContainer/Navbar.vue";

export default {
  name: "Blog",
  components: {
    listBlog,
    navbar,
  },
};