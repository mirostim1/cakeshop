@extends('layouts.home')

@section('content')

    <div class="container marketing">

      <!-- START THE FEATURETTES -->

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Contact <span class="text-muted">/ Keep in touch.</span></h2>
          <br>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim lorem id massa egestas, eget lacinia nibh feugiat. In id malesuada diam, eget sagittis diam. Aliquam hendrerit dui erat, at finibus dolor pulvinar non. Morbi nec molestie quam. Aenean vel libero non tortor finibus gravida. Cras dictum ultricies nunc.</p>
          <p class="lead">
            <br>
            Cake Shop d.o.o.
            <br>
            Some Street 123
            <br>
            12 345 City
            <br>
            Country
            <br><br>
          	<span class="glyphicon glyphicon-phone-alt"></span> /+385/ 12 1234 567
          	<br>
          	<span class="glyphicon glyphicon-phone-alt"></span> /+385/ 89 9876 543
          	<br><br>
          	Email: customers@cakeshop.dev
          	<br><br>
          	Follow us on:
          		<br><br>
          		<img width="70px" src="{{ asset('images/icons/facebook.png') }}" /> <img width="70px" src="{{ asset('images/icons/tweeter.png') }}" /> <img  width="70px"
          		src="{{ asset('images/icons/google.png') }}" /> <img width="70px" src="{{ asset('images/icons/linkedin.png') }}" />
		  </p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive center-block" src="{{ asset('images/500x500/company2.jpg') }}" alt="Sweet and delicious cheescake">
          <br>
          <img class="featurette-image img-responsive center-block" src="{{ asset('images/500x500/cheesecake2.jpg') }}" alt="Sweet and delicious cheescake">
        </div>
      </div>

@stop