@php $title = "My Courses"; $segments = Request::segments();  @endphp
<x-app-layout>
    
    @include('layouts.alert')
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <div class="card-body mt-3" style="background-color:#f8f9fa;">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">
                        Explore the <span class="text-primary">amazing courses</span> you have enrolled in
                    </h2>
                    <p class="text-muted mt-2">Dive into your personalized learning journey and continue where you left off.</p>
                </div>

                @if(count($myProgram) > 0)
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
                        <button data-filter="*" class="btn btn-outline-primary active">
                            All <span class="badge bg-primary ms-1">{{ count($subList) }}</span>
                        </button>
                        @foreach($myProgram as $program)
                            @php
                                $count = $subList->where('programSlug', $program->slug)->count();
                            @endphp
                            <button data-filter=".cat--{{ $program->slug }}" class="btn btn-outline-secondary">
                                {{ $program->program_name }} <span class="badge bg-secondary ms-1">{{ $count }}</span>
                            </button>
                        @endforeach
                    </div>
                @else
                    <div class="text-center my-5">
                        <p class="mb-3 text-danger">You don’t have any enrolled courses yet.</p>
                        <a href="{{ route('course.index') }}" class="btn btn-primary">
                            Browse Available Courses
                        </a>
                    </div>

                @endif
            </div>
        </div>

        <div class="row" id="course-grid">
           @foreach ($courses as $course)
                
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4 course-item cat--{{ $course->programSlug }}">
                    <div class="card h-100 border-0 shadow rounded-4 overflow-hidden">
                        <!-- Banner -->
                        <div class="position-relative">
                            <img src="{{ asset('course-banner/' . $course->banner) }}"
                                alt="{{ $course->course_name }}"
                                class="img-fluid w-100"
                                style="height: 180px; object-fit: center;">
                            <span class="badge bg-primary position-absolute top-0 end-0 m-2">
                                {{ $course->program->program_name ?? 'New' }}
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <!-- Title -->
                            <h5 class="fw-bold text-dark mb-1">{{ substr($course->course_name, 0,30) }}..</h5>
                            
                            <p class="text-muted mb-2">{{ count($course->notes) }} Notes</p>

                            <!-- Instructor -->
                            <p class="text-secondary mb-3 small">
                                @if($course->allocation)
                                    Instructor: {{ $course->allocation->user->first_name }} {{ $course->allocation->user->last_name }}
                                @else
                                    Added By: {{ $course->user->first_name }} {{ $course->user->last_name }}
                                @endif
                            </p>

                            <!-- Rating -->
                            <div class="d-flex align-items-center mb-3">
                                @php $rating = $course->ratings; @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="ri-star-fill" style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }}; font-size: 18px;"></i>
                                @endfor
                                <span class="ms-2 text-muted small">{{ number_format($rating, 1) }}/5</span>
                            </div>
                             <!-- Progress bar with dynamic color + tooltip -->
                            @php
                                $assignmentProgress = $course->progressForStudent();
                                $taskProgress = $course->taskProgressForStudent();
                                $overallProgress = round(($assignmentProgress + $taskProgress) / 2, 2);

                                if ($overallProgress < 40) {
                                    $progressColor = 'bg-danger'; // red
                                } elseif ($overallProgress < 70) {
                                    $progressColor = 'bg-warning'; // yellow
                                } else {
                                    $progressColor = 'bg-success'; // green
                                }

                                $tooltipText = "{$course->student_assignments_count} assignments, {$course->student_tasks_count} tasks completed";
                            @endphp
                            <!-- Progress badges -->
                             <div class="mt-auto d-flex flex-wrap gap-2 mb-2">
                                <!-- Assignments badge -->
                                <a href="{{ route('student.course.assignments', $course->slug) }}"
                                    class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="View your {{ $course->student_assignments_count }} submitted assignments">
                                        📝 {{ $course->student_assignments_count }} Assignments
                                </a>

                                {{-- <!-- Tasks badge -->
                                <a href="{{ route('student.course.tasks', $course->slug) }}"
                                    class="badge bg-success text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="View your {{ $course->student_tasks_count }} completed tasks">
                                        ✅ {{ $course->student_tasks_count }} Tasks
                                </a> --}}

                                <!-- Progress badge -->
                                <a href="{{ route('student.course.progress', $course->slug) }}"
                                    class="badge bg-primary text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Your overall progress on this course is {{ $course->progressForStudent() }}%">
                                        📊 {{ $course->progressForStudent() }}% Progress
                                </a>
                            </div>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                
                                <a href="{{ route('mycourse.note.index',$course->slug) }}" class="btn btn-sm btn-outline-primary px-3">Start Learning</a>
                               
                                <a href="{{ route('course.viewLearning', [$course->slug, $course->programSlug]) }}" class="text-decoration-none text-muted small">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var grid = document.querySelector('#course-grid');
                var iso = new Isotope(grid, {
                    itemSelector: '.course-item',
                    layoutMode: 'fitRows'
                });

                document.querySelectorAll('[data-filter]').forEach(function (button) {
                    button.addEventListener('click', function () {
                        document.querySelectorAll('[data-filter]').forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');
                        var filterValue = this.getAttribute('data-filter');
                        iso.arrange({ filter: filterValue });
                    });
                });
            });
        </script>
    </div>
    

</x-app-layout>
