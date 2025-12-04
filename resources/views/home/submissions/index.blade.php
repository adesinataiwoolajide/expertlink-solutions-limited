<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">View All Submissions</li>
            </ol>
        </nav>
    </div>

    @include('layouts.alert')

    <div class="col-sm-12 mt-3">
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Assignment</th>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Answer</th>
                                <th>Score</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Submitted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($assignments as $index => $submission)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    {{ $submission->assignment ? $submission->assignment->title : 'NIL' }}
                                </td>
                                <td>
                                    {{ $submission->student ? $submission->student->first_name . ' ' . $submission->student->last_name : 'NIL' }}
                                </td>
                                <td>
                                    {{ $submission->course ? $submission->course->course_name : 'NIL' }}
                                </td>
                                <td>
                                    <div class="text-dark">{!! Str::limit($submission->answer_text, 50) !!}</div>
                                    @if($submission->file_path)
                                        <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank" class="btn btn-sm btn-secondary mt-1">View File</a>
                                    @endif
                                </td>
                                <td>{{ $submission->student_score ?? 'Pending' }}</td>
                                <td>{{ $submission->submission_status ?? 'Pending' }}</td>
                                <td>{{ $submission->submission_remark ?? 'NIL' }}</td>
                                <td>{{ $submission->created_at }}</td>
                                <td>
                                   <a href="{{ route('show.course.assignments',[$submission->assignmentSlug,$submission->noteSlug])}}" class="btn btn-primary text-white">Submission</a> 
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $assignments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>