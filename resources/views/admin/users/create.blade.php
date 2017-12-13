@extends('layouts.admin')

@section('content')

<h1>Create New User</h1>
<br>
<a href="{{route('admin.users.index')}}">Back to Users</a>
<br><br>
<hr>
<br>

@include('includes.form_errors')


{!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Enter Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Enter Email') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id', 'Select Role') !!}
        {!! Form::select('role_id', [''=>'Choose option'] + $roles, null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('photo_id', 'Select Photo') !!}
        {!! Form::file('photo_id', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Create Password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Create user', ['class' => 'btn btn-success']) !!}
    </div>
{!! Form::close() !!}

@stop