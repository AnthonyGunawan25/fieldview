@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
@endpush

@push('styles')
    <script 
        src="{{ asset('main.js') }}">
    </script>
@endpush

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h2 style="text-align: center">Add Schedule</h2>

                <div class="card-body">
                    <form method="POST" action="{{ url('/create_schedule') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="field_id" class="col-md-4 col-form-label text-md-right">{{ __('Field : ') }}</label>

                            <div class="col-md-6">
                                <select name='field_id' id="field_id" class="form-control">
                                    @foreach ($field as $fields)
                                          <option value="{{$fields->id}}">{{$fields->field_name}}</option>
                                    @endforeach
                                  </select>

                                @error('location_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="schedules_date" class="col-md-4 col-form-label text-md-right">{{ __('Schedule Date : ') }}</label>

                            <div class="col-md-6">
                                <input id="schedules_date" type="date" class="form-control @error('schedules_date') is-invalid @enderror" name="schedules_date" value="{{ old('schedules_date') }}" required autocomplete="schedules_date">

                                @error('schedules_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="schedules_time_start" class="col-md-4 col-form-label text-md-right">{{ __('Schedule Time Start : ') }}</label>

                            <div class="col-md-6">
                                <input id="schedules_time_start" type="time" class="form-control @error('schedules_time_start') is-invalid @enderror" name="schedules_time_start" value="{{ old('schedules_time_start') }}" required autocomplete="schedules_time_start">

                                @error('schedules_time_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="schedules_time_end" class="col-md-4 col-form-label text-md-right">{{ __('Schedule Time End : ') }}</label>

                            <div class="col-md-6">
                                <input id="schedules_time_end" type="time" class="form-control @error('schedules_time_end') is-invalid @enderror" name="schedules_time_end" value="{{ old('schedules_time_end') }}" required autocomplete="schedules_time_end">

                                @error('schedules_time_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="field_price" class="col-md-4 col-form-label text-md-right">{{ __('Price : ') }}</label>

                            <div class="col-md-6">
                                <input id="field_price" type="string" class="form-control @error('field_price') is-invalid @enderror" name="field_price" value="{{ old('field_price') }}" required autocomplete="field_price">

                                @error('field_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
