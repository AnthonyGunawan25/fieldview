@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{ asset('/css/main.css') }}">

@if (Auth::check())
@if (Auth::user()->role == "admin")
<div class="container">
  <form class="form" method="get" action="{{ route('search') }}">
    <div class="form-group w-50 mb-3">
        <label for="search" class="d-block mr-2">Pencarian</label>
        <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan Nama Lapangan">
        <button type="submit" class="btn btn-primary mb-1">Search</button>
    </div>
</form>
<div class="row">
    @foreach ($field as $fields)
      <div class="col-md-4 col-sm-6 mb-3">
          <div>
              <div class="card-group">
              <div class="card mt-4">
                <a href="{{ url('/field/'.$fields->id) }}">
                  {{-- <img class="card-img-top" src="{{ asset('storage/'.$location->image) }}" alt="Card image cap"> --}}
                  <img class="card-imgg-top" src="{{ asset('storage/'.$fields->image) }}" alt="Card image cap">
                </a>
                <div class="card-body">
                  <h4 class="card-text"><strong>{{$fields->location_name}}</h4></strong>
                  <p class="card-text">{{$fields->address}}</p>
                  <h5 class="card-text">{{$fields->description}}</h5>
                  <form action="{{url ('/delete_location/'.$fields->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">
                      Delete
                    </button>
                  </form> 
                </div>
              </div>
              </div>
            </div>
      </div>
      @endforeach
  </div>
</div>
@endif
@endif

@if (Auth::check())
@if (Auth::user()->role == "member")
<div class="container">
    <form class="form" method="get" action="{{ route('search') }}">
      <div class="form-group w-50 mb-3">
          <label for="search" class="d-block mr-2">Pencarian</label>
          <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan Nama Lapangan">
          <button type="submit" class="btn btn-primary mb-1">Search</button>
      </div>
  </form>
  <div class="row">
    @foreach ($field as $fields)
      <div class="col-md-4 col-sm-6 mb-3">
          <div>
              <div class="card-group">
              <div class="card mt-4">
                <a href="{{ url('/field/'.$fields->id) }}">
                  {{-- <img class="card-img-top" src="{{ asset('storage/'.$location->image) }}" alt="Card image cap"> --}}
                  <img class="card-imgg-top" src="{{ asset('storage/'.$fields->image) }}" alt="Card image cap">
                </a>
                <div class="card-body">
                  <h4 class="card-text"><strong>{{$fields->location_name}}</h4></strong>
                  <p class="card-text">{{$fields->address}}</p>
                  <h5 class="card-text">{{$fields->description}}</h5>
                </div>
              </div>
              </div>
            </div>
      </div>
      @endforeach
  </div>
</div>
@endif
@endif

@guest
<div class="container">
  <form class="form" method="get" action="{{ route('search') }}">
    <div class="form-group w-50 mb-3">
        <label for="search" class="d-block mr-2">Pencarian</label>
        <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan Nama Lapangan">
        <button type="submit" class="btn btn-primary mb-1">Search</button>
    </div>
</form>
<div class="row">
  @foreach ($field as $fields)
    <div class="col-md-4 col-sm-6 mb-3">
        <div>
            <div class="card-group">
            <div class="card mt-4">
              <a href="{{ url('/field/'.$fields->id) }}">
                {{-- <img class="card-img-top" src="{{ asset('storage/'.$location->image) }}" alt="Card image cap"> --}}
                <img class="card-imgg-top" src="{{ asset('storage/'.$fields->image) }}" alt="Card image cap">
              </a>
              <div class="card-body">
                <h4 class="card-text"><strong>{{$fields->location_name}}</h4></strong>
                <p class="card-text">{{$fields->address}}</p>
                <h5 class="card-text">{{$fields->description}}</h5>
              </div>
            </div>
            </div>
          </div>
    </div>
    @endforeach
</div>
</div>
@endguest

@endsection
