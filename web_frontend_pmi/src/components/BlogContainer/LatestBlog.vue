<template>
  <section class="container blogs-component">
    <div class="row">
      <div class="col-md-12 text-center">
        <h2>Check out our latest article</h2>
      </div>
    </div>
    <div class="row mb-5">
      <div class="col-md-4 col-lg-4 col-sm-6">
        <card-blog />
      </div>
      <div class="col-md-4 col-lg-4 col-sm-6">
        <card-blog />
      </div>
      <div class="col-md-4 col-lg-4 col-sm-6">
        <card-blog />
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
import cardBlog from "../BlogContainer/CardBlog.vue";
export default {
  components: {
    cardBlog,
  },
};
</script>
