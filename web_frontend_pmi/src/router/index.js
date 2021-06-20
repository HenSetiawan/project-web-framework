import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Dashboard from "../Dashboard/Sidebar";
import Blog from "../views/Blog.vue";
import DetailBlog from "../views/DetailBlog.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: Dashboard,
  },
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
