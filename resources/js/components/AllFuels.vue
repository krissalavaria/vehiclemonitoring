<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="btn btn-primary col-sm-2" :to="{name: 'addFuel'}"><span class="fa fa-oil pr-2"></span> Add Fuels Rate</router-link>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vehicle Registration Number</th>
                        <th>Date</th>
                        <th>Odometer</th>
                        <th>Fuel Type</th>
                        <th>Reference Number</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="fuel in fuels" :key="fuel.id">
                        <td>{{ fuel.id }}</td>
                        <td>{{ fuel.vehicle_registration_number }}</td>
                        <td>{{ fuel.date }}</td>
                        <td>{{ fuel.odometer }}</td>
                        <td>{{ fuel.fuel_type }}</td>
                        <td>{{ fuel.reference_number }}</td>
                        <td>{{ fuel.created_at }}</td>
                        <td>{{ fuel.updated_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="{name: 'editFuel', params: { id: fuel.id }}" class="btn btn-warning"><span class="fa fa-edit" style="color:white;"></span>
                                </router-link>
                                <button class="btn btn-danger" @click="deleteFuel(fuel.id)"><span class="fa fa-trash" style="color:white;"></span></button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                fuels: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/fuels')
                .then(response => {
                    this.fuels = response.data;
                });
        },
        methods: {
            deleteFuel(id) {
                this.axios
                    .delete(`http://localhost:8000/api/fuel/delete/${id}`)
                    .then(response => {
                        let i = this.fuels.map(item => item.id).indexOf(id); // find index of your object
                        this.fuels.splice(i, 1)
                    });
            }
        }
    }
</script>