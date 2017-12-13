@extends('layouts.admin')

@section('content')

<h1>Products</h1>
<br>
<a href="{{route('admin.products.create')}}">Create new product</a>
<br><br>
<hr>
<br>

@if(Session::has('product_updated'))
    <div class="alert alert-success">
        {{session()->pull('product_updated')}}
    </div>
@endif

@if(Session::has('product_created'))
    <div class="alert alert-success">
        {{session()->pull('product_created')}}
    </div>
@endif

@if(Session::has('delete_selected'))
    <div class="alert alert-success">
        {{session()->pull('delete_selected')}}
    </div>
@endif

@if(count($products) > 0)
    <form method="post" action="delete/products">
        {{ csrf_field() }}
        {{ method_field('delete') }}
    <input class="btn btn-danger" type="submit" name="delete_selected" value="Delete selected">
    <br><br>
    <table class="table table-striped">
        <thead>
            <th><input type="checkbox" id="options"></th>
            <th>Id</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Created at</th>
            <th>Updated at</th>
        </thead>
        @foreach($products as $product)
            <tr>
                <td><input class="checkbox" type="checkbox" name="checkBoxArray[]" value="{{ $product->id }}"></td>
                <td>{{ $product->id }}</td>
                <td><img height="45px" width="45px" src="{{ $product->photo ? $product->photo->file : '/images/misteryman.png' }}" /></td>
                <td><a href="{{ route('admin.products.edit', $product->id) }}">{{ $product->name }}</a></td>
                <td>{{ str_limit($product->description, 50) }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->created_at->diffForHumans() }}</td>
                <td>{{ $product->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
    </table>
    </form>
@else
    <h3>No products for display</h3>
@endif

@stop

@section('scripts')

<script>
    $(document).ready(function(){
        $('#options').click(function(){
            if(this.checked == true) {
                $('.checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $('.checkbox').each(function(){
                    this.checked = false;
                });
            }
        });
    });
</script>

@stop
