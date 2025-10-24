<?php $title = ' 500'; ?>
@extends('layouts.errors')
@section('content')
    
    <h1>{{$title}}</h1>
    <h2>Internal Server Error</h2>
    <p>Server Error. The server encountered an unexpected condition that prevented it from fulfilling the request.</p>
        <a href="/" class="button">Go to Homepage</a>
    <a href="javascript:history.go(-1)" class="buttonError" style="margin-left: 2px;">Go Back</a>
    <div class="toggle" onclick="toggleDarkMode()">Toggle Dark Mode</div>
    
@endsection