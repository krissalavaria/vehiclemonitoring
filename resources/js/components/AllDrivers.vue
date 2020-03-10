<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="btn btn-primary col-sm-2" :to="{name: 'addDriver'}"><span class="fa fa-car pr-2"></span> Add Driver</router-link>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>License No.</th>
                        <th>License Exp. Date</th>
                        <th>Driver Address</th>
                        <th>Driver Status</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="driver in drivers" :key="driver.id">
                        <td>{{ driver.id }}</td>
                        <td>{{ driver.driver_name }}</td>
                        <td>{{ driver.contact_number }}</td>
                        <td>{{ driver.license_number }}</td>
                        <td>{{ driver.license_expiration }}</td>
                        <td>{{ driver.driver_address }}</td>
                        <td>{{ driver.driver_status }}</td>
                        <td>{{ driver.created_at }}</td>
                        <td>{{ driver.updated_at }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <router-link :to="{name: 'editDriver', params: { id: driver.id }}" class="btn btn-warning"><span class="fa fa-edit" style="color:white;"></span>
                                </router-link>
                                <button class="btn btn-danger" @click="deleteDriver(driver.id)"><span class="fa fa-trash" style="color:white;"></span></button>
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
                drivers: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/drivers')
                .then(response => {
                    this.drivers = response.data;
                });
        },
        methods: {
            deleteDriver(id) {
                this.axios
                    .delete(`http://localhost:8000/api/driver/delete/${id}`)
                    .then(response => {
                        let i = this.drivers.map(item => item.id).indexOf(id); // find index of your object
                        this.driver.splice(i, 1)
                    });
            }
        }
    }
</script>