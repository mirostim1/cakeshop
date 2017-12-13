
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>CakeShop</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- Disqus commenting system -->
    <script id="dsq-count-scr" src="//cakeshop-dev.disqus.com/count.js" async></script>

  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <div class="navbar-wrapper">
      <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo/logo.png') }}" /></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="#active"><a href="{{ route('home') }}">HOME</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PRODUCTS <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/products/Cheesecakes">Cheesecakes</a></li>
                    <li><a href="/products/Smoothies">Smoothies</a></li>
                    <li><a href="/products/Milkshakes">Milkshakes</a></li>
                    <li><a href="/products/Juices">Juices</a></li>
                    <li><a href="/products/Coffees">Coffees</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="/products/All">All Products</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('about') }}">ABOUT</a></li>
                <li><a href="{{ route('contact') }}">CONTACT</a></li>
			  </ul>
              <ul class="nav navbar-nav pull-right">
			  	<li><a href="{{ route('cart.index') }}"><span class="glyphicon glyphicon-shopping-cart"><span class="badge">{{ Cart::count() }}</span></span></a></li>
                @if(Auth::user())
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url('logout') }}">Logout</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ url('admin') }}">Admin Area</a></li>
                  </ul>
                </li>
                  @else
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                  </ul>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>


    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="{{ asset('images/carousel/cake1.jpg') }}" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>We have most delicious cakes.</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim lorem id massa egestas, eget lacinia nibh feugiat. In id malesuada diam, eget sagittis diam.</p>
			  <p><a class="btn btn-lg btn-info" href="{{ url('products/All') }}" role="button">Shop our products</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="{{ asset('images/carousel/cake2.jpg') }}" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Cake Shop is a sweet story.</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim lorem id massa egestas, eget lacinia nibh feugiat. In id malesuada diam, eget sagittis diam.</p>
              <p><a class="btn btn-lg btn-info" href="{{ url('about') }}" role="button">Read more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="{{ asset('images/carousel/smoothie1.jpg') }}" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Milkshakes, smoothies and juices for enjoying.</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-info" href="{{ url('products/All') }}" role="button">Buy our products</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    @yield('content')

    <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017 Cake Shop &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
    $(document).ready(function(){
        $('.qty').on('change', function(){
            //alert(this.value + ' -- ' + this.name);
            $('#form1').submit();
        });
    });
</script>
  </body>
</html>
