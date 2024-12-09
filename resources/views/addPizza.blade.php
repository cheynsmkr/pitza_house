@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center m-2">
        <div class="col-md-8">
            <h1 class="text-center d-block">Pitza House</h1>
            <h6 class="text-center d-block">Welcome to add pizza page</h6>
        </div>
        <div class="col-8 d-flex justify-content-between">
            <span></span>
            
        </div>
    </div>
    <style>
        /* Change the font size of the "drag and drop" message */
        .dropify-wrapper {
            line-height: 50px !important;  /* Adjust this value to your preference */
        }
    </style>
    

    @if (Session::has('success'))
      <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="row justify-content-center px-0">
        <div class="card px-0 col-lg-8 col-xs-12">
            <div class="card-header bg-primary text-white fw-bold text-center">
                Pizza Form
            </div>
            <div class="card-body bg-white">
                <form action="{{ route('add_pizza') }}" method="POST" class="mx-auto" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3"> 
                        <label for="pizzaName">Add pizza name:</label>
                        <input type="text" name="pizzaName" id="pizzaName" class="form-control" required>
                    </div>
        
                    <div class="form-group mb-3">
                        <label for="description">Add pizza Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    </div>
        
                    <div class="form-group mb-3"> 
                        <label for="small">Add small pizza price:</label>
                        <input type="number" name="small" id="small" step="0.1" class="form-control" required>
                    </div>
        
                    <div class="form-group mb-3"> 
                        <label for="medium">Add medium pizza price:</label>
                        <input type="number" name="medium" id="medium" step="0.1" class="form-control" required>
                    </div>
        
                    <div class="form-group mb-3"> 
                        <label for="large">Add large pizza price:</label>
                        <input type="number" name="large" id="large" step="0.1" class="form-control" required>
                    </div>
        
                    <div class="input-group mb-4 d-flex justify-content-center">
                        <div class="custom-file w-100">
                            <label for="photo" class="custom-file-label w-100">Upload Pizza Photo:</label>
                            <input type="file" class="dropify" name="photo" id="photo" required>
                        </div>
                    </div>
                    
                               
                    <div>
                        <button type="submit" class="btn btn-primary" style="width: 100%">Add Pizza</button>  
                    </div>               
                </form>      
            </div>
        </div>


    </div>


</div>

<script>
    $(document).ready(function() {
        // Initialize Dropify
        $('.dropify').dropify();
    });
</script>


@endsection
