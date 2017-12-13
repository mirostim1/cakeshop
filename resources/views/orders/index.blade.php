@extends('layouts.home')

@section('content')

<div class="container">
    <h1>Shipping Details</h1>
    <br>
    <hr>

@if(count(Cart::content()) < 1)
        <p>Your cart is empty so you can't proceed with checkout.</p><br>
        <p><a class="btn btn-info" href="{{ url('products/All') }}">Continue with shopping</a></p>
@else

    @if(Auth::guest())
        <br>
        <p>You must <a href="{{ url('login') }}">sign in</a> to proceed with checkout.
    @else
        <br>
        <p>You are signed in and you can place your shipping data below.<a class="btn btn-info pull-right" href="/cart">Back to Cart</a>
        <br><br>
        <hr>

        @include('includes.form_errors')

        <div class="row">
            <div class="col-md-12">
                {!! Form::open(['method' => 'POST', 'action' => 'OrdersController@store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Enter Name') !!}
                    {!! Form::text('name', null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Enter Email') !!}
                    {!! Form::email('email', null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address', 'Shipping Address') !!}
                    {!! Form::text('address', null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country', 'Enter Country/State') !!}
                    {!! Form::text('country', null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit Order', ['class' => 'btn btn-success']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    @endif
@endif

@stop