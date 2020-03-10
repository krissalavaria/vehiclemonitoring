<template>
    <div>
        <div class="card">
            <div class="card-header">
                Add Request Form
            </div>
            <div class="card-body">
                <form @submit.prevent="addAdmin">
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" class="form-control" placeholder="Customer Name" v-model="vale.customer_name">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" placeholder="Date" v-model="vale.date">
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
                        <input type="number" class="form-control" placeholder="Unit Cost" v-model="vale.unit_cost">
                    </div>
                    <div class="form-group">
                        <label>Total Amount</label>
                        <input type="number" class="form-control" placeholder="Total Amount" v-model="vale.total_amount">
                    </div>
                    <button type="submit" class="btn btn-primary col-sm-2">Add Form</button>
                    <router-link class="btn btn-danger col-sm-2" to="/admins.adminmain">Back</router-link>
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
        methods: {
            addAdmin() {
                this.axios
                    .post('http://localhost:8000/api/vale/addAdmin', this.vale)
                    .then(response => (
                        this.$router.push({name: 'adminmain'})
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
