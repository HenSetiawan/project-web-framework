import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Blog from "../views/Blog.vue";
import DetailBlog from "../views/DetailBlog.vue";
import LoginForm from "../Dashboard/LoginContainer/LoginForm.vue";
import Blood from "../Dashboard/FormContainer/BloodForm.vue";
import BloodTable from "../Dashboard/TableContainer/BloodTable.vue";
import store from "../store";

Vue.use(VueRouter);

const routes = [
  // Home routes
  {
    path: "/",
    name: "home",
    component: Home,
  },

  // Login Routes
  {
    path: "/dashboard/login",
    name: "loginform",
    component: LoginForm,
  },

  // Redirect if routes doesn't exist
  {
    path: "*",
    redirect: "/",
  },

  // Blog routes
  {
    path: "/blog",
    name: "blog",
    component: Blog,
  },
  {
    path: "/blog/detail/:id",
    name: "detailblog",
    component: DetailBlog,
  },

  // Dashboard routes
  {
    path: "/dashboard/blood",
    name: "bloodtable",
    component: BloodTable,
    // meta: {
    //   auth: true,
    // },
  },
  {
    path: "/dashboard/blood/form",
    name: "bloodform",
    component: Blood,
    meta: {
      auth: true,
    },
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

router.beforeEach((to, from, next) => {
  store.dispatch("fetchAccessToken");
  if (
    to.matched.some((record) => record.meta.auth) &&
    !store.state.accessToken
  ) {
    next({ name: "loginform" });
    return;
  }
  if (to.name == "loginform" && store.state.accessToken) {
    next({ name: "bloodtable" });
  }
  next();
});

export default router;
