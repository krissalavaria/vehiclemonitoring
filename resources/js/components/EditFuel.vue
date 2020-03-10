<template>
    <div>
        <div class="card">
            <div class="card-header">
                Edit Fuel Rate Information
            </div>
            <div class="card-body">
                <form @submit.prevent="updateFuel">
                    <div class="form-group">
                        <label>Vehicle Registration No.</label>
                        <input type="text" class="form-control" placeholder="Registration Number" v-model="fuel.vehicle_registration_number">
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" placeholder="Date" v-model="fuel.date">
                    </div>
                    <div class="form-group">
                        <label>Odometer</label>
                        <input type="text" class="form-control" placeholder="Odometer" v-model="fuel.odometer">
                    </div>
                    <div class="form-group">
                        <label>Fuel Type</label>
                        <input type="text" class="form-control" placeholder="Fuel Type" v-model="fuel.fuel_type">
                    </div>
                    <div class="form-group">
                        <label>Reference</label>
                        <input type="text" class="form-control" placeholder="Reference Number" v-model="fuel.reference_number">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Fuel</button>
                    <router-link class="btn btn-danger col-sm-2 pr-2" to="/fuels.fuelmain">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                fuel: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/fuel/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.fuel = response.data;
                    // console.log(response.data);
                });
        },
        methods: {
            updateFuel() {
                this.axios
                    .post(`http://localhost:8000/api/fuel/update/${this.$route.params.id}`, this.fuel)
                    .then((response) => {
                        this.$router.push({name: 'fuelmain'});
                    });
            }
        }
    }
</script>