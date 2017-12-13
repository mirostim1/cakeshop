@extends('layouts.admin')

@section('content')

<h1>Edit Product</h1>
<br>
<a href="{{route('admin.products.index')}}">Back to Products</a>
<br><br>
<hr>
<br>

@include('includes.form_errors')

{!! Form::model($product, ['method' => 'PATCH', 'action' => ['AdminProductsController@update', $product->id], 'files' => true]) !!}
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
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <img width="150px" height="150px" src="{{ $product->photo ? $product->photo->file : '/images/misteryman.png' }} " />
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
    {!! Form::submit('Update product', ['class' => 'btn btn-success']) !!}
</div>
{!! Form::close() !!}

@stop