@extends('layouts.admin')

@section('content')

<h1>Edit Category</h1>
<br>
<a href="{{route('admin.categories.index')}}">Back to Categories</a>
<br><br>
<hr>

@include('includes.form_errors')

{!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Category Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update category', ['class' => 'btn btn-success']) !!}
    </div>
{!! Form::close() !!}

@stop