@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center m-2">
        <div class="col-md-8">
            <h1 class="text-center d-block">PITZA HOUSE</h1>
            <h6 class="text-center d-block">Welcome to Pitza House</h6>
        </div>

        @auth       
            <div class="col-8 d-flex flex-column align-items-end mb-3">
                <a href="{{ route('addPizza') }}" class="btn btn-primary w-25 mb-2"><i class="fa-solid fa-circle-plus"></i>&nbsp;Add Pizza</a>
                <a href="{{ route('kitchenOrder') }}" class="btn btn-primary w-25"><i class="fa-solid fa-receipt"></i>&nbsp;Kitchen Order</a>
            </div>                 
        @endauth

    </div>

    {{-- {{ dd(\App\Models\Pizza::all()) }} --}}
    @if(\App\Models\Pizza::exists())
        <div class="row justify-content-center p-2">
            @foreach (\App\Models\Pizza::all() as $pizza)
                <div class="col-3 mb-4">
                    <div class="card">
                        <img src="{{ \Storage::disk('pizzaphoto')->url($pizza->photo) }}" class="card-img-top" alt="">
                        <div class="card-body text-center" style="height: 300px">
                            <h5 class="card-title">{{ $pizza->name }}</h5>
                            <p class="card-text mb-4" style="height: 80px">"{{ $pizza->description }}"</p>
                            <p class="card-text">small | medium | large</p>
                            <p class="price">Starting at <b>$ {{ $pizza->small }}</b></p>
                            <a href="{{ route('order', $pizza->id) }}" class="btn btn-primary"><i class="fas fa-cart-plus"></i>&emsp;Order Now</a>
                        </div>
                    </div>     
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center pt-5">
            <img src="{{ asset('images/nopitza.png') }}" alt="Brand Logo" height="400" style="vertical-align: middle; margin-right: 10px;">
        </div>
    @endif


</div>
@endsection
