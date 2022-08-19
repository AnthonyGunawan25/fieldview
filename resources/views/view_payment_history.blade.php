@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('/css/main.css') }}">

<div class="container">
  @if (Auth::user()->role == "member")
    <h3 class="texttitle">{{$user[0][0]->name}}'s Payment History</h3>
  @endif

  @if (Auth::user()->role == "admin")
    <h3 class="texttitle">View Payment</h3>
  @endif
    <div class="row">
      @foreach ($payment as $key=>$payments)
        <div class="border-payment mt-1">
          <h4 class="textt"><strong>Method : </strong>{{$payment[$key][0]->payment_method_name}}</h4><span>
          <h4 class="textt"><strong>Field : </strong>{{$field[$key][0]->field_name}}</h4>
          <h4 class="textt"><strong>Schedule Date : </strong>{{$schedule[$key][0]->schedules_date}}</h4>
          <h4 class="textt"><strong>Schedule Time : </strong>{{$schedule[$key][0]->schedules_time_start}} - {{$schedule[$key][0]->schedules_time_end}}</h4>
          <h4 class="textt"><strong>Location : </strong>{{$location[$key][0]->location_name}}</h4>
          @if (Auth::user()->role == "admin")
            <h4 class="textt"><strong>User : </strong>{{$user[$key][0]->name}}</h4><span>
          @endif
        </div>
      @endforeach
    </div>
</div>


@endsection
