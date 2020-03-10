@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <h2>Admin Dashboard</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
  <!-- CARDS -->
  <div class="row bg-transparent">
    <div class="card col-md-4 border-0  bg-transparent">
      <div class="card-body border">
        <div class="content-wrapper">
          <div class="d-flex bd-hightlight mb-3">
            <h2 class="p-2 bd-hightlight">Vehicles</h2>
            <h2 class="ml-auto p-2 bd-hightlight text-danger"><span class="fa fa-car"></span></h2>
          </div>
          <hr class="solid">
            <p>Lorem Ipsum</p>
        </div>
      </div>
    </div>
    <div class="card col-md-4 border-0 bg-transparent">
      <div class="card-body border">
        <div class="content-wrapper">
          <div class="d-flex bd-hightlight mb-3">
            <h2 class="p-2 bd-hightlight">Requests</h2>
            <h2 class="ml-auto p-2 bd-hightlight text-primary"><span class="fa fa-sticky-note"></span></h2>
          </div>
          <hr class="solid">
          <p>Lorem Ipsum</p>
        </div>
      </div>
    </div>
    <div class="card col-md-4 border-0 bg-transparent">
      <div class="card-body border">
        <div class="content-wrapper">
          <div class="d-flex bd-hightlight mb-3">
            <h2 class="p-2 bd-hightlight">Expenses</h2>
            <h2 class="ml-auto p-2 bd-hightlight text-success"><span class="fa fa-credit-card"></span></h2>
          </div>
          <hr class="solid">
          <p>Lorem Ipsum</p>
        </div>
      </div>
    </div>
  </div>
  <!-- TABLE -->
  <br>
  <div class="card">
    <div class="card-header d-flex">
      <h4>Request Form</h4>
      <!-- Search Bar -->
      <div class="col">
        <form class="" action="/search" method="get">
          <div class="form-group d-flex float-right">
            <input type="text" name="search" id="search" class="form-control form-control-sm" style="margin-right:10px;">
            <span class="form-group-btn">
              <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </span>
          </div>
        </form>
      </div>
    </div>
    <table id="vales_table" class="table table-striped" >
       <thead>
           <tr>
             <td>ID</td>
             <td>Customer Name</td>
             <td>Date</td>
             <td>Address</td>
             <td>Plate Number</td>
             <td>Description</td>
             <td>Quantity</td>
             <td>Unit Cost</td>
             <td>Total Amount</td>
             <td>Action</td>
           </tr>
       </thead>
       <tbody>
           @foreach($vales as $vale)
           <tr>
               <td>{{$vale->id}}</td>
               <td>{{$vale->customer_name}}</td>
               <td>{{$vale->date}}</td>
               <td>{{$vale->address}}</td>
               <td>{{$vale->plate_number}}</td>
               <td>{{$vale->description}}</td>
               <td>{{$vale->quantity}}</td>
               <td>{{$vale->unit_cost}}</td>
               <td>{{$vale->total_amount}}</td>
               <td style="display: flex;">
                 <a href="{{ route('vales.edit', $vale->id)}}" class="btn btn-warning" style="margin-right: 5px;"><span class="fa fa-edit" style="color:white;"></span></a>
                 <a class="btn btn-primary" href="{{ route('vales.show', $vale->id) }}" style="margin-right: 5px;"><span class="fa fa-print"></span></a>
                 <form action="{{ route('vales.destroy', $vale->id)}}" method="post">
                   @csrf
                   @method('DELETE')
                   <button class="btn btn-danger" type="submit"><span class="fa fa-trash"></span></button>
                 </form>
               </td>
           </tr>
           @endforeach
       </tbody>
     </table>
     <div class="col">
       {{ $vales->links() }}
     </div>
  </div>
</div>


@endsection
