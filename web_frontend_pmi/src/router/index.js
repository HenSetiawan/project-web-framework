import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Sidebar from "../Dashboard/Sidebar";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Home",
    component: Home,
  },
  {
    path: "/sidebar",
    name: "Sidebar",
    component: Sidebar,
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
