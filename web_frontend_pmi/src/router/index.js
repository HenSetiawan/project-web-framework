import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Blog from "../views/Blog.vue";
import DetailBlog from "../views/DetailBlog.vue";
import LoginForm from "../Dashboard/LoginContainer/LoginForm.vue";
import Blood from "../Dashboard/FormContainer/BloodForm.vue";
import BloodTable from "../Dashboard/TableContainer/BloodTable.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },

  // Dashboard Routes
  {
    path: "/dashboard/blood",
    name: "bloodtable",
    component: BloodTable,
  },
  {
    path: "/dashboard/blood/form",
    name: "bloodform",
    component: Blood,
  },
  {
    path: "/dashboard/login",
    name: "loginform",
    component: LoginForm,
  },

  // Blog Routes
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
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
