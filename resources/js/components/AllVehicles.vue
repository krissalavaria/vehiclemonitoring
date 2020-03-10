<template>
    <div>
        <div class="card">
            <div class="card-header">
                <router-link class="btn btn-primary col-sm-2" to="/addVehicle"><span class="fa fa-car pr-2"></span> Add Vehicle</router-link>
            </div>
            <div class="card-body">
                <div id="">
                </div>
                <vue-good-table
                    :pagination-options="{
                        enabled: true,
                    }"
                    :columns="columns"
                    :rows="vehicles"
                    :search-options="{
                        enabled: true
                    }"
                    :sort-options="{
                        enabled: true,
                    }"
                    styleClass="vgt-table striped">
                    <template slot="table-row" slot-scope="props">
                        <span v-if="props.column.field == 'actions'">
                            <button class="btn btn-danger" @click="deleteVehicle('+id+')"><span class="fa fa-trash" style="color:white;"></span></button>
                        </span> 
                    </template>
                </vue-good-table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'my-component',
        data() {
            return {
                vehicles: 0,
                columns: [
                    {
                        label: 'ID',
                        field: 'id',
                    },
                    {
                        label: 'Registration Number',
                        field: 'registration_number',
                    },
                    {
                        label: 'Model Number',
                        field: 'model_number',
                    },
                    {
                        label: 'Plate Number',
                        field: 'plate_number',
                    },
                    {
                        label: 'Vehicle Type',
                        field: 'vehicle_type',
                    },
                    {
                        label: 'Created At',
                        field: 'created_at',
                    },
                    {
                        label: 'Update At',
                        field: 'updated_at',
                    },
                    {
                        label: 'Action',
                        field: this.vehicleId,
                        html: true,
                    }
                ],
                rows: [],
                id: 0
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/vehicles')
                .then(response => {
                    this.vehicles = response.data;
                });
        },
        methods: {
            deleteVehicle(id) {
                this.axios
                    .delete(`http://localhost:8000/api/vehicle/delete/${id}`)
                    .then(response => {
                        let i = this.vehicles.map(item => item.id).indexOf(id); // find index of your object
                        this.vehicles.splice(i, 1)
                    });
            },
            vehicleId(rowObj) {
                var id = rowObj.id;
                return '<div class="d-flex"><a class="btn btn-warning" href="/edit/'+id+'"><span class="fa fa-edit" style="color:white;"></span></a></div>'
            }
        }
    }
</script>