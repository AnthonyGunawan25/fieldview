@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/main.css') }}">


@if (Auth::check())
@if (Auth::user()->role == "admin")
<div class="container">
  <div class="row">
    <div class="borderr">
      <h3 class="texttitle">BOOKING DETAIL</h3><span>
        <h4 class="textt"><strong>Location : </strong>{{$location[0]->location_name}}</h4><span>
        <h4 class="textt"><strong>Field Name : </strong>{{$field[0]->field_name}}</h4>
        <h4 class="textt"><strong>Schedule Time : </strong>{{$schedule[0]->schedules_time_start}} - {{$schedule[0]->schedules_time_end}}</h4>
        <h4 class="textt"><strong>Price : </strong>{{$schedule[0]->field_price}}</h4>
        <h3 class="textt">===================================================================</h3>
        <h3 class="textt">Silakan periksa pemesanan Anda apakah sudah sesuai sebelum masuk kebagian payment</h3>
        <h3 class="textt">Please check your order if it is correct before entering the payment section</h3>

        <form method="POST" action="{{url('/create_booking')}}" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name='schedule_id'value="{{$schedule[0]->id}}">
            <input type="hidden" name='field_id'value="{{$field[0]->id}}">
            <input type="hidden" name='location_id'value="{{$location[0]->id}}">
            <input type="hidden" name='user_id'value="{{Auth::user()->id}}">
            <button id='BtnUpdate' class="btn btn-outline-danger ml-2">Booking</button>
        </form>
      </div>
  </div>
</div>
@endif
@endif

@if (Auth::check())
@if (Auth::user()->role == "member")
<div class="container">
  <div class="row">
    <div class="borderr">
      <h3 class="texttitle">BOOKING DETAIL</h3><span>
        <h4 class="textt"><strong>Location : </strong>{{$location[0]->location_name}}</h4><span>
        <h4 class="textt"><strong>Field Name : </strong>{{$field[0]->field_name}}</h4>
        <h4 class="textt"><strong>Schedule Time : </strong>{{$schedule[0]->schedules_time_start}} - {{$schedule[0]->schedules_time_end}}</h4>
        <h4 class="textt"><strong>Price : </strong>{{$schedule[0]->field_price}}</h4>
        <h3 class="textt">===================================================================</h3>
        <h3 class="textt">Silakan periksa pemesanan Anda apakah sudah sesuai sebelum masuk kebagian payment</h3>
        <h3 class="textt">Please check your order if it is correct before entering the payment section</h3>

        <form method="POST" action="{{url('/create_booking')}}" enctype="multipart/form-data">
          @csrf
            <input type="hidden" name='schedule_id'value="{{$schedule[0]->id}}">
            <input type="hidden" name='field_id'value="{{$field[0]->id}}">
            <input type="hidden" name='location_id'value="{{$location[0]->id}}">
            <input type="hidden" name='user_id'value="{{Auth::user()->id}}">
            <button id='BtnUpdate' class="btn btn-outline-danger ml-2">Booking</button>
        </form>
      </div>
  </div>
</div>
@endif
@endif

@endsection
