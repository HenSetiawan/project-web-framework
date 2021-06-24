import axios from "axios";
import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    user: null,
    token: null,
  },

  mutations: {
    setUserToken(state, result) {
      localStorage.setItem("token", result.data.token);
      localStorage.setItem("user", JSON.stringify(result));
      axios.defaults.headers.common.Authorization = `Bearer ${result.data.token}`;
    },

    clearUserToken() {
      localStorage.removeItem("user");
      localStorage.removeItem("login");
      location.reload();
    },
  },

  actions: {
    login({ commit }, data) {
      return axios.get("/sanctum/csrf-cookie").then((response) => {
        console.log(response);
        axios.post("/api/v1/auth/admin/login", data).then((result) => {
          console.log(result);
          commit("setUserToken", result);
        });
      });
    },

    logout({ commit }) {
      commit("clearUserToken");
    },
  },

  modules: {},
});
