<template>
    <div>
        <div class="card">
          <div class="card-header">
              <router-link class="btn btn-primary col-sm-2" :to="{name: 'addFuel'}"><span class="fa fa-user pr-2"></span> Add Fuel</router-link>
          </div>
            <div class="card-body">
                <div id="">
                </div>
                <vue-good-table
                    :pagination-options="{
                        enabled: true,
                    }"
                    :columns="columns"
                    :rows="fuels"
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
                fuels: [],
                columns: [
                    {
                        label: 'ID',
                        field: 'id',
                    },
                    {
                        label: 'Registration Number',
                        field: 'vehicle_registration_number',
                    },
                    {
                        label: 'Date',
                        field: 'date',
                    },
                    {
                        label: 'Odometer',
                        field: 'odometer',
                    },
                    {
                        label: 'Fuel Type',
                        field: 'fuel_type',
                    },
                    {
                        label: 'Reference Number',
                        field: 'reference_number',
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
                        field: this.fuelId,
                        html: true,
                    }
                ],
                rows: [],
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
            fuelId(rowObj) {
                var id = rowObj.id;
                return '<div class="d-flex"><a class="btn btn-warning" href="/editFuel/'+id+'"><span class="fa fa-edit" style="color:white;"></span></a></div>';
            },
        }
    }
</script>
