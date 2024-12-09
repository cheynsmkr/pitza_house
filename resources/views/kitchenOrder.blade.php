@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center m-2">
        <div class="col-md-8">
            <h1 class="text-center d-block">DAYANG PIZZA</h1>
            <h6 class="text-center d-block">Welcome to add pizza page</h6>
        </div>
        <div class="col-8 d-flex justify-content-between">
            <span></span>
            
        </div>
    </div>
    
    <div class="row justify-content-center p-2">
        <table id="kitchenOrder" class="table table-bordered" class="display">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Pizza Name</th>
                    <th scope="col">Total Pizza</th>
                    <th scope="col">Payment Total</th>                
                </tr>
            </thead>

            <tbody>
                @foreach (\App\Models\Order::all() as $kitchenOrder)
                <tr>
                    <td>#{{ $kitchenOrder->id }}</td>
                    <td>{{ $kitchenOrder->customer_name }}</td>
                    <td>{{ $kitchenOrder->customer_phone }}</td>
                    <td>{{ $kitchenOrder->getPizza->name }}</td>
                    <td>{{ $kitchenOrder->total_order }}</td>
                    <td>$ {{ $kitchenOrder->grand_total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>





</div>

<script>
    $(document).ready(function() {
        $('#kitchenOrder').DataTable({
            ajax: '{{ route('kitchen.orders.data') }}', // URL to fetch data
            columns: [
                { data: 'id' },
                { data: 'customer_name' },
                { data: 'customer_phone' },
                { data: 'pizza_id' },
                { data: 'total_order' },
                { data: 'grand_total' }
            ]
        });
    });
</script>

@endsection
