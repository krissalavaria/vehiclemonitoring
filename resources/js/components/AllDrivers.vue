<template>
    <div>
        <div class="card">
          <div class="card-header">
              <router-link class="btn btn-primary col-sm-2" :to="{name: 'addDriver'}"><span class="fa fa-user pr-2"></span> Add Driver</router-link>
          </div>
            <div class="card-body">
                <div id="">
                </div>
                <vue-good-table
                    :pagination-options="{
                        enabled: true,
                    }"
                    :columns="columns"
                    :rows="drivers"
                    :search-options="{
                        enabled: true
                    }"
                    :sort-options="{
                        enabled: true,
                    }"
                    styleClass="vgt-table striped">
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
                drivers: [],
                columns: [
                    {
                        label: 'ID',
                        field: 'id',
                    },
                    {
                        label: 'Driver Name',
                        field: 'driver_name',
                    },
                    {
                        label: 'Contact Number',
                        field: 'contact_number',
                    },
                    {
                        label: 'License Number',
                        field: 'license_number',
                    },
                    {
                        label: 'License Expiration',
                        field: 'license_expiration',
                    },
                    {
                        label: 'Driver Address',
                        field: 'driver_address',
                    },
                    {
                        label: 'Driver Status',
                        field: 'driver_status',
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
                        field: this.driverId,
                        html: true,
                    }
                ],
                rows: [],
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
            driverId(rowObj) {
                var id = rowObj.id;
                return '<div class="d-flex"><a class="btn btn-warning" href="/editDriver/'+id+'"><span class="fa fa-edit" style="color:white;"></span></a></div>';
            },
        }
    }
</script>
