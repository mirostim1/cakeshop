@extends('layouts.admin')

@section('content')
<h1>Dashboard - Admin Area</h1>
<br>
<hr>
<br>
<a href="{{ route('admin.users.index') }}">Users</a> |
<a href="{{ route('admin.categories.index') }}">Categories</a> |
<a href="{{ route('admin.products.index') }}">Products</a> |
<a href="{{ route('admin.media.index') }}">Media</a> |
<a href="{{ route('admin.orders.index') }}">Orders</a>

@stop