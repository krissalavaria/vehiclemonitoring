@extends('layouts.app')

@section('content')
<div class="card uper">
  <div class="card-header">
    Edit Post
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('vales.update', $vale->id) }}">
        @csrf
        @method('PUT')
        <div class="form-row">
            @csrf
            <div class="col">
              <label for="receipt_number">Form Status:</label>
              <input type="text" class="form-control" name="form_status" id="form_status" value={{ $vale->form_status }} />
            </div>
            <div class="col">
              <label for="receipt_number">Receipt Number:</label>
              <input type="text" class="form-control" name="receipt_number" id="receipt_number" value={{ $vale->receipt_number }} />
            </div>
            <div class="col">
              <label for="customer_name">Customer Name:</label>
              <input type="text" class="form-control" name="customer_name" id="customer_name" value={{ $vale->customer_name }} />
            </div>
            <div class="col">
              <label for="date">Date:</label>
              <input type="text" class="form-control" name="date" id="date" value={{ $vale->date }} />
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address" id="address" value={{ $vale->address }} />
            </div>
            <div class="col">
              <label for="plate_number">Plate Number:</label>
              <input type="text" class="form-control" name="plate_number" id="plate_number" value={{ $vale->plate_number }} />
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description" id="description" value={{ $vale->description }} />
            </div>
            <div class="col">
              <label for="quantity">Quantity:</label>
              <input type="text" class="form-control" name="quantity" id="quantity" value={{ $vale->quantity }} />
            </div>
            <div class="col">
              <label for="unit_cost">Unit Cost:</label>
              <input type="number" class="form-control" name="unit_cost" id="unit_cost" value={{ $vale->unit_cost }} />
            </div>
        </div><br>
        <div class="form-row">
            <div class="col">
              <label for="total_amount">Total Amount:</label>
              <input type="number" class="form-control" name="total_amount" id="total_amount" value={{ $vale->total_amount }} />
            </div>
            <div class="col" style="margin-top:32px;">
              <button type="submit" class="btn btn-primary col-sm-4">Update</button>
              <a class="btn btn-danger col-sm-3" href="{{ route('vales.index') }}">Cancel</a>
            </div>
        </div>
      </form>
  </div>
</div>
@endsection
