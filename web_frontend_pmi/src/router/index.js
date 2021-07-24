import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/Home.vue";
import Blog from "../views/Blog.vue";
import Bloods from "../views/Bloods.vue";
import DetailBlog from "../views/DetailBlog.vue";
import LoginForm from "../Dashboard/LoginContainer/LoginForm.vue";
import BloodForm from "../Dashboard/FormContainer/BloodForm.vue";
import EventForm from "../Dashboard/FormContainer/EventForm.vue";
import FormUpdateEvent from "../Dashboard/EditContainer/FormUpdateEvent.vue";
import BloodTable from "../Dashboard/TableContainer/BloodTable.vue";
import AdminTable from "../Dashboard/TableContainer/AdminTable.vue";
import EventTable from "../Dashboard/TableContainer/EventTable.vue";
import AdminForm from "../Dashboard/FormContainer/AdminForm.vue";
import EditAdmin from "../Dashboard/EditContainer/AdminEdit.vue";
import UserTable from "../Dashboard/TableContainer/UserTable.vue";
import VolunteerTable from "../Dashboard/TableContainer/VolunteerTable.vue";
import VolunteerForm from "../Dashboard/FormContainer/VolunteerForm.vue";
import FAQTable from "../Dashboard/TableContainer/FAQTable.vue";
import FAQForm from "../Dashboard/FormContainer/FAQForm.vue";
import EditFAQ from "../Dashboard/EditContainer/FAQEdit.vue";
import BlogTable from "../Dashboard/TableContainer/BlogTable.vue";
import BlogForm from "../Dashboard/FormContainer/BlogForm.vue";
import BlogEdit from "../Dashboard/EditContainer/BlogEdit.vue";
import Event from "../views/Events"
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
    name: "loginForm",
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
    path: "/event",
    name: "event",
    component: Event,
  },
  {
    path: "/bloods",
    name: "bloods",
    component: Bloods,
  },
  {
    path: "/blog/detail/:id",
    name: "detailBlog",
    component: DetailBlog,
  },

  // Dashboard routes
  {
    path: "/dashboard/blood",
    name: "bloodTable",
    component: BloodTable,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/blood/form/:id",
    name: "updateBlood",
    component: BloodForm,
    props: true,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/admin",
    name: "adminTable",
    component: AdminTable,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/new-admin",
    name: "addNewAdmin",
    component: AdminForm,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/edit-admin/:id",
    name: "editAdmin",
    component: EditAdmin,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/user",
    name: "userTable",
    component: UserTable,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/volunteer",
    name: "volunteerTable",
    component: VolunteerTable,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/new-volunteer",
    name: "addNewVolunteer",
    component: VolunteerForm,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/ask",
    name: "FAQTable",
    component: FAQTable,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/new-ask",
    name: "addNewFAQ",
    component: FAQForm,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/edit-ask/:id",
    name: "editFAQ",
    component: EditFAQ,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/blog",
    name: "BlogTable",
    component: BlogTable,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/new-blog",
    name: "addNewBlog",
    component: BlogForm,
    meta: {
      auth: true,
    },
  },
  {
    path: "/dashboard/edit-blog/:id",
    name: "editBlog",
    component: BlogEdit,
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
    props: true,
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
    next({ name: "loginForm" });
    return;
  }
  if (to.name == "loginForm" && store.state.accessToken) {
    next({ name: "adminTable" });
  }
  next();
});

export default router;
