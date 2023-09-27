@extends('layouts.app')

@section('content')
    <h1 style="text-align: center">Registration</h1>
    <form style=" margin-left: auto; margin-right: auto;" class="col-3 offset-4 border rounded" method="post" action="{{route('user.registration')}}">
        @csrf
        <div class="form-group">
            <label for="email" class="col-form-label-lg">Email address</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
            @error('email')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label-lg">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            @error('password')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
