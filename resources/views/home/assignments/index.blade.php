<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">View All Assignments</li>
            </ol>
        </nav>
    </div>
    @include('layouts.alert')
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Due Date</th>
                                <th>Total Grade</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($assignments as $index => $assignment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td> <div class="text-dark">{!! $assignment->description !!}</div></td>
                                <td>{{ $assignment->due_date }}</td>
                                <td>{{ $assignment->max_score }}</td>
                                <td>{{ $assignment->created_at }}
                                    <br> By: {{ $assignment->instructor ? $assignment->instructor->first_name . ' ' . $assignment->instructor->last_name : 'NIL' }}
                                </td>
                                <td>
                                    <a href="{{ route('note.course.assignments',$assignment->noteSlug) }}" class="btn btn-info text-white">View</a>
                                    <a href="{{ route('submission.course.create',$assignment->slug) }}" class="btn btn-primary text-white">Submission</a>
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>