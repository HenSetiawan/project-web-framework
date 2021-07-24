<template>
  <div class="row mt-5 services-list mb-5">
    <div class="col-lg-4" v-for="event in events" :key="event.id">
      <event-card :title="event.judul_agenda" :description="event.deskripsi" :time="event.waktu" :location="event.lokasi"/>
    </div>
  </div>
</template>
<script>
import EventCard from "./EventCard.vue";
import axios from "axios";
export default {
  data() {
    return {
      events: [],
    };
  },
  components: {
    EventCard,
  },
  methods: {
    getAllEvents() {
      axios("/api/v1/events").then((result) => {
          this.events=result.data.data
          console.log(result.data.data)
      })
      .catch(err=>{
          console.log(err)
      });
    },
  },
  created(){
      this.getAllEvents()
  }
};
</script>
