<?php $title = ' 506'; ?>
@extends('layouts.errors')
@section('content')
    
    <h1>{{$title}}</h1>
    <h2> Server Error</h2>
    <p>Server Error. Server is temporarily unable to handle the request.</p>
    <a href="{{ route('dashboard') }}" class="button">Go to Homepage</a>
    <a href="javascript:history.go(-1)" class="buttonError" style="margin-left: 2px;">Go Back</a>
    <div class="toggle" onclick="toggleDarkMode()">Toggle Dark Mode</div>
    
@endsection