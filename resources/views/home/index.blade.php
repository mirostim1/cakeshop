@extends('layouts.home')

@section('content')
       <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="{{ asset('images/circle/circle1.jpg') }}" alt="Generic placeholder image" width="140" height="140">
          <h2>Products</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim lorem id massa egestas, eget lacinia nibh feugiat. In id malesuada diam, eget sagittis diam. Aliquam hendrerit dui erat, at finibus dolor pulvinar non. Morbi nec molestie quam.</p>
          <p><a class="btn btn-info" href="products.html" role="button">View products &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="{{ asset('images/circle/circle2.jpg') }}" alt="Generic placeholder image" width="140" height="140">
          <h2>About</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim lorem id massa egestas, eget lacinia nibh feugiat. In id malesuada diam, eget sagittis diam. Aliquam hendrerit dui erat, at finibus dolor pulvinar non. Morbi nec molestie quam.</p>
          <p><a class="btn btn-success" href="about.html" role="button">Read details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
          <img class="img-circle" src="{{ asset('images/circle/circle3.jpg') }}" alt="Generic placeholder image" width="140" height="140">
          <h2>Contact</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim lorem id massa egestas, eget lacinia nibh feugiat. In id malesuada diam, eget sagittis diam. Aliquam hendrerit dui erat, at finibus dolor pulvinar non. Morbi nec molestie quam.</p>
          <p><a class="btn btn-info" href="contact.html" role="button">Contact details &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
      </div><!-- /.row -->


      <!-- START THE FEATURETTES -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Sweet and delicious cheesecakes. <span class="text-muted">It'll blow your mind.</span></h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim lorem id massa egestas, eget lacinia nibh feugiat. In id malesuada diam, eget sagittis diam.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="{{ asset('images/500x500/cheesecake1.jpg') }}" alt="Sweet and delicious cheescake">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Creamy and healthy smoothies. <span class="text-muted">Oh yeah, they are that good.</span></h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim lorem id massa egestas, eget lacinia nibh feugiat. In id malesuada diam, eget sagittis diam.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" src="{{ asset('images/500x500/smoothie1.jpg') }}" alt="">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">100% fruit juices. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim lorem id massa egestas, eget lacinia nibh feugiat. In id malesuada diam, eget sagittis diam.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="{{ asset('images/500x500/juice1.jpg') }}" alt="Generic placeholder image">
        </div>
      </div>

@stop