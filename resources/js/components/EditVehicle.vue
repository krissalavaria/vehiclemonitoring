<template>
    <div>
        <div class="card">
            <div class="card-header">
                Edit Vehicle Information
            </div>
            <div class="card-body">
                <form @submit.prevent="updateVehicle">
                    <div class="form-group">
                        <label>Registration Number</label>
                        <input type="text" class="form-control" v-model="vehicle.registration_number">
                    </div>
                    <div class="form-group">
                        <label>Model Number</label>
                        <input type="text" class="form-control" v-model="vehicle.model_number">
                    </div>
                    <div class="form-group">
                        <label>Plate Number</label>
                        <input type="text" class="form-control" v-model="vehicle.plate_number">
                    </div>
                    <div class="form-group">
                        <label>Vehicle Type</label>
                        <input type="text" class="form-control" v-model="vehicle.vehicle_type">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Vehicle</button>
                    <router-link class="btn btn-danger col-sm-2 pr-2" to="/vehicles.vehiclemain">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                vehicle: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/vehicle/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.vehicle = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateVehicle() {
                this.axios
                    .post(`http://localhost:8000/api/vehicle/update/${this.$route.params.id}`, this.vehicle)
                    .then((response) => {
                        this.$router.push({name: 'vehiclemain'});
                    });
            }
        }
    }
</script>