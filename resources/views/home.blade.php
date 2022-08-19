@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{ asset('/css/main.css') }}">

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{URL::asset('/image/badmin.jpg')}}" alt="First slide">
        <div class="  carousel-caption d-none d-md-block">
          <h2>Field View</h2>
          <h3>Selamat datang di website Field View tempat solusi booking lapangan olahraga secara online</h3>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{URL::asset('/image/stadium.jpg')}}" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
          <h2>Booking lokasi Olahraga Jadi Lebih Mudah</h2>
          <h3>Nama lokasi, alamat, dan list lapangan yang disediakan sudah kami siapkan secara rinci tanpa harus keluar rumah.</h3>
        </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="{{URL::asset('/image/stadium1.jpg')}}" alt="Third slide">
      <div class="  carousel-caption d-none d-md-block">
        <h2>Kesusahan mencari harga dan jadwalnya</h2>
        <h3>Tidak perlu khawatir karena kami menyediakan fitur schedule beserta harganya sehingga user hanya tinggal perlu booking</h3>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand">Category</a></nav>

<div class="card-deck mt-2">
    <div class="card">
        <a href="{{ url('/view_location/1') }}">
          <img class="card-img" src="{{URL::asset('/image/futsal.jpg')}}" alt="Card image cap">
      </a>
        <div class="card-body">
          <h5 class="card-title">Futsal</h5>
        </div>
      </div>
      <div class="card">
          <a href="{{ url('/view_location/2') }}">
            <img class="card-img" src="{{URL::asset('/image/basket.jpg')}}" alt="Card image cap">
          </a>
        <div class="card-body">
          <h5 class="card-title">Basket</h5>
        </div>
      </div>
      <div class="card">
        <a href="{{ url('/view_location/3') }}">
          <img class="card-img" src="{{URL::asset('/image/badminton.jpg')}}" alt="Card image cap">
        </a>
          <div class="card-body"> 
            <h5 class="card-title">Badminton</h5>
          </div>
      </div>
      <div class="card">
        <a href="{{ url('/view_location/4') }}">
        <img class="card-img" src="{{URL::asset('/image/swimming.jpg')}}" alt="Card image cap">
        </a>
        <div class="card-body"> 
          <h5 class="card-title">Swimming</h5>
        </div>
    </div>
</div>


<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark mt-3">
  <a class="navbar-brand">Rekomendasi</a></nav>

<div class="container">
  <div class="row">
      @foreach ($location->take(3) as $locations)
      <div class="col-md-4">
          <div>
              <div class="card-group">
              <div class="card mt-4">
                <a href="{{ url('/field/'.$locations->id) }}">
                  <img class="card-imgg-top" src="{{ asset('storage/'.$locations->image) }}" alt="">
                </a>
                <div class="card-body">
                  <h4 class="card-text"><strong>{{$locations->location_name}}</h4></strong>
                  <p class="card-text">{{$locations->address}}</p>
                  <h5 class="card-text">{{$locations->description}}</h5>
                </div>
              </div>
              </div>
            </div>
      </div>
      @endforeach
  </div>
</div>

{{-- <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark mt-5">
  <a class="navbar-brand">Why choose Us ?</a></nav> --}}

<h2 class="text">Why Choose Us ? </h2>
<hr class="featurette-divider mt-2">
      <div class="row featurette">
        <div class="col-md-9">
          <h2 class="featurette-heading">Easy to Use</h2>
          <p class="lead">Tampilan minimalis yang memudahkan user untuk mencari dan booking location olahraga secara realtime dimanapun dan kapanpun</p>
        </div>
        <div class="col-md-3">
          <img class="feature-image" src={{URL::asset('/image/easytouse.png')}} alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">
      <div class="row featurette">
        <div class="col-md-9">
          <h2 class="featurette-heading">Recommend</h2>
          <p class="lead">Cari jenis olahraga favorit kalian di website kami dan tentukan location sesuai dengan kualitas, harga dan jenis location yang kalian inginkan</p>
        </div>
        <div class="col-md-3">
          <img class="feature-image" src={{URL::asset('/image/recommend.jpg')}} alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-9">
          <h2 class="featurette-heading">Find your Field</h2>
          <p class="lead">Tentukan location yang kalian inginkan serta list location yang sudah kami tentukan tanpa harus datang ke tempat lokasi </p>
        </div>
        <div class="col-md-3">
          <img class="feature-image" src={{URL::asset('/image/field.png')}} alt="Generic placeholder image">
        </div>
      </div>

      <hr class="featurette-divider">

@endsection
