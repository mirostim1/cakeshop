@extends('layouts.admin')

@section('content')

<h1>Users</h1>
<br>
<a href="{{route('admin.users.create')}}">Create new user</a>
<br><br>
<hr>
<br>

@if(session('user_updated'))
    <div class="alert alert-success">
        {{ session()->pull('user_updated') }}
    </div>
@endif

@if(session('user_created'))
    <div class="alert alert-success">
        {{ session()->pull('user_created') }}
    </div>
@endif

@if(session('user_deleted'))
    <div class="alert alert-success">
        {{ session()->pull('user_deleted') }}
    </div>
@endif

@if(count($users) > 0)
    <table class="table table-striped">
    <thead>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Role</th>
        <th>Email</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Delete</th>
    </thead>
    @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><img height="45px" width="45px" src="{{$user->photo ? $user->photo->file : '/cakeshop/images/misteryman.png'}}" /></td>
            <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
            <td>
            {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUsersController@destroy', $user->id]]) !!}
               {!! Form::submit('Delete user', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </tr>
    @endforeach
    </table>
@else
    <h3>No users for display</h3>
@endif

@stop