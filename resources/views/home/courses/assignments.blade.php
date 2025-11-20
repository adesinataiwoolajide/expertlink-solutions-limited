@extends('layouts.app')

@section('content')
<h4>{{ $course->course_name }} - Your Assignments</h4>
<ul class="list-group">
    @forelse($assignments as $assignment)
        <li class="list-group-item">
            {{ $assignment->title }} - {{ $assignment->status }}
        </li>
    @empty
        <li class="list-group-item text-muted">No assignments submitted yet.</li>
    @endforelse
</ul>
{{ $assignments->links() }}
@endsection