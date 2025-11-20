@extends('layouts.app')

@section('content')
<h4>{{ $course->course_name }} - Your Progress</h4>

<p>Assignments Progress: {{ $assignmentProgress }}%</p>
<div class="progress mb-3">
    <div class="progress-bar bg-info" style="width: {{ $assignmentProgress }}%"></div>
</div>

<p>Tasks Progress: {{ $taskProgress }}%</p>
<div class="progress mb-3">
    <div class="progress-bar bg-success" style="width: {{ $taskProgress }}%"></div>
</div>

<p>Overall Progress: {{ $overallProgress }}%</p>
<div class="progress">
    <div class="progress-bar bg-primary" style="width: {{ $overallProgress }}%"></div>
</div>
@endsection