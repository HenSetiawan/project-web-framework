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
            <button
              type="button"
              class="btn btn-primary btn-sm"
              id="btn-tambah-mitra"
              data-toggle="modal"
              data-target="#exampleModal"
            >
              Add Blood Stock
            </button>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table
                class="table table-bordered"
                id="dataTable"
                width="100%"
                cellspacing="0"
              >
                <thead>
                  <tr>
                    <th class="text-center">Golongan Darah</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Jumlah Stok</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th class="text-center">Golongan Darah</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Jumlah Stok</th>
                    <th class="text-center">Deskripsi</th>
                    <th class="text-center">Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
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
};
</script>
