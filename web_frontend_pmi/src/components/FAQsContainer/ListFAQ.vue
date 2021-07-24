<template>
  <div class="mx-auto col-md-9">
    <section class="col-lg-12 text-center blogs-component">
      <h2 class="mb-5">Frequently Asked Question</h2>
    </section>
    <b-card
      no-body
      class="mb-1"
      v-for="(result, index) in results.data"
      :key="index"
    >
      <b-button
        block
        v-b-toggle="'collapse' + index"
        variant="outline-danger rounded-0"
        class="text-left font-weight-bold"
        >{{ result.question }}</b-button
      >
      <b-collapse
        v-bind:id="'collapse' + index"
        accordion="my-accordion"
        role="tabpanel"
      >
        <b-card-body>
          <b-card-text>{{ result.answer }}</b-card-text>
        </b-card-body>
      </b-collapse>
    </b-card>
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "listFaq",
  data() {
    return {
      results: [],
    };
  },
  created() {
    axios
      .get("/api/v1/asks")
      .then((response) => {
        this.results = response.data;
      })
      .catch((err) => {
        console.log(err);
      });
  },
};
</script>
