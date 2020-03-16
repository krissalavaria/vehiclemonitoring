@extends('layouts.app')

@section('content')
    <div class="card uper">
        <div class="card-header">
            View Request Form - Vale Slip
        </div>
        <div class="card-body">
            <div id="request-form">
                <form style="margin: 20px;">
                    <div class="d-flex justify-content-center">
                        <header><h2>Request Form</h2></header>
                    </div>
                    <center><p style="margin-bottom:-5px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></center>
                    <center><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></center>
                    <header>
                        <h2>Vale Slip</h2>
                    </header>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Customer Name:</strong>
                                {{ $vale->customer_name }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Date:</strong>
                                {{ $vale->date }}
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <strong>Address:</strong>
                                {{ $vale->address }}
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <strong>Plate Number:</strong>
                                {{ $vale->plate_number }}
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Unit Cost</th>
                            <th>Total Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                @if($vale->description == 'Diesel')
                                    <input type="checkbox" checked> Diesel
                                @else
                                    <input type="checkbox"> Diesel
                                @endif
                            </td>
                            <td>
                                @if($vale->description == 'Diesel')
                                    {{$vale->quantity}}
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                @if($vale->description == 'Blaze')
                                    <input type="checkbox" checked> Blaze
                                @else
                                    <input type="checkbox"> Blaze
                                @endif
                            </td>
                            <td>
                                @if($vale->description == 'Blaze')
                                    {{$vale->quantity}}
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                @if($vale->description == 'XCS Plus')
                                    <input type="checkbox" checked> XCS Plus
                                @else
                                    <input type="checkbox"> XCS PLUS
                                @endif
                            </td>
                            <td>
                                @if($vale->description == 'XCS Plus')
                                    {{$vale->quantity}}
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                @if($vale->description == 'Extra Advance')
                                    <input type="checkbox" checked> Extra Advance
                                @else
                                    <input type="checkbox"> Extra Advance
                                @endif
                            </td>
                            <td>
                                @if($vale->description == 'Extra Advance')
                                    {{$vale->quantity}}
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                @if($vale->description == 'Motor Oils')
                                    <input type="checkbox" checked> Motor Oils
                                @else
                                    <input type="checkbox"> Motor Oils
                                @endif
                            </td>
                            <td>
                                @if($vale->description == 'Motor Oils')
                                    {{$vale->quantity}}
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                @if($vale->description == 'Turbo')
                                    <input type="checkbox" checked> Turbo
                                @else
                                    <input type="checkbox"> Turbo
                                @endif
                            </td>
                            <td>
                                @if($vale->description == 'Turbo')
                                    {{$vale->quantity}}
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                @if($vale->description == 'Others')
                                    <input type="checkbox" checked> Others
                                @else
                                    <input type="checkbox"> Others
                                @endif
                            </td>
                            <td>
                                @if($vale->description == 'Others')
                                    {{$vale->quantity}}
                                @endif
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>Total Amount Payable</b></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
                <div class="float-right" style="margin: 15px;">
                    <br>
                    <hr class="solid">
                    <p>CUSTOMER'S SIGNATURE</p>
                </div>
            </div>
            <div class="form-row d-flex col-sm-12">
                <div class="col">
                    <button class="btn btn-primary" type="button" name="button" onclick="printForm()"><span
                            class="fa fa-print"></span> Print Form
                    </button>
                    <a class="btn btn-danger" href="{{ route('vales.index') }}"> Back</a>
                </div>
            </div>
        </div>
    </div>
    <div id="app">
    </div>
    <script type="text/javascript">
        function printForm() {
            var print_div = document.getElementById("request-form");
            var print_area = window.open();
            print_area.document.write('<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />');
            print_area.document.write(print_div.innerHTML);
            print_area.document.close();
            print_area.focus();
            print_area.print();

        }
    </script>
@endsection
