@extends('layouts.app')

@section('content')
<div class="container col-sm-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="alert alert-danger">Sorry, you are not authorized to view that page. <br>
                    Redirect to: <a href="/vales">Home Page</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
