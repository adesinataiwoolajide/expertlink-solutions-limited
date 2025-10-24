

<?php $title = ' 401'; ?>
@extends('layouts.errors')
@section('content')
   
    <h1>{{$title}}</h1>
    <h2>Access Denied</h2>
    <h2>Oops, Permission Denied. <br> You Do Not Have The Permission To Access This Page.</p>
    <a href="/" class="button">Go to Homepage</a>
    <a href="javascript:history.go(-1)" class="buttonError" style="margin-left: 2px;">Go Back</a>
    <div class="toggle" onclick="toggleDarkMode()">Toggle Dark Mode</div>

@endsection