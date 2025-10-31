<?php $title = ' 429'; ?>           
@extends('layouts.errors')
@section('content')
    <h1>{{$title}}</h1>
    <h2>Too many Requests</h2>
    <p>Sorry Too Many Requests. Please refresh the page or return to the homepage.</p>
        <a href="/" class="button">Go to Homepage</a>
    <a href="javascript:history.go(-1)" class="buttonError" style="margin-left: 2px;">Go Back</a>
    <div class="toggle" onclick="toggleDarkMode()">Toggle Dark Mode</div>
@endsection