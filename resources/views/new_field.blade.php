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
            
            <h2 style="text-align: center">Add Field</h2>

                <div class="card-body">
                    <form method="POST" action="{{ url('/create_field') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="field_name" class="col-md-4 col-form-label text-md-right">{{ __('Field Name : ') }}</label>

                            <div class="col-md-6">
                                <input id="field_name" type="string" class="form-control @error('field_name') is-invalid @enderror" name="field_name" value="{{ old('field_name') }}" required autocomplete="field_name">

                                @error('field_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="location_id" class="col-md-4 col-form-label text-md-right">{{ __('Location : ') }}</label>

                            <div class="col-md-6">
                                <select name='location_id' id="location_id" class="form-control">
                                    @foreach ($location as $locations)
                                          <option value="{{$locations->id}}">{{$locations->location_name}}</option>
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
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category : ') }}</label>

                            <div class="col-md-6">
                                <select name='category_id' id="category_id" class="form-control">
                                    @foreach ($Category as $Categories)
                                          <option value="{{$Categories->id}}">{{$Categories->category_name}}</option>
                                    @endforeach
                                  </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price_range" class="col-md-4 col-form-label text-md-right">{{ __('Price Range : ') }}</label>

                            <div class="col-md-6">
                                <input id="price_range" type="string" class="form-control @error('price_range') is-invalid @enderror" name="price_range" value="{{ old('price_range') }}" required autocomplete="price_range">

                                @error('price_range')
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
                        
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description : ') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="string" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                                @error('description')
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
