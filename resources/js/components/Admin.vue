<template>
<div>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <!-- CARDS -->
        <div class="row bg-transparent">
            <div class="card col-md-4 border-0 bg-transparent">
                <div class="card-body border">
                    <div class="content-wrapper">
                        <div class="d-flex bd-hightlight mb-3">
                            <h2 class="p-2 bd-hightlight">{{ vehicles.length }}</h2>
                            <h2 class="ml-auto p-2 bd-hightlight text-danger"><span class="fa fa-car"></span></h2>
                        </div>
                        <hr class="solid">
                        <p>TOTAL NUMBERS OF VEHICLES</p>
                    </div>
                </div>
            </div>
            <div class="card col-md-4 border-0 bg-transparent">
                <div class="card-body border">
                    <div class="content-wrapper">
                        <div class="d-flex bd-hightlight mb-3">
                            <h2 class="p-2 bd-hightlight">{{ vales.length }}</h2>
                            <h2 class="ml-auto p-2 bd-hightlight text-primary"><span class="fa fa-sticky-note"></span></h2>
                        </div>
                        <hr class="solid">
                        <p>TOTAL NUMBERS OF REQUESTS</p>
                    </div>
                </div>
            </div>
            <div class="card col-md-4 border-0 bg-transparent">
                <div class="card-body border">
                    <div class="content-wrapper">
                        <div class="d-flex bd-hightlight mb-3">
                            <h2 class="p-2 bd-hightlight">₱ {{ totalamount }}</h2>
                            <h2 class="ml-auto p-2 bd-hightlight text-success"><span class="fa fa-credit-card"></span></h2>
                        </div>
                        <hr class="solid">
                        <p>TOTAL NUMBER OF EXPENSES FOR THIS MONTH</p>
                    </div>
                </div>
            </div>
            <!-- CHARTKICK DATA -->
            <div class="card border-0 col-md-4 bg-transparent mt-4">
                <div class="card-header border bg-transparent">
                    Business Chart
                </div>
                <div class="card-body border">
                    <pie-chart :data="[['Vehicles', vehicles.length], ['Drivers', drivers.length]]"></pie-chart>
                </div>
            </div>
            <div class="card border-0 col-md-8 bg-transparent mt-4">
                <div class="card-header border bg-transparent">
                    Line Chart
                </div>
                <div class="card-body border">
                    <area-chart :data="{'2017-01-01 00:00:00 -0800': 2, '2017-01-01 00:01:00 -0800': 5}"></area-chart>
                </div>
            </div>
        </div>
        <div class="card bg-transparent mt-4">
            <div class="card-header border bg-transparent">
                Bar Chart
            </div>
            <div class="card-body border">
                <column-chart :data="[['Jan', 32], ['Feb', 46], ['Mar', 28], ['Apr', 37], ['May', 22], ['Jun', 56]]"></column-chart>
            </div>
        </div>
        <div class="card bg-transparent mt-4">
            <div class="card-header bg-transparent">
                <router-link class="btn btn-primary" :to="{name: 'addAdmin'}"><span class="fa fa-sticky-note pr-2"></span> Add Form</router-link>
                <download-excel class="btn btn-primary" :data=vales :fields="json_fields" worksheet="My Worksheet" name="filename.xls">
                    <span class="fa fa-download"></span>
                </download-excel>
            </div>
            <div class="card-body">
                <vue-good-table :pagination-options="{
                            enabled: true,
                        }" :columns="columns" :rows="vales" :search-options="{
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
</div>
</template>

<script>
export default {
    data() {
        return {
            vales: [],
            drivers: [],
            vehicles: [],
            totalamount: 0,
            columns: [
                {
                    label: 'ID',
                    field: 'id',
                },
                {
                    label: 'Status',
                    field: 'form_status',
                },
                {
                    label: 'Customer Name',
                    field: 'customer_name',
                },
                {
                    label: 'Date',
                    field: 'date',
                },
                {
                    label: 'Address',
                    field: 'address',
                },
                {
                    label: 'Plate Number',
                    field: 'plate_number',
                },
                {
                    label: 'Description',
                    field: 'description',
                },
                {
                    label: 'Quantity',
                    field: 'quantity',
                },
                {
                    label: 'Unit Cost',
                    field: 'unit_cost',
                },
                {
                    label: 'Total Amount',
                    field: 'total_amount',
                },
                {
                    label: 'Action',
                    field: this.valeId,
                    html: true,
                }
            ],
            rows: [],
            csv_title: "csv_report",
            getid: [],
            json_fields: {
                'ID': 'id',
                'Customer Name': 'customer_name',
                'Date': 'date',
                'Address': 'address',
                'Plate Number': 'plate_number',
                'Descrition': 'description',
                'Quantity': 'quantity',
                'Unit Cost': 'unit_cost',
                'Total Amount': 'total_amount',
            },
            data: [],
            json_meta: [
                [{
                    'key': 'charset',
                    'value': 'utf-8'
                }]
            ],
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/vales')
            .then(response => {
                this.vales = response.data;
            });
        this.axios
            .get('http://localhost:8000/api/vehicles')
            .then(response => {
                this.vehicles = response.data;
            });
        this.axios
            .get('http://localhost:8000/api/drivers')
            .then(response => {
                this.drivers = response.data;
            });
        this.axios
            .get('http://localhost:8000/api/totalamount')
            .then(response => {
                this.totalamount = response.data;
            });
    },
    methods: {
        valeId(rowObj) {
            var id = rowObj.id;
            return '<div class="d-flex"><a class="btn btn-warning" href="/editAdmin/' + id + '"><span class="fa fa-edit" style="color:white;"></span></a></div>';
        },
    }
}
</script>
