<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="mt-2 mb-4 h3 text-gray-800 bold">
            Tambah Data Frequently Ask Question
          </h3>
          <b-form class="mt-2">
            <b-form-group
              id="input-group-1"
              label="Masukan Question :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="text"
                placeholder="Enter your question"
                required
                v-model="form.question"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>
            <b-form-group
              id="input-group-1"
              label="Masukan Answer :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-textarea
                id="textarea-rows"
                placeholder="Enter your answer"
                rows="5"
                v-model="form.answer"
              ></b-form-textarea>
            </b-form-group>

            <b-button variant="primary" class="btn" @click="sendNewData"
              >Ubah Data</b-button
            >
          </b-form>
        </div>
        <div class="col-lg-6"></div>
      </div>
    </div>
  </section>
</template>
<script>
import Sidebar from "../SidebarContainer/Sidebar.vue";
import store from "../../store";
import axios from "axios";
export default {
  name: "FAQEdit",
  components: {
    Sidebar,
  },
  data() {
    return {
      form: {
        question: "",
        answer: "",
      },
    };
  },
  created() {
    this.getDataFAQ();
  },
  methods: {
    getDataFAQ() {
      store.dispatch("fetchAccessToken");
      axios
        .get(`/api/v1/ask/${this.$route.params.id}`, {
          headers: {
            Authorization: `Bearer ${store.state.accessToken}`,
          },
        })
        .then((response) => {
          console.log(response);
          this.form.question = response.data.data.question;
          this.form.answer = response.data.data.answer;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    sendNewData() {
      store.dispatch("fetchAccessToken");
      axios
        .put(
          `/api/v1/ask/${this.$route.params.id}`,
          {
            question: this.form.question,
            answer: this.form.answer,
          },
          {
            headers: {
              Authorization: `Bearer ${store.state.accessToken}`,
            },
          }
        )
        .then(() => {
          this.$router.push("/dashboard/ask");
        })
        .catch((err) => {
          this.$swal.fire({
            icon: "error",
            title: "Oops...",
            text: err.response.data.message,
          });
        });
    },
  },
};
</script>
