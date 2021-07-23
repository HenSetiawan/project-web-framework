import Vue from "vue";
import App from "./App.vue";
import "./registerServiceWorker";
import router from "./router";
import store from "./store";
import "@/assets/css/sb-admin-2.min.css";
import "@/assets/fontawesome/css/all.min.css";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import { VuejsDatatableFactory } from "vuejs-datatable";

import { BootstrapVue, BootstrapVueIcons } from "bootstrap-vue";

import "bootstrap/dist/css/bootstrap.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import "bootstrap-vue/dist/bootstrap-vue.css";
import axios from "axios";
import CKEditor from "ckeditor4-vue";

const API = process.env.VUE_APP_API;

axios.defaults.baseURL = API;

Vue.use(BootstrapVue);
Vue.use(BootstrapVueIcons);
Vue.use(VuejsDatatableFactory);
Vue.use(VueSweetalert2);
Vue.use(CKEditor);

Vue.config.productionTip = false;

new Vue({
  router,
  store,
  render: function (h) {
    return h(App);
  },
}).$mount("#app");
