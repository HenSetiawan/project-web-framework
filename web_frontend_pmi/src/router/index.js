import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Blog from "../views/Blog.vue";
import Bloods from "../views/Bloods.vue";
import DetailBlog from "../views/DetailBlog.vue";
import LoginForm from "../Dashboard/LoginContainer/LoginForm.vue";
import BloodForm from "../Dashboard/FormContainer/BloodForm.vue";
import EventForm from "../Dashboard/FormContainer/EventForm.vue";
import FormUpdateEvent from "../Dashboard/FormContainer/FormUpdateEvent.vue";
import BloodTable from "../Dashboard/TableContainer/BloodTable.vue";
import AdminTable from "../Dashboard/TableContainer/AdminTable.vue";
import EventTable from "../Dashboard/TableContainer/EventTable.vue";
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
    path: "/bloods",
    name: "bloods",
    component: Bloods,
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
    meta: {
      auth: true,
    },
  },
  {
    path: "/blood/form/:id",
    name: "updateBlood",
    component: BloodForm,
    props: true,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/admin",
    name: "admintable",
    component: AdminTable,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/event",
    name: "eventTable",
    component: EventTable,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/new-event",
    name: "addNewEvent",
    component: EventForm,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/update-event/:id",
    name: "updateEvent",
    component: FormUpdateEvent,
    props:true,
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
