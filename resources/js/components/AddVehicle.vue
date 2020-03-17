<template>
    <div>
        <div class="card">
            <div class="card-header">
                Add New Vehicle
            </div>
            <div class="card-body">
                <form @submit.prevent="addVehicle">
                    <div class="form-group">
                        <label>Registration Number</label>
                        <input type="text" class="form__input form-control" placeholder="Vehicle Registration No."
                               v-model="vehicle.registration_number" required>
                    </div>
                    <div class="form-group">
                        <label>Model Number</label>
                        <input type="text" class="form-control" placeholder="Vehicle Model No."
                               v-model="vehicle.model_number" required>
                    </div>
                    <div class="form-group">
                        <label>Plate Number</label>
                        <input type="text" class="form-control" placeholder="Vehicle Plate No."
                               v-model="vehicle.plate_number" required>
                    </div>
                    <div class="form-group">
                        <label>Vehicle Type</label>
                        <input type="text" class="form-control" placeholder="Vehicle Type"
                               v-model="vehicle.vehicle_type" required>
                    </div>
                    <button type="submit" class="btn btn-primary col-sm-2">Add Vehicle</button>
                    <router-link class="btn btn-danger col-sm-2" to="/vehicles.vehiclemain">Back</router-link>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import { required, minLength } from 'vuelidate/lib/validators';
    export default {
        data() {
            return {
                vehicle: {},
                registration_number: '',
                model_number: '',
                plate_number: '',
                vehicle_type: '',
            }
        },
        methods: {
            addVehicle() {

                this.axios
                    .post('http://localhost:8000/api/vehicle/addVehicle', this.vehicle)
                    .then(response => (
                        this.$router.push({name: 'vehiclemain'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        },
        validations: {
            registration_number: {
                required,
            },
        }
    }
</script>
