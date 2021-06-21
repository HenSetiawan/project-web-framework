import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Dashboard from "../Dashboard/SidebarContainer/Sidebar.vue";
import Blog from "../views/Blog.vue";
import DetailBlog from "../views/DetailBlog.vue";
import Blood from "../Dashboard/FormContainer/BloodForm.vue"


Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "home",
    component: Home,
  },

  // Dashboard Routes 
  {
    path: "/dashboard",
    name: "dashboard",
    component: Dashboard,
  },
  {
    path: "/dashboard/blood",
    name: "blood",
    component: Blood,
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
