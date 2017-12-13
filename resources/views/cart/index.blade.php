@extends('layouts.home')

@section('content')

    <div class="container">
        <h1>Shopping Cart</h1>
        <br>
        <hr>

@if(Cart::count() > 0)
<table class="table table-striped">
    <thead>
        <th>Product</th>
        <th>Photo</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Remove Item</th>
    </thead>
    <tbody>
    <form id="form1" method="post" action="update/cart">
       {{ csrf_field() }}
    @foreach(Cart::content() as $row)
        <tr>
            <td><a href="{{ route('product.index', $row->options->slug) }}">{{ $row->name }}</a></td>
            <td><a href="{{ route('product.index', $row->options->slug) }}"><img width="50px" height="35px" src="{{ $row->options->photo != null ?  $row->options->photo : '/images/misteryman.png' }}" /></a></td>
            <td><input class="qty" type="number" name="qtyArray[]" value="{{ $row->qty }}" size="2" min="1" max="20"></td>
            <td>${{ $row->price }}</td>
            <input type="hidden" name="rowId[]" value="{{ $row->rowId }}">
            <td><button class="btn btn-danger" type="submit" name="delete" value="{{ $row->rowId }}">Remove Item</td>
        </tr>
    @endforeach
        <tr>
            <td></td>
            <td><strong>Total</strong></td>
            <td><strong>{{ Cart::count() }}</strong></td>
            <td><strong>${{ Cart::subtotal() }}</strong></td>
            <td></td>
        </tr>
    </form>
    </tbody>
</table>
            <p><a class="btn btn-info pull-right" href="{{ route('orders.index') }}" type="submit">Proceed to Checkout</a></p>
@else
    <h3>There are no products in cart.</h3>
    <br><br>
    <a class="btn btn-info" href="{{ url('products/All') }}">Continue with shopping</a>
@endif

@stop