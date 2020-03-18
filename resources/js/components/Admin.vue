<template>
    <div>
        <div class="container col-sm-12">
            <h2>Admin Dashboard</h2>
            <p>Welcome to the admin dashboard. This is where you can view and process transactions and data in your
                system.</p>
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
                                <h2 class="ml-auto p-2 bd-hightlight text-primary"><span
                                    class="fa fa-sticky-note"></span></h2>
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
                                <h2 class="ml-auto p-2 bd-hightlight text-success"><span
                                    class="fa fa-credit-card"></span></h2>
                            </div>
                            <hr class="solid">
                            <p>TOTAL NUMBER OF EXPENSES FOR THIS MONTH</p>
                        </div>
                    </div>
                </div>
                <!-- CHARTKICK DATA -->
                <div class="card border-0 col-md-4 bg-transparent mt-4">
                    <div class="card-header border bg-transparent">
                        BUSINESS CHART
                    </div>
                    <div class="card-body border">
                        <pie-chart :data="[['Vehicles', vehicles.length], ['Drivers', drivers.length]]"></pie-chart>
                    </div>
                </div>
                <div class="card border-0 col-md-8 bg-transparent mt-4">
                    <div class="card-header border bg-transparent">
                        MONTHLY REQUESTS
                    </div>
                    <div class="card-body border">
                        <area-chart
                            :data="{'Jan': jareq, 'Feb': febreq, 'Mar': marreq, 'Apr': aprreq, 'May': mayreq, 'Jun': junreq,
                            'Jul': julreq, 'Aug': augreq, 'Sep': sepreq, 'Oct': octreq, 'Nov': novreq, 'Dec': decreq}"></area-chart>
                    </div>
                </div>
            </div>
            <div class="card bg-transparent mt-4">
                <div class="card-header border bg-transparent">
                    YEAR WISE MONTHLY EXPENSES
                </div>
                <div class="card-body border">
                    <column-chart :data="[['Jan', jan], ['Feb', feb], ['Mar', mar], ['Apr', apr], ['May', may], ['Jun', jun],
                ['Jul', jul], ['Aug', aug], ['Sep', sep], ['Oct', oct], ['Nov', nov], ['Dec', dec]]"></column-chart>
                </div>
            </div>
            <div class="card bg-transparent mt-4">
                <div class="card-header bg-transparent">
                    <router-link class="btn btn-primary" :to="{name: 'addAdmin'}"><span
                        class="fa fa-sticky-note pr-2"></span> Add Form
                    </router-link>
                    <download-excel class="btn btn-primary" :data=vales :fields="json_fields" worksheet="My Worksheet"
                                    name="filename.xls">
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
                monthlyrequest: 0,
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
                /** MONTHLY EXPENSES */
                jan: null, feb: null, mar: null,
                apr: null, may: null, jun: null,
                jul: null, aug: null, sep: null,
                oct: null, nov: null, dec: null,
                /** MONTHLY REQUESTS */
                janreq: null, febreq: null, marreq: null,
                aprreq: null, mayreq: null, junreq: null,
                julreq: null, augreq: null, sepreq: null,
                octreq: null, novreq: null, decreq: null,
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

            /** MONTHLY EXPENSES MONTHLY EXPENSES *MONTHLY EXPENSES *MONTHLY EXPENSES **/
            this.axios.get('api/january').then(response => { this.jan = response.data; });
            this.axios.get('api/february').then(response => { this.feb = response.data; });
            this.axios.get('api/march').then(response => { this.mar = response.data; });
            this.axios.get('api/april').then(response => { this.apr = response.data; });
            this.axios.get('api/may').then(response => { this.may = response.data; });
            this.axios.get('api/june').then(response => { this.jun = response.data; });
            this.axios.get('api/july').then(response => { this.jul = response.data; });
            this.axios.get('api/august').then(response => { this.aug = response.data; });
            this.axios.get('api/september').then(response => { this.sep = response.data; });
            this.axios.get('api/october').then(response => { this.oct = response.data; });
            this.axios.get('api/november').then(response => { this.nov = response.data; });
            this.axios.get('api/december').then(response => { this.dec = response.data; });

            /** MONTHLY REQUESTS MONTHLY REQUESTS MONTHLY REQUESTS MONTHLY REQUESTS */
            this.axios.get('api/janrequest').then(response => { this.janreq = response.data });
            this.axios.get('api/febrequest').then(response => { this.febreq = response.data });
            this.axios.get('api/marrequest').then(response => { this.marreq = response.data });
            this.axios.get('api/aprrequest').then(response => { this.aprreq = response.data });
            this.axios.get('api/mayrequest').then(response => { this.mayreq = response.data });
            this.axios.get('api/junrequest').then(response => { this.junreq = response.data });
            this.axios.get('api/julrequest').then(response => { this.julreq = response.data });
            this.axios.get('api/augrequest').then(response => { this.augreq = response.data });
            this.axios.get('api/seprequest').then(response => { this.sepreq = response.data });
            this.axios.get('api/octrequest').then(response => { this.octreq = response.data });
            this.axios.get('api/novrequest').then(response => { this.novreq = response.data });
            this.axios.get('api/decrequest').then(response => { this.decreq = response.data });
        },
        methods: {
            valeId(rowObj) {
                var id = rowObj.id;
                return '<div class="d-flex"><a class="btn btn-warning" href="/editAdmin/' + id + '"><span class="fa fa-edit" style="color:white;"></span></a></div>';
            },
        }
    }
</script>
