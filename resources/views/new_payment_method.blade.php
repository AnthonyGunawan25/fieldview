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
            
            <h2 style="text-align: center">Add Payment Method</h2>

                <div class="card-body">
                    <form method="POST" action="{{ url('/create_payment_method') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="payment_method_name" class="col-md-4 col-form-label text-md-right">{{ __('Payment Name : ') }}</label>

                            <div class="col-md-6">
                                <input id="payment_method_name" type="string" class="form-control @error('payment_method_name') is-invalid @enderror" name="payment_method_name" value="{{ old('payment_method_name') }}" required autocomplete="payment_method_name">

                                @error('payment_method_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="payment_description" class="col-md-4 col-form-label text-md-right">{{ __('Payment Description : ') }}</label>

                            <div class="col-md-6">
                                <input id="payment_description" type="string" class="form-control @error('payment_description') is-invalid @enderror" name="payment_description" value="{{ old('payment_description') }}" required autocomplete="payment_description">

                                @error('payment_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image : ') }}</label>
            
                            <div class="col-md-6">
                                <input type="file" name="image" class="form-control">
            
                                @error('image')
                                    <span class="help-block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            
                                @error('image')
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
