<template>
    <div>
        <div class="card">
            <div class="card-header">
                Add Fuel Rate
            </div>
            <div class="card-body">
                <form @submit.prevent="addFuel">
                    <div class="form-group">
                        <label>Vehicle Registration No.</label>
                        <!-- <input type="text" class="form-control" placeholder="Registration Number" v-model="fuel.vehicle_registration_number"> -->
                        <select class="form-control" v-model="fuel.vehicle_registration_number" required>
                            <option>Select Registration Number</option>
                            <option v-for="vehicle in vehicles" :key="vehicle.registration_number" >
                                {{ vehicle.registration_number }}
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" placeholder="Date" v-model="fuel.date" required>
                    </div>
                    <div class="form-group">
                        <label>Odometer</label>
                        <input type="text" class="form-control" placeholder="Odometer" v-model="fuel.odometer" required>
                    </div>
                    <div class="form-group">
                        <label>Fuel Type</label>
                        <input type="text" class="form-control" placeholder="Fuel Type" v-model="fuel.fuel_type" required>
                    </div>
                    <div class="form-group">
                        <label>Reference</label>
                        <!-- <input type="text" class="form-control" placeholder="Reference Number" v-model="fuel.reference_number"> -->
                        <select class="form-control" v-model="fuel.reference_number" required>
                            <option>Select Reference ID</option>
                            <option v-for="vale in vales" :key="vale.id" >
                                {{ vale.id }}
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary col-sm-2">Add Fuel</button>
                    <router-link class="btn btn-danger col-sm-2" to="/fuels.fuelmain">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                vales: {},
                vehicles: {},
                fuel: {}
            }
        },
        created() {
            this.axios
                .get('api/vehicles')
                .then(response => {
                    this.vehicles = response.data;
                });
            this.axios
                .get('api/vales')
                .then(response => {
                    this.vales = response.data;
                });
        },
        methods: {
            addFuel() {

                this.axios
                    .post('api/fuel/add', this.fuel)
                    .then(response => (
                        this.$router.push({name: 'fuelmain'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>
