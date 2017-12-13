
@extends('layouts.home')

@section('content')

    <div class="container">
        <h1>{{ $product->name }}</h1>
        <br>
        <hr>

        <div class="row">
            <div class="col-md-5">
                <img class="img-responsive" src="{{ $product->photo ? $product->photo->file : '/images/misteryman.png' }}" />
            </div>
            <div class="col-md-7">
                <a href="/products/{{ $product->category->name }}">{{ $product->category->name }}</a>
                <br><br>
                <p>{{ $product->description }}</p>
                <br>
                <h3 align="right">${{ $product->price }}</h3>
                <br><br>
                {!! Form::open(['method' => 'POST', 'action' => 'CartController@store']) !!}
                        {!! Form::hidden('id', $product->id) !!}
                        {!! Form::hidden('name', $product->name) !!}
                        @if(!empty($product->photo))
                            {!! Form::hidden('photo', $product->photo->file) !!}
                        @endif
                        {!! Form::hidden('slug', $product->slug) !!}
                        <div class="col-md-3 pull-right">
                        <div class="form-group">
                            {!! Form::number('qty', 1, ['min' => 1, 'max' => 20, 'class' => 'form-control']) !!}
                          </div>
                        {!! Form::hidden('price', $product->price) !!}
                        <div class="form-group">
                            {!! Form::submit('Add to Cart', ['class' => 'btn btn-info form-control']) !!}
                        </div>
                        </div>
                    {!! Form::close() !!}
            </div>
        </div>

        <br><br>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <div id="disqus_thread"></div>
            </div>
        </div>

        <!-- Disqus commenting system script -->
            <script>
                (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://cakeshop-dev.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
        <!-- ./ End Disqus commenting system script -->
@stop




