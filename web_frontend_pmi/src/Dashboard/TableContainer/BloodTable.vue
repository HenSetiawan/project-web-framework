<template>
  <!-- Begin Page Content -->
  <div class="container-fluid mt-5">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 bold">Formulir Stok Darah</h1>

    <div class="row">
      <div class="col-md-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <a href="" class="btn-sm btn btn-primary">Tambah Data</a>
          </div>
          <div class="card-body">
      <b-table hover responsive :items="items"></b-table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
</template>
<script>
export default {
  name: "BloodTable",
    data() {
    return {
      items: [
        { age: 40, first_name: "Dickerson", last_name: "Macdonald" },
        { age: 21, first_name: "Larsen", last_name: "Shaw" },
        { age: 89, first_name: "Geneva", last_name: "Wilson" },
        { age: 38, first_name: "Jami", last_name: "Carney" },
      ],
    };
  },
};
</script>
