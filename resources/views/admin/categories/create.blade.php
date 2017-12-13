@extends('layouts.admin')

@section('content')

<h1>Create New Category</h1>
<br>
<a href="{{route('admin.categories.index')}}">Back to Categories</a>
<br><br>
<hr>
<br>

@include('includes.form_errors')

{!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store']) !!}
    <div class="form-group">
        {!! Form::label('name', 'Enter Category') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create category', ['class' => 'btn btn-success']) !!}
    </div>
{!! Form::close() !!}

@stop