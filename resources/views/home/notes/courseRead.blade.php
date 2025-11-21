@php $title = "View Notes"; $segments = Request::segments();  @endphp
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
            <div class="d-flex justify-content-between align-items-center mb-4 ">
                <h4 class="text-primary fw-bold mb-0">
                    {{ $note->topic }} Notes
                </h4>
                <div class="mb-2">
                    <span class="text-muted">Overall Assignments Progress: {{ $assignmentProgress }}%</span>
                    <div class="progress rounded-pill bg-light" style="height: 8px;">
                        <div class="progress-bar bg-info" role="progressbar"
                            style="width: {{ $assignmentProgress }}%; min-width: 5px;"
                            aria-valuenow="{{ $assignmentProgress }}" aria-valuemin="0" aria-valuemax="100"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ $course->student_assignments_count ?? 0 }} assignments completed">
                        </div>
                    </div>
                </div>

                <div>
                    <span class="text-muted">Overall Tasks Progress: {{ $taskProgress }}%</span>
                    <div class="progress rounded-pill bg-light" style="height: 8px;">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: {{ $taskProgress }}%; min-width: 5px;"
                            aria-valuenow="{{ $taskProgress }}" aria-valuemin="0" aria-valuemax="100"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="{{ $course->student_tasks_count ?? 0 }} tasks completed">
                        </div>
                    </div>
                </div>
            
                <div class="d-flex gap-2">
                    @if (Auth::user()->hasAnyRole(['Student']))
                        <a href="{{ route('mycourse.note.index',$course->slug) }}" 
                        class="btn btn-outline-primary rounded-pill px-4">
                            <i class="bi bi-pencil-square me-2"></i> My Courses
                        </a>
                    @endif

                    @if(Auth::user()->hasAnyRole(['Instructor', 'Administrator', 'Admin']))
                        <a href="{{ route('course.note.edit', ['slug' => $note->slug]) }}" 
                        class="btn btn-sm btn-outline-primary">
                            Edit Course Note
                        </a>

                    @endif
                </div>
            </div>

            <div class="row g-4">
                <!-- Notes Content -->
                <div class="col-md-8">
                    <div class="p-4 bg-white shadow-sm rounded-4">
                        <p class="fs-6 text-secondary lh-lg mb-0">
                            {!! $note->content !!}
                        </p>
                    </div>
                    @foreach ($note->materials as $materials) <?php

                        $imageExtensions = ['jpg', 'jpeg', 'png', 'svg']; $pdfExtensions = ['pdf'];
                        $extension = pathinfo(strtolower($materials->course_file), PATHINFO_EXTENSION);
                        $fileUrl = asset('storage/course-material/' . $materials->course_file);
                        ?>
                        <div class="pdf-container" style="width:100%; clear:both; padding:10px;  margin-bottom:20px;">
                            <iframe width="100%" height="600" src="{{$fileUrl }}#zoom=150&toolbar=0&navpanes=1&scrollbar=1"  type="application/pdf" 
                            frameborder="1" scrolling="auto"> </iframe>
                        </div>
                    @endforeach
                    
                    @foreach (['link_one', 'link_two', 'link_three', 'link_four'] as $index => $link)
                        <div class="video-container" style="width:100%; clear:both; padding:10px;  margin-bottom:20px;">
                            @php 
                                $youtubeLink = $note->$link;
                                if (strpos($youtubeLink, 'watch?v=') !== false) {
                                    $youtubeLink = str_replace('watch?v=', 'embed/', $youtubeLink);
                                }
                            @endphp
                            @if($youtubeLink != 'https://www.youtube.com/embed/')
                                <iframe width="100%" height="500" src="{{ $youtubeLink }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                </iframe>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Notes List -->
                <div class="col-md-4">
                    @foreach ($notes as $note)
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden note-card mb-4 hover-shadow">
                        <div class="card-body d-flex flex-column p-4">
                            <a href="{{ route('mycourse.note.read', [$note->slug, $note->courseSlug]) }}" class="text-decoration-none">
                                <div class="d-flex align-items-center mb-3">
                                    <div style="width:40px; height:40px; background-color:#007bff; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                                        <i class="ri-play-fill text-white fs-5"></i>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="fw-semibold text-dark mb-1">{{ $note->topic }}</h6>
                                        <small class="text-muted">
                                            {{ $note->materials->count() ?? 0 }} Reference Materials
                                        </small>
                                    </div>
                                </div>
                            </a>

                            <!-- Author + Rating -->
                            <div class="d-flex align-items-center mb-3 small text-muted">
                                <strong class="me-2">Author:</strong>
                                @if($note->allocation)
                                    {{ $note->allocation->user->first_name . ' ' . $note->allocation->user->last_name ?? 'ELS-ADMIN' }}
                                @else
                                    {{ 'ELS Tutor' }}
                                @endif
                                <div class="ms-3 d-flex align-items-center">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="ri-star-fill text-warning fs-6"></i>
                                    @endfor
                                    <span class="ms-2"> {{ number_format(5, 1) }} ({{ 5 }} reviews)</span>
                                </div>
                            </div>

                             <div class="mt-auto d-flex flex-wrap gap-2">
                                    <!-- Assignments badge -->
                                    <a href="{{ route('note.course.assignments', $note->slug) }}"
                                        class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="View your {{ $note->student_assignments_count }} submitted assignments">
                                            📝 {{ $note->student_assignments_count }} Assignments
                                    </a>

                                    <!-- Tasks badge -->
                                    <a href="{{ route('note.course.tasks', $note->slug) }}"
                                        class="badge bg-success text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="View your {{ $note->student_tasks_count }} completed tasks">
                                            ✅ {{ $note->student_tasks_count }} Tasks
                                    </a>

                                    <!-- Progress badge -->
                                    <a href="{{ route('note.course.progress', $note->slug) }}"
                                        class="badge bg-primary text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Your overall progress on this note is {{ $note->progressForStudent() }}%">
                                            📊 {{ $note->progressForStudent() }}% Progress
                                    </a>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
