@extends('layouts.app')

@section('content')
<h4>{{ $course->course_name }} - Your Tasks</h4>
<ul class="list-group">
    @forelse($tasks as $task)
        <li class="list-group-item">
            {{ $task->title }} - {{ $task->status }}
        </li>
    @empty
        <li class="list-group-item text-muted">No tasks completed yet.</li>
    @endforelse
</ul>
{{ $tasks->links() }}
@endsection