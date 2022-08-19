@extends('layouts.app')
@section('title', "Blog of Indonesia Tourism")

@section('content')
<div style="margin-top: 10%; margin-bottom: 10%">
    
    <h3 class="text-center">Update Profile</h3>
    <hr width="210" style="border: 1px solid black" class="mb-5">

    @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif 

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <ul>
                <li>{{$error}}</li>
            </ul>
            @endforeach
        </div>
    @endif --}}

    <div class="d-flex justify-content-center align-items-center" >
        
        <div class="row ">
    

        <form action="{{url ('/updateProfile/'.$user->id)}}" method="POST" class="font-weight-bold">
                
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" style="width: 400px" id="name" placeholder="e.g. john doe" value="{{$user->name}}">
            </div>
            
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" style="width: 400px" id="email" placeholder="example@mail.com" value="{{$user->email}}">
            </div>

            <div class="form-group">
                <label for="phone">Address:</label>
                <input type="text" class="form-control" name="address" style="width: 400px" id="address" placeholder="Jln ..." value="{{$user->address}}">
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" name="phone" style="width: 400px" id="phone" placeholder="e.g. 0812xxxxxx" value="{{$user->phone}}">
            </div>

            <button type="submit" name="updateProfile" id="updateProfileBtn" class="btn btn-outline-dark mt-3" style="margin-left: 38%">Update Profile</button>

        </form>

        </div>
    </div>
</div>
@endsection
