@extends('layouts.app')

@section('content')
    <h1>New task</h1>

    @if($errors->any())
        <div class="alert alert-danger" role="alert">
        <ul>
           @foreach( $errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <form method="post" action="/tasks">
        <div class="form-group" style="margin-bottom: 20px;">
            @csrf
            <label for="description" style="margin-bottom: 5px;">Description</label>
            <input class="form-control" name="description"/>
        </div>
        <div class="form-group d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg ">Create task</button>
        </div>
    </form>
@endsection
