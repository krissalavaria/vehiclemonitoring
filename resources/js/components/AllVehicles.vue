<template>
<div>
    <div class="card">
        <div class="card-header">
            <router-link class="btn btn-primary col-sm-2" :to="{name: 'addVehicle'}"><span class="fa fa-car pr-2"></span> Add Vehicle</router-link>
            <download-excel
                class   = "btn btn-primary"
                :data   = vehicles
                :fields = "json_fields"
                worksheet = "My Worksheet"
                name    = "filename.xls">
                <span class="fa fa-download"></span>
            </download-excel>
        </div>
        <div class="card-body">
            <vue-good-table :pagination-options="{
                        enabled: true,
                    }" :columns="columns" :rows="vehicles" :search-options="{
                        enabled: true
                    }" :sort-options="{
                        enabled: true,
                    }" styleClass="vgt-table striped">
                <template slot="table-row" slot-scope="props">
                    <span v-if="props.column.field == 'actions'">
                    </span>
                </template>
            </vue-good-table>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            vehicles: [],
            columns: [{
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
            csv_title: "csv_report",
            getid: [],
            json_fields: {
                'ID': 'id',
                'Reigstration Number': 'registration_number',
                'Model Number': 'model_number',
                'Plate Number': 'plate_number',
                'Vehicle Type': 'vehicle_type',
                'Created At': 'created_at',
                'Updated At': 'updated_at'
            },
            data: [],
            json_meta: [
                [
                    {
                        'key': 'charset',
                        'value': 'utf-8'
                    }
                ]
            ],
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
        vehicleId(rowObj) {
            var id = rowObj.id;
            return '<div class="d-flex"><a class="btn btn-warning" href="/edit/' + id + '"><span class="fa fa-edit" style="color:white;"></span></a></div>';
        },
    }
}
</script>
