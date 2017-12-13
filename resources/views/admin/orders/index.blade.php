@extends('layouts.admin')

@section('content')

<h1>Orders</h1>
<br><br>
<hr>
<br>

@if(session('orders_deleted'))
    <div class="alert alert-success">
        {{ session()->pull('orders_deleted') }}
    </div>
@endif

@if(count($orders) > 0)
    <form action="delete/orders" method="post">
        {{csrf_field()}}
        {{method_field('delete')}}
    <input class="btn btn-danger" type="submit" name="delete" value="Delete selected">
    <br><br>
    <table class="table table-striped">
    <thead>
        <th><input type="checkbox" id="options"></th>
        <th>Order Id</th>
        <th>Name</th>
        <th>Product Id</th>
        <th>Product Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Email</th>
        <th>Address</th>
        <th>Country</th>
        <th>Created at</th>
    </thead>
    @foreach($orders as $order)
        <tr>
            <td><input class="checkBox" type="checkbox" name="checkBoxArray[]" value="{{ $order->id }}"></td>
            <td>{{ $order->order_id }}</td>
            <td>{{ $order->name }}</td>
            <td>{{ $order->product_id }}</td>
            <td>{{ $order->product ? $order->product->name : 'N/A' }}</td>
            <td>{{ $order->qty }}</td>
            <td>{{ $order->price }}</td>
            <td>{{ $order->email }}</td>
            <td>{{ $order->address }}</td>
            <td>{{ $order->country }}</td>
            <td>{{ $order->created_at }}</td>
        </tr>
    @endforeach
    </table>
    </form>
@else
    <h3>No orders for display</h3>
@endif

@stop

@section('scripts')

<script>
    $(document).ready(function(){
        $("#options").click(function(){
           if(this.checked) {
               $('.checkBox').each(function(){
                   this.checked = true;
               });
           } else {
               $('.checkBox').each(function(){
                   this.checked = false;
               });
           }
        });
    });
</script>

@stop