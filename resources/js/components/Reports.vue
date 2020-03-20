<template>
    <div>
        <div class="row mb-3">
            <div class="card col-md-6 border-0 bg-transparent">
                <div class="card-body border">
                    <div class="content-wrapper">
                        <div class="d-flex bd-hightlight mb-3">
                            <h2 class="p-2 bd-hightlight">{{ vales.length }}</h2>
                            <h2 class="ml-auto p-2 bd-hightlight text-primary"><span class="fa fa-sticky-note"></span>
                            </h2>
                        </div>
                        <hr class="solid">
                        <p>TOTAL NUMBERS OF REQUESTS</p>
                    </div>
                </div>
            </div>
            <div class="card col-md-6 border-0 bg-transparent">
                <div class="card-body border">
                    <div class="content-wrapper">
                        <div class="d-flex bd-hightlight mb-3">
                            <h2 class="p-2 bd-hightlight">{{ totalAmount }}</h2>
                            <h2 class="ml-auto p-2 bd-hightlight text-success"><span class="fa fa-credit-card"></span>
                            </h2>
                        </div>
                        <hr class="solid">
                        <p>TOTAL NUMBER OF EXPENSES FOR THIS MONTH</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col mb-4">
                <label><strong>GENERATE REPORTS</strong></label>
                <select class="form-control form-control-sm" v-model="reports">
                    <option value="" selected disabled>Select Reports to generate</option>
                    <option value="expenses">Expenses</option>
                    <option value="requests">Requests</option>
                </select>
            </div>
        </div>
        <div class="alert alert-warning text-center" role="alert" v-if="reports == ''">No Records to show. Please Select
            a Reports to Generate.
        </div>
        <div v-if="reports == 'requests'">
            <div class="row">
                <div class="col mb-4">
                    <label><strong>FILTER REQUEST BY STATUS</strong></label>
                    <select class="form-control form-control-sm" v-model="status" @change="filterStatus($event)">
                        <option value="" disabled>Select Plate Number</option>
                        <option value="all">All</option>
                        <option value="Approved">Approved</option>
                        <option value="Rejected">Rejected</option>
                        <option value="Pending">Pending</option>
                        <option value="Not Updated">Not Updated</option>
                    </select>
                </div>
                <div class="col mb-4">
                    <label><strong>FILTER REQUEST PER MONTH</strong></label>
                    <select class="form-control form-control-sm" v-model="created" @change="filterMonth($event)">
                        <option value="" disabled>Select Month</option>
                        <option value="all">All</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col mb-4">
                    <label><strong>FILTER REQUEST PER CUSTOMER</strong></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter customer name"
                           v-model="customer" @change="filterCustomer($event)">
                </div>
            </div>
            <div class="card">
                <div class="card-header col-md-12 d-flex">
                    LIST OF ALL REQUESTS
                    <download-excel class="btn btn-sm btn-primary ml-auto" :data=vales :fields="json_fields"
                                    worksheet="My Worksheet" name="filename.xls">
                        <span class="fa fa-download"></span> Export Data
                    </download-excel>
                </div>
                <div class="card-body table-responsive">
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
        <div v-if="reports == 'expenses'">
            <div class="row">
                <div class="col mb-4">
                    <label><strong>FILTER EXPENSES PER MONTH</strong></label>
                    <select class="form-control form-control-sm" v-model="created" @change="filterMonth($event)">
                        <option value="" disabled>Select Month</option>
                        <option value="all">All</option>
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                </div>
                <div class="col mb-4">
                    <label><strong>FILTER EXPENSES PER VEHICLE</strong></label>
                    <input type="text" class="form-control form-control-sm" placeholder="Enter plate number"
                           v-model="vehicle" @change="filterVehicleExp($event)">
                </div>
            </div>
            <div class="card">
                <div class="card-header col-md-12 d-flex">
                    LIST OF VEHICLE EXPENSES
                    <download-excel class="btn btn-sm btn-primary ml-auto" :data=vales :fields="json_fields"
                                    worksheet="My Worksheet" name="filename.xls">
                        <span class="fa fa-download"></span> Export Data
                    </download-excel>
                </div>
                <div class="card-body table-responsive">
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
                status: null,
                created: null,
                customer: null,
                vehicle: null,
                index: [],
                json_fields: {
                    'ID': 'id',
                    'Form Status': 'form_status',
                    'Customer Name': 'customer_name',
                    'Date': 'date',
                    'Address': 'address',
                    'Plate Number': 'plate_number',
                    'Description': 'description',
                    'Quantity': 'quantity',
                    'Unit Cost': 'unit_cost',
                    'Total Amount': 'total_amount',
                    'Receipt Number': 'receipt_number',
                    'Created At': 'created_at',
                    'Updated At': 'updated_at'
                },
                data: {},
                json_meta: [
                    [{
                        'key': 'charset',
                        'value': 'utf-8'
                    }]
                ],
                showTable: 'expenses',
                reports: '',
                columns: [
                    {
                        label: 'ID',
                        field: 'id',
                    },
                    {
                        label: 'Form Status',
                        field: 'form_status',
                    },
                    {
                        label: 'Customer',
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
                        label: 'Vehicle Description',
                        field: 'vehicle_description',
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
                        label: 'Receipt #',
                        field: 'receipt_number',
                    }
                ],
                rows: []
            }
        },
        created() {
            this.axios
                .get('api/vales')
                .then(response => {
                    this.vales = response.data;
                });
            this.filtered();
        },
        methods: {
            filterCustomer(event) {
                this.customer = event.target.value;
                if (this.customer == '') {
                    this.axios
                        .get('api/getallrequests')
                        .then(response => {
                            this.vales = response.data;
                        });
                } else {
                    this.axios
                        .get('api/getcustomer/' + this.customer)
                        .then(response => {
                            this.vales = response.data;
                        });
                }
            },
            filterStatus(event) {
                this.status = event.target.value;
                if (this.status == 'all') {
                    this.axios
                        .get('api/getallrequests')
                        .then(response => {
                            this.vales = response.data;
                        });
                } else {
                    this.axios
                        .get('api/getstatus/' + this.status)
                        .then(response => {
                            this.vales = response.data;
                        });
                }
            },
            filterMonth(event) {
                this.created = event.target.value;
                if (this.created == 'all') {
                    this.axios
                        .get('api/getallrequests')
                        .then(response => {
                            this.vales = response.data;
                        });
                } else {
                    this.axios
                        .get('api/requestbydate/' + this.created)
                        .then(response => {
                            this.vales = response.data;
                        });
                }
            },
            filterVehicleExp(event) {
                this.vehicle = event.target.value;
                if (this.vehicle == '') {
                    this.axios
                        .get('api/getallrequests')
                        .then(response => {
                            this.vales = response.data;
                        });
                } else {
                    this.axios
                        .get('api/reportsvehicle/' + this.vehicle)
                        .then(response => {
                            this.vales = response.data;
                        });
                }
            },
        },
        computed: {
            totalAmount: function () {
                return this.vales.reduce(function (total, item) {
                    return total + item.total_amount;
                }, 0);
            },
            filtered: function() {
                return this.vales.slice(this.start, this.limit)
            }
        }
    }
</script>
