<template>
  <!-- services -->
  <div>
    <navbar />
    <section class="event-list mb-2">
      <div class="container event-component">
        <div class="row">
          <section class="col-lg-12 text-center">
            <h2>Agenda Dalam Waktu Dekat</h2>
            <p class="w-75 mx-auto">
              Agenda yang akan dilaksanakan oleh PMI Bondowoso dalam waktu dekat
            </p>
          </section>
        </div>
        <div class="row">
          <Event-list />
        </div>
      </div>
    </section>
  </div>
  <!-- services end -->
</template>

<script>
import EventList from "../components/EventsContainer/EventList.vue";
import navbar from "../components/HeaderContainer/Navbar.vue";
export default {
  components: { EventList, navbar },
};
</script>

<style scoped>
.event-component {
  margin-top: 80px;
  font-family: "Mulish", sans-serif;
}
.event-component h2 {
  font-weight: 700;
  font-size: 36px;
}

.event-component p {
  color: #7d7987;
}</style>
