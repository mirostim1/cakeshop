@extends('layouts.admin')

@section('content')

<h1>Upload Media Files</h1>
<br>
<a href="{{ route('admin.media.index') }}">Back to Media</a>
<br><br>
<hr>
<br>

<link rel="stylesheet" href=https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">

{!! Form::open(['method'=>'POST', 'action'=>'AdminMediaController@store', 'class'=>'dropzone']) !!}

{!! Form::close() !!}

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop