@extends('layouts.app')

@section('content')
<div class="card uper">
  <div class="card-header">
    Request a New Form
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
      <form method="post" action="{{ route('vales.store') }}">
          <div class="form-row">
              <div class="col">
                @csrf
                <label for="customer_name">Customer Name:</label>
                <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Input Customer Name" />
              </div>
              <div class="col">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" id="date" placeholder="Input Date" />
              </div>
          </div><br>
          <div class="form-row">
              <div class="col">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Input Address" />
              </div>
              <div class="col">
                <label for="plate_number">Plate Number:</label>
                <input type="text" class="form-control" name="plate_number" id="plate_number" placeholder="Input Plate Number" />
              </div>
          </div><br>
          <div class="form-row">
              <div class="col">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Input Description" value="To be Updated" readonly/>
              </div>
              <div class="col">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Input Quantity" value="0" readonly/>
              </div>
              <div class="col">
                <label for="unit_cost">Unit Cost:</label>
                <input type="number" class="form-control" name="unit_cost" id="unit_cost" placeholder="Input Unit Cost" value="0" readonly/>
              </div>
          </div><br>
          <div class="form-row">
              <div class="col">
                <label for="total_amount">Total Amount:</label>
                <input type="number" class="form-control" name="total_amount" id="total_amount" placeholder="Input Total Amount" value="0" readonly/>
              </div>
              <div class="col" style="margin-top:32px;">
                <button type="submit" class="btn btn-primary col-sm-4">Submit</button>
                <a class="btn btn-danger col-sm-3" href="{{ route('vales.index') }}">Cancel</a>
              </div>
          </div>
      </form>
  </div>
</div>
@endsection
