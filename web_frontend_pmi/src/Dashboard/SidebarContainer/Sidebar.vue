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
        <router-link class="nav-link" :to="{ name: 'BlogTable' }">
          <i class="fa fa-bookmark"></i>
          <span> Blog Form </span>
        </router-link>
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
        <b-button
          variant="success"
          @click="showModal"
          class="w-75 mb-3 mg-button-12"
          >Info</b-button
        >
        <b-button
          @click="logoutAdmin()"
          variant="danger"
          class="w-75 mb-3 mg-button-12"
          >Keluar</b-button
        >

        <b-modal
          ref="my-modal"
          hide-footer
          title="Info Admin"
          ok-only
          hide-header-close
          responsive
        >
          <p class="my-4">ID : {{ id }}</p>
          <p class="my-4">Nama : {{ nama }}</p>
          <p class="my-4">Email : {{ email }}</p>
          <p class="my-4">No Handphone : {{ no_hp }}</p>
          <b-button class="mt-5" variant="danger" block @click="hideModal"
            >Tutup</b-button
          >
        </b-modal>
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
  data() {
    return {
      id: "",
      nama: "",
      email: "",
      no_hp: "",
    };
  },
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
    showModal() {
      this.$refs["my-modal"].show();
      axios
        .get("/api/v1/admin", {
          headers: { Authorization: `Bearer ${store.state.accessToken}` },
        })
        .then((result) => {
          console.log(result);
          this.id = result.data.data.id;
          this.nama = result.data.data.username;
          this.email = result.data.data.email;
          this.no_hp = result.data.data.no_hp;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    hideModal() {
      this.$refs["my-modal"].hide();
    },
  },
};
</script>

<style>
.mg-button-12 {
  margin-left: 12%;
}
.my-4 {
  font-weight: bold;
}
.modal-title {
  font-weight: bold;
  font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
}
</style>
