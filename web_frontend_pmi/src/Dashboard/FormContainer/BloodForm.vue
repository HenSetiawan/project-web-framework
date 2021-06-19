<template>
  <section>
    <div class="d-flex">
      <sidebar />
      <blood-table />
    </div>
  </section>
</template>
<script>
import Sidebar from "../SidebarContainer/Sidebar.vue";
import BloodTable from "../TableContainer/BloodTable.vue";
export default {
  name: "BloodForm",
  components: {
    Sidebar,
    BloodTable,
  },
};
</script>
