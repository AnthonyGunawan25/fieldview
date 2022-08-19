@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/main.css') }}">

@if (Auth::check())
@if (Auth::user()->role == "admin")
<div class="container">
  <div class="row">
    <div class='col'>
      <img  class="field-img" src="{{ asset('storage/'.$field[0]->image) }}">
        <h1 class="location-name mt-3"><strong> {{$field[0]->field_name}}</strong></h1>
        <a class="btn btn-primary" href="/new_schedule/{{$id}}" role="button">ADD SCHEDULE</a>
    </div>
  </div>

  <div class="row">
    @isset($schedule)
      @foreach ($schedule as $schedules)
      <div class="col-3">
        <div class="card-group mt-3">
          <div class="card">
            <div class="card-body">
              <h5 class="text-center">{{$schedules->schedules_date}}</h5>
              <h5 class="text-center">{{$schedules->schedules_time_start}} - {{$schedules->schedules_time_end}}</h5>
              <h5 class="text-center">Rp. {{$schedules->field_price}}</h5>
              <h5 class="text-center">{{$schedules->booking_status}}</h5>
              {{-- <a class="btn btn-primary" href="/view_booking_page/{{$schedules->id}}" role="button">Booking</a> --}}
                <form action="{{url ('/delete_schedule/'.$schedules->id)}}" enctype="multipart/form-data" method="POST">
                  @csrf
                  @method('DELETE')
                  @if ($schedules->booking_status == 'booked')
                  <a class="btn btn-outline-primary disabled ml-3" href="/view_booking_page/{{$schedules->id}}" role="button">Booking</a>
                  <button type="submit" class="btn btn-outline-danger ml-1">
                    Delete
                  </button>
                </form>    
                  @else
                  <a class="btn btn-outline-primary ml-3" href="/view_booking_page/{{$schedules->id}}" role="button">Booking</a>
                  <button type="submit" class="btn btn-outline-danger ml-1">
                    Delete
                  </button>
                </form>  
                  @endif
                  
            </div>
          </div>
        </div> 
      </div>
      @endforeach
      @endisset
  </div>
</div>
@endif
@endif

@if (Auth::check())
@if (Auth::user()->role == "member")
<div class="container">
  <div class="row">
    <div class='col'>
      <img  class="field-img" src="{{ asset('storage/'.$field[0]->image) }}">
        <h1 class="location-name mt-3"><strong> {{$field[0]->field_name}}</strong></h1>
    </div>
  </div>

  <div class="row">
    @isset($schedule)
      @foreach ($schedule as $schedules)
      <div class="col-3">
        <div class="card-group mt-3">
          <div class="card">
            <div class="card-body">
              <div class="text-center">
                <h5>{{$schedules->schedules_date}}</h5>
                <h5>{{$schedules->schedules_time_start}} - {{$schedules->schedules_time_end}}</h5>
                <h5>Rp. {{$schedules->field_price}}</h5>
                <h5>{{$schedules->booking_status}}</h5>
                @if ($schedules->booking_status == 'booked')
                  <a class="btn btn-outline-danger disabled" href="/view_booking_page/{{$schedules->id}}" role="button">Booked</a> 
                @else
                  <a class="btn btn-outline-primary" href="/view_booking_page/{{$schedules->id}}" role="button">Booking</a>
                @endif
              </div>
            </div>
          </div>
        </div> 
      </div>
      @endforeach
      @endisset
  </div>
</div>
@endif
@endif

@guest
<div class="container">
  <div class="row">
    <div class='col'>
      <img  class="field-img" src="{{ asset('storage/'.$field[0]->image) }}">
        <h1 class="location-name mt-3"><strong> {{$field[0]->field_name}}</strong></h1>
    </div>
  </div>

  <div class="row">
    @isset($schedule)
      @foreach ($schedule as $schedules)
      <div class="col-3">
        <div class="card-group mt-3">
          <div class="card">
            <div class="card-body">
              <div class="text-center">
                <h5>{{$schedules->schedules_date}}</h5>
                <h5>{{$schedules->schedules_time_start}} - {{$schedules->schedules_time_end}}</h5>
                <h5>Rp. {{$schedules->field_price}}</h5>
                <h5>{{$schedules->booking_status}}</h5>
                <a class="btn btn-outline-primary" href="/login" role="button">Booking</a>
              </div>
            </div>
          </div>
        </div> 
      </div>
      @endforeach
      @endisset
  </div>
</div>
@endguest

@endsection
