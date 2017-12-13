@extends('layouts.admin')

@section('content')

<h1>Edit User</h1>
<br>
<a href="{{route('admin.users.index')}}">Back to Users</a>
<br><br>
<hr>
<br>

@include('includes.form_errors')

{!! Form::model($user, ['method' => 'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id', 'Role') !!}
        {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <img height="65px" width="65px" src="{{ $user->photo ? $user->photo->file : '/cakeshop/images/misteryman.png'}} " />
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update user', ['class' => 'btn btn-success']) !!}
    </div>
{!! Form::close() !!}

@stop