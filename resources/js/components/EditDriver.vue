<template>
    <div>
        <div class="card">
            <div class="card-header">
                Edit Driver Information
            </div>
            <div class="card-body">
                <form @submit.prevent="updateDriver">
                    <div class="form-group">
                        <label>Driver Name</label>
                        <input type="text" class="form-control" placeholder="Driver Registration No." v-model="driver.driver_name">
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" placeholder="Contact No." v-model="driver.contact_number">
                    </div>
                    <div class="form-group">
                        <label>License Number</label>
                        <input type="text" class="form-control" placeholder="License No." v-model="driver.license_number">
                    </div>
                    <div class="form-group">
                        <label>License Expiration</label>
                        <input type="text" class="form-control" placeholder="License Exp. Date" v-model="driver.license_expiration">
                    </div>
                    <div class="form-group">
                        <label>Driver Address</label>
                        <input type="text" class="form-control" placeholder="Driver Address" v-model="driver.driver_address">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" placeholder="Status" v-model="driver.driver_status">
                    </div>
                    <button type="submit" class="btn btn-warning"><span class="fa fa-edit" style="color:white"></span></button>
                    <button type="submit" class="btn btn-danger" @click="deleteDriver(driver.id)">
                        <span class="fa fa-trash" style="color:white;"></span>
                    </button>
                    <router-link class="btn btn-primary pr-2" to="/drivers.drivermain">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                driver: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/driver/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.driver = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateDriver() {
                this.axios
                    .post(`http://localhost:8000/api/driver/update/${this.$route.params.id}`, this.driver)
                    .then((response) => {
                        this.$router.push({name: 'drivermain'});
                    });
            },
            deleteDriver(id) {
            this.axios
                .delete(`http://localhost:8000/api/driver/delete/${id}`)
                .then(response => {
                    this.$router.push({
                        name: 'drivermain'
                    });
                    let i = this.drivers.map(item => item.id).indexOf(id); // find index of your object
                    this.drivers.splice(i, 1);
                });
            }
        }
    }
</script>
