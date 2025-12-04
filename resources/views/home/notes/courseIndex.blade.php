@php $title = "View My Notes"; $segments = Request::segments(); @endphp
<x-app-layout>

    @include('layouts.alert')

    <style>
        .note-card {
            transition: all 0.3s ease;
        }
        .note-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 1rem 1.5rem rgba(0,0,0,0.15);
        }
        .text-gradient {
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>

    <div class="card mt-4 border-0 shadow-lg rounded-4">
        <div class="card-body bg-light rounded-4">

            <!-- Header -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
                <h3 class="fw-bold text-gradient mb-0">
                    📘 {{ $course->course_name }} Notes
                </h3>

                <div class="mb-2">
                    <span class="text-muted fw-semibold">Assignments Progress: {{ $assignmentProgress }}%</span>
                    <div class="progress rounded-pill bg-light mt-1" style="height: 10px;">
                        <div class="progress-bar bg-info" role="progressbar"
                            style="width: {{ $assignmentProgress }}%; min-width: 5px;"
                            aria-valuenow="{{ $assignmentProgress }}" aria-valuemin="0" aria-valuemax="100"
                            data-bs-toggle="tooltip" title="{{ $course->student_assignments_count ?? 0 }} assignments completed">
                        </div>
                    </div>
                </div>

                @if(Auth::user()->hasAnyRole(['Administrator',"Admin", "Instructor"]))
                    <a href="{{ route('course.show',$course->slug) }}" class="btn btn-sm btn-info rounded-pill shadow-sm text-white">
                        <i class="ri-information-line me-1"></i> Course Details
                    </a>
                @endif

                @if (Auth::user()->hasAnyRole(['Student'])) 
                    <a href="{{ route('myCourses') }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                        <i class="ri-book-open-line me-2"></i> My Learning
                    </a>
                @endif
            </div>

            <!-- Introduction Video -->
            <div class="row">
                @if(!empty($course->course_introduction))
                    <div class="col-md-12 mb-4">
                        <div class="video-container">
                            <h6 class="fw-bold mb-2">🎥 Introduction Video</h6>
                            @if(Storage::disk('public')->exists($filePath))
                                <video class="w-100 rounded-4 shadow-sm border" style="height:500px;" controls controlsList="nodownload">
                                    <source src="{{ asset('storage/' . $filePath) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <p class="text-danger fw-bold">Introduction video not available.</p>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Notes Grid -->
                @if(count($notes) > 0)
                    @foreach ($notes as $note)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden note-card">
                                <div class="card-body d-flex flex-column p-4">

                                    <!-- Note Header -->
                                    <a href="{{ route('mycourse.note.read', [$note->slug, $note->courseSlug]) }}" class="text-decoration-none">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center flex-shrink-0 shadow-sm" style="width:52px; height:52px;">
                                                <i class="ri-file-text-line text-white fs-4"></i>
                                            </div>
                                            <div class="ms-3">
                                                <h6 class="fw-bold text-dark mb-1">{{ $note->topic }}</h6>
                                                <small class="text-muted">{{ $note->materials->count() ?? 0 }} Reference Materials</small>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- Author + Rating -->
                                    <p class="mb-3 text-muted small">
                                        <div class="d-flex align-items-center">
                                            <strong class="me-2">Author:</strong>
                                            @if($note->allocation)
                                                {{ $note->allocation->user->first_name }} {{ $note->allocation->user->last_name }}
                                            @else
                                                ELS Tutor
                                            @endif
                                            <span class="ms-3">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="ri-star-fill" style="color:#ffc107; font-size:16px;"></i>
                                                @endfor
                                                <span class="ms-2 text-muted small">5.0 (5 reviews)</span>
                                            </span>
                                        </div>
                                    </p>

                                    <!-- Badges -->
                                    <div class="mt-auto d-flex flex-wrap gap-2">
                                        <a href="{{ route('note.course.assignments', $note->slug) }}"
                                            class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                            data-bs-toggle="tooltip" title="View your {{ $note->assignments->count() }} submitted assignments">
                                            📝 {{ $note->assignments->count() }} Assignments
                                        </a>

                                        <a href="{{ route('note.course.progress', $note->slug) }}"
                                            class="badge bg-success text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                            data-bs-toggle="tooltip" title="Your overall progress on this note is {{ $note->progressForStudent() }}%">
                                            📊 {{ $note->progressForStudent() }}% Progress
                                        </a>

                                        @if (Auth::user()->hasAnyRole(['Instructor', 'Administrator', 'Admin']))
                                            <a href="{{ route('course.note.edit', $note->slug) }}"
                                                class="badge bg-dark text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none">
                                                ✏️ Edit Note
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $notes->links() }}
                    </div>

                @else
                    <!-- Empty State -->
                    <div class="col-12">
                        <div class="card border-0 shadow-sm text-center rounded-4 p-4">
                            <i class="ri-error-warning-fill fs-1 text-danger mb-3"></i>
                            <h5 class="fw-bold text-danger">No Notes Found</h5>
                            <p class="text-muted">There are currently no course notes available for this view.</p>
                            <a href="{{ route('myCourses') }}" class="btn btn-outline-primary rounded-pill px-4 mt-2">
                                Browse Courses
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>