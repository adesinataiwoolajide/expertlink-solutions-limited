<?php $title = ' 401'; ?>
@extends('layouts.errors')
@section('content')
   
    <h1>{{$title}}</h1>
    <h2>Unauthenticated Request</h2>
    <h2>Unauthenticated Request. <br> The request sent by the client could not be authenticated..</p>
    <a href="{{ route('signout') }}" class="button"> Click here to Login</a>
    <div class="toggle" onclick="toggleDarkMode()">Toggle Dark Mode</div>
@endsection