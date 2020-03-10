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
                    <button type="submit" class="btn btn-primary">Update Driver</button>
                    <router-link class="btn btn-danger col-sm-2 pr-2" to="/drivers.drivermain">Back</router-link>
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
            }
        }
    }
</script>