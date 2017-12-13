@extends('layouts.home')

@section('content')

<div class="container">
    <h1>Order submitted successfully!</h1>
    <br>
    <hr>

    <p>We will contact you in short period of time with informations about your purchase. Thank you for your order!</p>
    <br>
    <a class="btn btn-info" href="{{ route('products.index') }}">Continue to website</a>

@stop