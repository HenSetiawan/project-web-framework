<template>
  <div class="wrap d-flex">
    <!-- Sidebar -->
    <ul
      class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
      id="accordionSidebar"
    >
      <!-- Sidebar - Brand -->
      <a
        class="sidebar-brand d-flex align-items-center justify-content-center"
        href="index.html"
      >
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <router-link class="nav-link" :to="{ name: 'adminTable' }">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </router-link>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider" /> -->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">Interface</div> -->

      <!-- Divider -->
      <!-- <hr class="sidebar-divider" /> -->

      <!-- Heading
      <div class="sidebar-heading">Addons</div> -->

      <!-- Nav Item - Admin Form -->
      <li class="nav-item">
        <router-link class="nav-link" :to="{ name: 'adminTable' }">
          <i class="fa fa-lock"></i>
          <span> Admin Form </span>
        </router-link>
      </li>

      <!-- Nav Item - Volunteer Form -->
      <li class="nav-item">
        <router-link class="nav-link" :to="{ name: 'volunteerTable' }">
          <i class="fa fa-users"></i>
          <span> Volunteer Form </span>
        </router-link>
      </li>

      <!-- Nav Item - User Form -->
      <li class="nav-item">
        <router-link class="nav-link" :to="{ name: 'userTable' }">
          <i class="fa fa-user"></i>
          <span> User Form </span>
        </router-link>
      </li>

      <!-- Nav Item - Blog Form -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fa fa-bookmark"></i>
          <span> Blog Form </span>
        </a>
      </li>

      <!-- Nav Item - FAQ Form -->
      <li class="nav-item">
        <router-link class="nav-link" :to="{ name: 'FAQTable' }">
          <i class="fa fa-question-circle"></i>
          <span> FAQ Form </span>
        </router-link>
      </li>

      <!-- Nav Item - Agenda Form -->
      <li class="nav-item">
        <router-link class="nav-link" :to="{ name: 'eventTable' }">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Event Form</span>
        </router-link>
      </li>

      <!-- Nav Item - Blood Stock Form -->
      <li class="nav-item">
        <router-link class="nav-link" :to="{ name: 'bloodTable' }">
          <i class="fas fa-fw fa-table"></i>
          <span>Blood Stock</span>
        </router-link>
      </li>
      <div class="mt-4">
        <b-button variant="success" class="w-75 mb-3 margin-left-10"
          >Info</b-button
        >
        <b-button
          @click="logoutAdmin()"
          variant="danger"
          class="w-75 mb-3 margin-left-10"
          >Keluar</b-button
        >
      </div>
    </ul>
    <!-- End of Sidebar -->
  </div>
</template>

<script>
import store from "../../store";
import axios from "axios";
export default {
  name: "Sidebar",
  methods: {
    logoutAdmin() {
      store.dispatch("fetchAccessToken");
      this.$swal
        .fire({
          title: "Apakah Anda Yakin Ingin Keluar?",
          text: "Anda akan keluar dari halaman ini",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Keluar",
        })
        .then((result) => {
          if (result.isConfirmed) {
            axios
              .get(`/api/v1/auth/admin/logout`, {
                headers: { Authorization: `Bearer ${store.state.accessToken}` },
              })
              .then(() => {
                console.log(`Bearer ${store.state.accessToken}`);
                store.dispatch("logoutAll");
              })
              .catch((err) => {
                console.log(err);
                console.log(`Bearer ${store.state.accessToken}`);
              });
          }
        });
    },
  },
};
</script>

<style>
.margin-left-10 {
  margin-left: 12%;
}
</style>
