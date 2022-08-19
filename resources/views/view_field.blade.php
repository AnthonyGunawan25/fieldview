@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/main.css') }}">

@if (Auth::check())
@if (Auth::user()->role == "admin")
<div class="container">
  <img  class="location-img" src="{{ asset('storage/'.$location[0]->image) }}">
    <h1 class="location-name mt-3"><strong>{{$location[0]->location_name}}</strong></h1>
    <h4 class="location-name mt-3">{{$location[0]->address}}</h4>
    <div class="row">
    @isset($field)
      @foreach ($field as $fields)
        <div class="col-md-4">
          <div class="card-group">
            <div class="card mt-3">
                <img class="card-imgg-top" src="{{ asset('storage/'.$fields->image) }}" alt="Card image cap">
              <div class="card-body">
                <div class="text-center">
                <h5>{{$fields->field_name}}</h5>
                <h5>{{$fields->price_range}}</h5>
                <form action="{{url ('/delete_field/'.$fields->id)}}" enctype="multipart/form-data" method="POST">
                  @csrf
                  @method('DELETE')
                  <a href="/view_schedule/{{$fields->id}}" class="btn btn-outline-primary" role="button" aria-pressed="true">Schedule</a>
                  <button type="submit" class="btn btn-outline-danger ml-1">
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
<div class="row">
  <div class="col">
  {{-- @if ($loop->index == 0) --}}
    <h4 class="mt-4"><strong>Description</strong></h4>
    <h5 class="mt-3">{{$field[0]->description}}</h5>
  {{-- @endif --}}
@endisset
<h4 class="mt-5"><strong>Product and Service</strong></h4>
<img src="{{URL::asset('/image/fasilitas.jpg')}}" class="service" alt="img-thumbnail">
<img src="{{URL::asset('/image/service.jpg')}}" class="service" alt="...">
<img src="{{URL::asset('/image/epayment.jpg')}}" class="service" alt="...">
<img src="{{URL::asset('/image/event.jpg')}}" class="service" alt="...">
</div>
</div>
@endif
@endif

@if (Auth::check())
@if (Auth::user()->role == "member")
<div class="container">
      <img  class="location-img" src="{{ asset('storage/'.$location[0]->image) }}">
        <h1 class="location-name mt-3"><strong>{{$location[0]->location_name}}</strong></h1>
        <h4 class="location-name mt-3">{{$location[0]->address}}</h4>
        <div class="row">
        @isset($field)
          @foreach ($field as $fields)
            <div class="col-md-4">
              <div class="card-group">
                <div class="card mt-3">
                    <img class="card-imgg-top" src="{{ asset('storage/'.$fields->image) }}" alt="Card image cap">
                  <div class="card-body">
                    <div class="text-center">
                    <h5>{{$fields->field_name}}</h5>
                    <h5>{{$fields->price_range}}</h5>
                      <a href="/view_schedule/{{$fields->id}}" class="btn btn-outline-primary" role="button" aria-pressed="true">Schedule</a>
                    </div> 
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
    <div class="row">
      <div class="col">
      {{-- @if ($loop->index == 0) --}}
        <h4 class="mt-4"><strong>Description</strong></h4>
        <h5 class="mt-3">{{$field[0]->description}}</h5>
      {{-- @endif --}}
    @endisset
    <h4 class="mt-5"><strong>Product and Service</strong></h4>
    <img src="{{URL::asset('/image/fasilitas.jpg')}}" class="service" alt="img-thumbnail">
    <img src="{{URL::asset('/image/service.jpg')}}" class="service" alt="...">
    <img src="{{URL::asset('/image/epayment.jpg')}}" class="service" alt="...">
    <img src="{{URL::asset('/image/event.jpg')}}" class="service" alt="...">
  </div>
</div>
@endif
@endif

@guest
<div class="container">
  <img  class="location-img" src="{{ asset('storage/'.$location[0]->image) }}">
    <h1 class="location-name mt-3"><strong>{{$location[0]->location_name}}</strong></h1>
    <h4 class="location-name mt-3">{{$location[0]->address}}</h4>
    <div class="row">
    @isset($field)
      @foreach ($field as $fields)
        <div class="col-md-4">
          <div class="card-group">
            <div class="card mt-3">
                <img class="card-imgg-top" src="{{ asset('storage/'.$fields->image) }}" alt="Card image cap">
              <div class="card-body">
                <div class="text-center">
                <h5>{{$fields->field_name}}</h5>
                <h5>{{$fields->price_range}}</h5>
                  <a href="/view_schedule/{{$fields->id}}" class="btn btn-outline-primary" role="button" aria-pressed="true">Schedule</a>
                </div> 
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
<div class="row">
  <div class="col">
  {{-- @if ($loop->index == 0) --}}
    <h4 class="mt-4"><strong>Description</strong></h4>
    <h5 class="mt-3">{{$field[0]->description}}</h5>
  {{-- @endif --}}
@endisset
<h4 class="mt-5"><strong>Product and Service</strong></h4>
<img src="{{URL::asset('/image/fasilitas.jpg')}}" class="service" alt="img-thumbnail">
<img src="{{URL::asset('/image/service.jpg')}}" class="service" alt="...">
<img src="{{URL::asset('/image/epayment.jpg')}}" class="service" alt="...">
<img src="{{URL::asset('/image/event.jpg')}}" class="service" alt="...">
</div>
</div>

@endguest
@endsection
