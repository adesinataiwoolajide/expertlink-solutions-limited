<?php $title = ' 419'; ?>

@extends('layouts.errors')
@section('content')
    <h1>{{$title}}</h1>
    <h2>Page Expired</h2>
    <p>Your session has expired due to inactivity or a security timeout. Please refresh the page or return to the homepage.</p>
    <a href="{{ route('signout') }}" class="button"> Click here to Login</a>
    <div class="toggle" onclick="toggleDarkMode()">Toggle Dark Mode</div>
@endsection