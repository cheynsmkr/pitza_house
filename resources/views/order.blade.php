@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center m-2">
        <div class="col-md-8">              
            <h1 class="text-center">PITZA HOUSE</h1>
            <h6 class="text-center">Welcome to Order Page</h6>
        </div>
    </div>

    @if (Session::has('success'))
      <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-5 col-xs-12">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    Order Form    
                </div>
                <div class="card-body bg-white">
                    <form action="{{ route('store') }}" method="POST" class="mx-auto">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="cusName">Name:</label>
                            <input type="text" name="cusName" id="cusName" class="form-control" required>
                        </div>
            
                        <div class="form-group mb-3">
                            <label for="phone">Phone Number:</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                            
                        <div class="form-group mb-3"> 
                            <label for="type">Pizza: </label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="" disabled> Please Select Your Choice</option>
                                @foreach (\App\Models\Pizza::all() as $pizza)
                                  <option value="{{ $pizza->id }}" {{  $pizza_id->id == $pizza->id ? 'selected' : ''}}>{{ $pizza->name }}</option>                       
                                @endforeach 
                            </select>
                        </div>
            
                        <div class="form-group mb-3">
                            <label for="size">Size: </label>
                            <select name="size" id="size" class="form-control" required>
                                <option value="small">Small</option>
                                <option value="medium">Medium</option>
                                <option value="large">Large</option>
                            </select>
                        </div>
            
                        <div class="form-group mb-3">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" name="quantity" id="quantity" value="1" min="1" max="10" required>
                        </div>
                     
                        <div>
                            <button type="submit" class="btn btn-primary" style="width: 100%">Order</button>  
                        </div>
           
                    </form>
                </div>
            </div>
        </div>        
    </div>


</div>
@endsection
