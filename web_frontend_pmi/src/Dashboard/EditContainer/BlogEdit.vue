<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-6">
          <h3 class="mt-2 mb-4 h3 text-gray-800 bold">Edit Data Blog</h3>
          <b-form class="mt-2">
            <b-form-group
              id="input-group-1"
              label="Masukan Judul Blog :"
              label-for="input-1"
              autocomplete="off"
            >
              <b-form-input
                id="input-1"
                type="text"
                placeholder="Enter your title"
                required
                v-model="form.title"
                autocomplete="off"
              ></b-form-input>
            </b-form-group>

            <b-form-file
              v-model="form.thumbnail"
              class="mt-3 mb-3"
              plain
              required
              accept="image/jpeg, image/png, image/jpg"
              @change="selectFile"
            ></b-form-file>

            <b-img
              :src="form.photo"
              fluid
              alt="Gambar Sebelumnya"
              class="mb-3"
              width="120"
            ></b-img>

            <ckeditor
              v-model="form.editorData"
              :config="form.editorConfig"
              required
            ></ckeditor>

            <b-button
              variant="primary"
              class="btn mt-3 mb-3"
              @click="sendNewData"
              >Tambah Data</b-button
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
  name: "eventForm",
  components: {
    Sidebar,
  },
  data() {
    return {
      form: {
        title: "",
        editorData: "<p>Content of the editor.</p>",
        thumbnail: null,
        photo: null,
        editorConfig: {
          // The configuration of the editor.
          toolbarGroups: [
            {
              name: "basicstyles",
              groups: ["basicstyles", "underline"],
            },
            {
              name: "paragraph",
              groups: ["list", "blocks"],
            },
            {
              name: "styles",
              groups: ["styles"],
            },
            {
              name: "links",
              groups: ["links"],
            },
            {
              name: "about",
              groups: ["about"],
            },
            {
              name: "document",
              groups: ["mode"],
            },
          ],
        },
      },
    };
  },
  created() {
    axios
      .get(`api/v1/blog/${this.$route.params.id}`)
      .then((result) => {
        console.log(result);
        this.form.photo = result.data.data.thumbnail;
        this.form.title = result.data.data.judul_blog;
        this.form.editorData = result.data.data.content;
      })
      .catch((err) => {
        console.log(err);
      });
  },
  methods: {
    selectFile(event) {
      // `files` is always an array because the file input may be in multiple mode
      this.form.thumbnail = event.target.files[0];
      console.log(this.thumbnail);
    },
    sendNewData() {
      let formData = new FormData();
      formData.append("judul_blog", this.form.title);
      formData.append("thumbnail", this.form.thumbnail);
      formData.append("content", this.form.editorData);
      store.dispatch("fetchAccessToken");
      axios
        .post(`/api/v1/blog/${this.$route.params.id}`, formData, {
          headers: {
            "Content-Type": "multipart/form-data",
            Authorization: `Bearer ${store.state.accessToken}`,
          },
        })
        .then(() => {
          this.$router.push("/dashboard/blog");
        })
        .catch((err) => {
          console.log(formData);
          console.log(err);
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
