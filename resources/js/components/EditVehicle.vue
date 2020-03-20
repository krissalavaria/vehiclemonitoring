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
                <button type="submit" class="btn btn-warning"><span class="fa fa-edit" style="color:white"></span></button>
                <button type="submit" class="btn btn-danger" @click="deleteVehicle(vehicle.id)">
                    <span class="fa fa-trash" style="color:white;"></span>
                </button>
                <router-link class="btn btn-primary pr-2" to="/vehicles.vehiclemain">Cancel</router-link>
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
            .get(`/api/vehicle/edit/${this.$route.params.id}`)
            .then((response) => {
                this.vehicle = response.data;
                // console.log(response.data);
            });
    },
    methods: {
        updateVehicle() {
            this.axios
                .post(`/api/vehicle/update/${this.$route.params.id}`, this.vehicle)
                .then((response) => {
                    this.$router.push({
                        name: 'vehiclemain'
                    });
                });
        },
        deleteVehicle(id) {
            this.axios
                .delete(`/api/vehicle/delete/${id}`)
                .then(response => {
                    this.$router.push({
                        name: 'vehiclemain'
                    });
                    let i = this.vehicles.map(item => item.id).indexOf(id); // find index of your object
                    this.vehicles.splice(i, 1);

                });
        }
    }
}
</script>
