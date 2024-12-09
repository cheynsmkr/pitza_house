@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center m-2">
        <div class="col-md-8">              
            <h1 class="text-center">PITZA HOUSE</h1>
            <h6 class="text-center">Success Order</h6>
        </div>
    </div>

    @if (Session::has('success'))
      <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row justify-content-center">   
        <div class="text-center pt-5">
            <img src="{{ asset('images/sucess.png') }}" alt="Brand Logo" height="400" style="vertical-align: middle; margin-right: 10px;">
        </div>
    </div>


</div>
@endsection
