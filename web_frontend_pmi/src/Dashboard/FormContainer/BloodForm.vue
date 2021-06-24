<template>
  <section class="d-flex">
    <sidebar />
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-12">
          <div class="card shadow">
            <div class="card-header py-3">
              <h3 class="mt-3 mb-4 text-gray-800 bold">
                Form Tambah Data Stok Darah
              </h3>
              <b-form v-if="show" class="mb-2">
                <b-form-group
                  id="input-group-1"
                  label="Golongan Darah :"
                  label-for="input-1"
                  required
                >
                  <b-form-input
                    id="input-1"
                    v-model="form.blood"
                    placeholder="Enter blood type here"
                    required
                    class="col-lg-3"
                  ></b-form-input>
                </b-form-group>

                <b-form-group
                  id="input-group-2"
                  label="Kategori:"
                  label-for="input-2"
                >
                  <b-form-select
                    id="input-2"
                    v-model="form.category"
                    :options="categories"
                    required
                    class="col-lg-3"
                  ></b-form-select>
                </b-form-group>

                <b-form-group
                  id="input-group-3"
                  label="Jumlah Stok :"
                  label-for="input-3"
                >
                  <b-form-input
                    id="input-3"
                    v-model="form.stock"
                    type="number"
                    placeholder="Enter stock blood here"
                    required
                    class="col-lg-3"
                  ></b-form-input>
                </b-form-group>

                <div>
                  <b-form-group
                    id="input-group-3"
                    label="Deskripsi :"
                    label-for="input-4"
                  >
                    <b-form-textarea
                      id="input-4"
                      v-model="form.description"
                      :state="form.description.length >= 10"
                      placeholder="Enter at least 10 characters"
                      rows="5"
                      class="mb-4 col-lg-6"
                    ></b-form-textarea>
                  </b-form-group>
                </div>

                <b-button type="submit" variant="primary">Submit</b-button>
                <b-button type="reset" variant="danger" class="ml-3"
                  >Reset</b-button
                >
              </b-form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import Sidebar from "../SidebarContainer/Sidebar.vue";
export default {
  components: {
    Sidebar,
  },
  data() {
    return {
      form: {
        blood: "",
        category: null,
        stock: "",
        description: "",
      },
      categories: [
        { text: "Select One", value: null },
        "Carrots",
        "Beans",
        "Tomatoes",
        "Corn",
      ],
      show: true,
    };
  },
};
</script>
