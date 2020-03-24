<template>
  <div>
      <div class="card">
          <div class="card-header">
              Edit Form Information
          </div>
          <div class="card-body">
              <form class="update" @submit.prevent="updateAdmin">
                  <div class="form-row">
                    <div class="col">
                        <label>Form Status</label>
                        <input type="text" class="form-control" placeholder="Form Status" v-model="vale.form_status">
                    </div>
                    <div class="col">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" placeholder="Customer Name" v-model="vale.customer_name">
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Date</label>
                      <input type="text" class="form-control" placeholder="Date" v-model="vale.date">
                  </div>
                  <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" placeholder="Address" v-model="vale.address">
                  </div>
                  <div class="form-group">
                      <label>Plate Number</label>
                      <input type="text" class="form-control" placeholder="Plate Number" v-model="vale.plate_number">
                  </div>
                  <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" placeholder="Description" v-model="vale.description">
                  </div>
                  <div class="form-group">
                      <label>Quantity</label>
                      <input type="text" class="form-control" placeholder="Quantity" v-model="vale.quantity">
                  </div>
                  <div class="form-group">
                      <label>Unit Cost</label>
                      <input type="text" class="form-control" placeholder="Unit Cost" v-model="vale.unit_cost">
                  </div>
                  <div class="form-group">
                      <label>Total Amount</label>
                      <input type="text" class="form-control" placeholder="Total Amount" v-model="vale.total_amount">
                  </div>
                  <button type="submit" class="btn btn-warning"><span class="fa fa-edit" style="color:white"></span></button>
                  <button type="submit" class="btn btn-danger" @click="deleteAdmin(vale.id)">
                      <span class="fa fa-trash" style="color:white;"></span>
                  </button>
                  <router-link class="btn btn-primary col-sm-2" to="/admins.adminmain">Back</router-link>
              </form>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    data() {
        return {
            vale: {}
        }
    },
    created() {
        this.axios
            .get(`/api/vale/edit/${this.$route.params.id}`)
            .then((response) => {
                this.vale = response.data;
            });
    },
    methods: {
        updateAdmin() {
            this.axios
                .post(`/api/vale/update/${this.$route.params.id}`, this.vale)
                .then((response) => {
                    this.$router.push({
                        name: 'adminmain'
                    });
                });
        },
        deleteAdmin(id) {
            this.axios
                .delete(`/api/vale/delete/${id}`)
                .then(response => {
                    this.$router.push({
                        name: 'adminmain'
                    });
                    let i = this.vales.map(item => item.id).indexOf(id); // find index of your object
                    this.vales.splice(i, 1);
                });
        },

    }
}
</script>

