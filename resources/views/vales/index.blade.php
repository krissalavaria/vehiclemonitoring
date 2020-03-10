@extends('layouts.app')

@section('content')
  <div class="card uper">
    <div class="card-header" style="display: flex;">
      <a type="button" class="btn btn-primary col-sm-2" style="color:white;" href="{{ route('vales.create') }}">
        <span class="fa fa-sticky-note pr-2"></span>Request Form
      </a>
    </div>
    <div class="card-body">
      @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div><br />
      @endif
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
                    <a href="{{ route('vales.edit', $vale->id)}}" class="btn btn-warning"><span class="fa fa-edit" style="color:white;"></span></a>
                    <a class="btn btn-primary" href="{{ route('vales.show', $vale->id) }}"><span class="fa fa-print"></span></a>
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
<script type="text/javascript">

</script>
@endsection
