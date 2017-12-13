@extends('layouts.home')

@section('content')

    <div class="container">
        <h1>{{ $cat != '' ? $cat : 'All Products' }}</h1>
        <br><br>
        <div class="row">
            <form id="form1" method="get" action="{{ route('products.index') }}">
            <div class="form-group col-md-4">
                <select class="form-control" id="select" onchange=" window.open('/cakeshop/products/' + $('#select').val(), '_self')">
                    <option value="">Choose products category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                    @endforeach
                    <option value="All">All Products</option>
                </select>
            </div>
            </form>

           <form id="form2" method="post" action="{{ route('products.sort') }}">
                {{ csrf_field() }}
            <input type="hidden" name="category" value="{{ $cat }}">
            <div class="form-group col-md-4 pull-right">
                <select class="form-control" name="sort" id="select2" onchange="this.form.submit()">
                    <option>Choose sort option</option>
                    <option value="1">By price: Low - High</option>
                    <option value="2">By price: High - Low</option>
                    <option value="3">By name:  A - Z (asc)</option>
                    <option value="4">By name:  Z - A (desc)</option>
                </select>
            </div>
            </form>
        </div>

        <hr>

        <div class="row">
        @if(count($products) > 0)
            @foreach($products as $product)
            <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-body">
                      <a href="{{ route('product.index', $product->slug) }}">
                          <img width="100%" height="230px" src="{{ $product->photo ? $product->photo->file : '/images/misteryman.png' }}" />
                      </a>
                      <br><br>
                      <a href="{{ route('product.index', $product->slug) }}"><h3>{{ $product->name }}</h3></a>
                      {{ str_limit($product->description, 100) }}
                      <br><br>
                      <p align="right"><strong>${{ $product->price }}</strong></p>
                  </div>
                </div>
            </div>
            @endforeach
        @else
            <h3>There are no products in this category.</h3>
        @endif
        </div>
@stop