<?php $title = ' 404'; ?>
@extends('layouts.errors')
@section('content')
    <h1>{{$title}}</h1>
    <h2>Resource not found</h2>
    <p>Oops! The page you're looking for can't be found.</p>
    <p>It might have been removed, had its name changed, or is temporarily unavailable.</p>
    <a href="/" class="button">Go to Homepage</a>
    <a href="javascript:history.go(-1)" class="buttonError" style="margin-left: 2px;">Go Back</a>
    <div class="toggle" onclick="toggleDarkMode()">Toggle Dark Mode</div>
@endsection