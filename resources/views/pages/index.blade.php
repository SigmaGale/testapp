@extends('template.layout')

@section('content')
    
    <div id="this" class="jumbotron text-center">
        <h1> {{$title}}</h1>
        <p>Would you like to Twat someone?</p>
        <p><a href="/login" class="btn btn-success btn-lg">Log In</a> <a href="/register"class="btn btn-primary btn-lg">Register</a>
    </div>
    
@endsection