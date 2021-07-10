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
        <router-link class="nav-link" :to="{ name: 'dashboard' }">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </router-link>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading -->
      <div class="sidebar-heading">Interface</div>

      <!-- Divider -->
      <hr class="sidebar-divider" />

      <!-- Heading
      <div class="sidebar-heading">Addons</div> -->

      <!-- Nav Item - Admin Form -->
      <li class="nav-item">
        <router-link class="nav-link" :to="{ name: 'admintable' }">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Admin Form</span>
        </router-link>
      </li>

      <!-- Nav Item - Volunteer Form -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Volunteer Form</span>
        </a>
      </li>

      <!-- Nav Item - User Form -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>User Form</span>
        </a>
      </li>

      <!-- Nav Item - Blog Form -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Blog Form</span>
        </a>
      </li>

      <!-- Nav Item - FAQ Form -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>FAQ Form</span>
        </a>
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
        <router-link class="nav-link" :to="{ name: 'bloodtable' }">
          <i class="fas fa-fw fa-table"></i>
          <span>Blood Stock</span>
        </router-link>
      </li>

      <li class="nav-item">
        <router-link class="nav-link" :to="{ name: 'eventTable' }">
          <i class="fas fa-fw fa-table"></i>
          <span>Events</span>
        </router-link>
      </li>
    </ul>
    <!-- End of Sidebar -->
  </div>
</template>
