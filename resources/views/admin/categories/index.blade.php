@extends('layouts.admin')

@section('content')

<h1>Categories</h1>
<br>
<a href="{{route('admin.categories.create')}}">Create new category</a>
<br><br>
<hr>
<br>

@if(Session::has('category_updated'))
    <div class="alert alert-success">
        {{session()->pull('category_updated')}}
    </div>
@endif

@if(session('category_created'))
    <div class="alert alert-success">
        {{session()->pull('category_created')}}
    </div>
@endif

@if(Session::has('category_deleted'))
    <div class="alert alert-success">
        {{session()->pull('category_deleted')}}
    </div>
@endif

@if(count($categories) > 0)
    <table class="table table-striped">
        <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Delete</th>
        </thead>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                <td>{{$category->created_at->diffForHumans()}}</td>
                <td>{{$category->updated_at->diffForHumans()}}</td>
                <td>
                {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </tr>
        @endforeach
    </table>
@else
    <h3>No category for display</h3>
@endif

@stop