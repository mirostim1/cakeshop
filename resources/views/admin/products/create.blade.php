@extends('layouts.admin')

@section('content')

<h1>Create New Product</h1>
<br>
<a href="{{route('admin.products.index')}}">Back to Products</a>
<br><br>
<hr>

@include('includes.form_errors')

{!! Form::open(['method' => 'POST', 'action' => 'AdminProductsController@store', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description', 'Description') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('category', 'Category') !!}
        {!! Form::select('category_id', ['' => 'Choose category'] + $categories, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('price', 'Price') !!}
        {!! Form::text('price', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create product', ['class' => 'btn btn-success']) !!}
    </div>
{!! Form::close() !!}

@stop