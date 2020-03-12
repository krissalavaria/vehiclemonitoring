<template>
<div>
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
            <input type="text" class="form-control form-control-sm" placeholder="Enter customer name" v-model="customer" @keyup.enter="filterCustomer($event)">
        </div>
    </div>
    <div class="card">
        <div class="card-header col-md-12 d-flex">
            LIST OF ALL REQUESTS
            <download-excel class="btn btn-sm btn-primary ml-auto" :data=vales :fields="json_fields" worksheet="My Worksheet" name="filename.xls">
              <span class="fa fa-download"></span> Export Data
            </download-excel>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Form Status</td>
                        <td>Customer</td>
                        <td>Date</td>
                        <td>Addrress</td>
                        <td>Plate Number</td>
                        <td>Description</td>
                        <td>Quanity</td>
                        <td>Unit Cost</td>
                        <td>Total Amount</td>
                        <td>Receipt Number</td>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="v in vales" :key="v.id">
                        <td>{{v.id}}</td>
                        <td>{{v.form_status}}</td>
                        <td>{{v.customer_name}}</td>
                        <td>{{v.date}}</td>
                        <td>{{v.address}}</td>
                        <td>{{v.plate_number}}</td>
                        <td>{{v.description}}</td>
                        <td>{{v.quantity}}</td>
                        <td>{{v.unit_cost}}</td>
                        <td>{{v.total_amount}}</td>
                        <td>{{v.receipt_number}}</td>
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
            vales: [],
            status: null,
            created: null,
            customer: null,
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
    },
    methods: {
        filterCustomer(event) {
            this.customer = event.target.value;
            this.axios
                .get('http://localhost:8000/api/getcustomer/' + this.customer)
                .then(response => {
                    this.vales = response.data;
                });
        },
        filterStatus(event) {
            this.status = event.target.value;
            if (this.status == 'all') {
                this.axios
                    .get('http://localhost:8000/api/getallrequests')
                    .then(response => {
                        this.vales = response.data;
                    });
            } else {
                this.axios
                    .get('http://localhost:8000/api/getstatus/' + this.status)
                    .then(response => {
                        this.vales = response.data;
                    });
            }
        },
        filterMonth(event) {
            this.created = event.target.value;
            if (this.created == 'all') {
                this.axios
                    .get('http://localhost:8000/api/getallrequests')
                    .then(response => {
                        this.vales = response.data;
                    });
            } else {
                this.axios
                    .get('http://localhost:8000/api/requestbydate/' + this.created)
                    .then(response => {
                        this.vales = response.data;
                    });
            }
        },
    }
}
</script>
