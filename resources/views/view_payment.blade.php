@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/main.css') }}">

<div class="container">
  <div class="row">
    <div class='col'>
      <div class="borderrr">
        <h3 class="texttitle">BOOKING DETAIL</h3><span>
          <h4 class="textt"><strong>Location : </strong>{{$location[0]->location_name}}</h4><span>
          <h4 class="textt"><strong>Field Name : </strong>{{$field[0]->field_name}}</h4>
          <h4 class="textt"><strong>Schedule Time : </strong>{{$schedule[0]->schedules_time_start}} - {{$schedule[0]->schedules_time_end}}</h4>
          <h4 class="textt"><strong>Price : </strong>{{$schedule[0]->field_price}}</h4>
          <h3 class="textt">===================================================================</h3>
          <h3 class="textt">Silakan periksa pemesanan anda apakah sudah sesuai</h3>
          </div>
      </div>
    </div>
  </div>


  <form method="POST" action="{{url('/create_payment')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name='booking_id'value="{{$payment[0]->id}}">
      <div class='row'>
        @foreach ($payment_method as $payment_methods)
        <div class="col">
          <div class="card-group mt-3 ml-3">
            <div class="cardd">
              <div class="card-body">
                  <img class="payment_method" src="{{ asset('storage/'.$payment_methods->image) }}" alt="Card image cap">
                  <input type="radio" aria-label="Radio button for following text input" id="payment_method_id" name="payment_method_id" value="{{$payment_methods->id}}">
                  <label>{{$payment_methods->payment_method_name}}</label>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="borderrrr mt-3 ml-3">
        <h3 class="textt">Venue Terms and Condition</h3>
        <h4 class="textt"><strong> {{$payment_methods->payment_description}}</h4> 
      </div>
      <h5><input type="radio" class="radioo mr-3 ml-3 mt-3" aria-label="Radio button for following text input">Saya telah membaca dan menyetujui Syarat & Ketentuan yang berlaku diatas</h5>
      <button id='BtnUpdate' class="btn btn-outline-danger  ml-3 mt-1">Pay</button>
  </form>
  
</div>


@endsection
