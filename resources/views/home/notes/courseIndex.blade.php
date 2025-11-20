@php $title = "View My Notes"; $segments = Request::segments();  @endphp
<x-app-layout>
    
    @include('layouts.alert')
    <style>
        .note-card:hover {
            transform: translateY(-4px);
            transition: all 0.3s ease;
            box-shadow: 0 0.75rem 1.25rem rgba(0,0,0,0.1);
        }

        .note-card {
            transition: all 0.3s ease;
        }
        .note-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 1rem 1.5rem rgba(0,0,0,0.1);
        }
    </style>
    <div class="card">
        <div class="card-body bg-light">
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-primary fw-bold mb-0">
                    {{ $course->course_name }} Notes
                </h4>
               
                @if (Auth::user()->hasAnyRole(['Student'])) 
                    <a href="{{ route('myCourses') }}" class="btn btn-outline-primary rounded-pill px-4">
                        <i class="bi bi-pencil-square me-2"></i> My Learning
                    </a>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="video-container" style="width:100%; clear:both; padding:10px;  margin-bottom:20px;">
                        @if(!empty($course->course_introduction))
                            <label style="font-weight:bold;">Introduction Video:</label>
                            @if(Storage::disk('public')->exists($filePath))
                                <video style="width:100%; height:500px; border:1px solid #ddd; border-radius:6px;" controls controlsList="nodownload">
                                    <source src="{{ asset('storage/' . $filePath) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <p style="color:red; font-weight:bold;">Introduction video not available.</p>
                            @endif
                        @endif
                    </div>
                </div>
                @foreach ($notes as $note)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden note-card">
                            <div class="card-body d-flex flex-column p-4">
                                <a href="{{ route('mycourse.note.read', [$note->slug, $note->courseSlug]) }}" class="text-decoration-none">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle bg-danger d-flex align-items-center justify-content-center flex-shrink-0" style="width:52px; height:52px;">
                                            <i class="ri-play-fill text-white fs-4"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="fw-semibold text-dark mb-1">{{ $note->topic }}</h6>
                                            <small class="text-muted">
                                                {{ $note->materials->count() ?? 0 }} Reference Materials
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <p class="mb-3 text-muted small">
                                    <div class="d-flex align-items-center mb-2">
                                        <strong>Author:</strong>
                                        @if($note->allocation)
                                            {{ $note->allocation->user->first_name . ' ' . $note->allocation->user->last_name. '  ' ?? 'ELS-ADMIN  ' }}
                                        @else
                                            {{'ELS Tutor '}}
                                        @endif
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="ri-star-fill" style="color:{{ $i <= 5 ? '#ffc107' : '#e4e5e9' }}; font-size:16px;"></i>
                                        @endfor
                                        <span class="ms-2 text-muted small">
                                            {{ number_format(5, 1) }} ({{ 5 }} reviews)
                                        </span>
                                    </div>
                                </p>

                                <div class="mt-auto d-flex flex-wrap gap-2">
                                    <span class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm">
                                        📝 5 Assignments
                                    </span>
                                    <span class="badge bg-success text-white px-3 py-2 rounded-pill shadow-sm">
                                        ✅ 10 Tasks
                                    </span>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>