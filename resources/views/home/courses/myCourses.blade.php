@php $title = "My Courses"; $segments = Request::segments(); @endphp
<x-app-layout>

    @include('layouts.alert')
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
    <style>
        .text-gradient {
            background: linear-gradient(90deg, #0d6efd, #6610f2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            }

            .bg-gradient {
            background: linear-gradient(45deg, #0d6efd, #6610f2) !important;
            }

            .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .hover-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 1rem 2rem rgba(0,0,0,0.15);
            }
    </style>
    <div class="card-body mt-4 bg-light rounded-4 shadow-sm">
        
        <!-- Page Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold">
                Explore the <span class="text-gradient">amazing courses</span> you have enrolled in
            </h2>
            <p class="text-muted mt-2">✨ Dive into your personalized learning journey and continue where you left off.</p>
        </div>

        <!-- Filter Buttons -->
        @if(count($myProgram) > 0)
            <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
                <button data-filter="*" class="btn btn-outline-primary active rounded-pill shadow-sm">
                    All <span class="badge bg-primary ms-1">{{ count($subList) }}</span>
                </button>
                @foreach($myProgram as $program)
                    @php
                        $count = $subList->where('programSlug', $program->slug)->count();
                    @endphp
                    <button data-filter=".cat--{{ $program->slug }}" class="btn btn-outline-secondary rounded-pill shadow-sm">
                        {{ $program->program_name }} <span class="badge bg-secondary ms-1">{{ $count }}</span>
                    </button>
                @endforeach
            </div>
       
        @endif
        <div class="text-center my-5">
               
            <a href="{{ route('course.index') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                Browse New Available Courses
            </a>
        </div>

        <!-- Course Grid -->
        <div class="row" id="course-grid">
            @foreach ($courses as $course)
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4 course-item cat--{{ $course->programSlug }}">
                    <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden hover-card">
                        
                        <!-- Banner -->
                        <div class="position-relative">
                            <img src="{{ asset('course-banner/' . $course->banner) }}"
                                alt="{{ $course->course_name }}"
                                class="img-fluid w-100"
                                style="height: 180px; object-fit: cover;">
                            <span class="badge bg-gradient position-absolute top-0 end-0 m-2">
                                {{ $course->program->program_name ?? 'New' }}
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="fw-bold text-dark mb-1">{{ Str::limit($course->course_name, 30) }}</h5>
                            <p class="text-muted mb-2">{{ count($course->notes) }} Notes</p>
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

                            <!-- Progress Badges -->
                            <div class="mt-auto d-flex flex-wrap gap-2 mb-3">
                                <a href="{{ route('student.course.assignments', $course->slug) }}"
                                    class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                    data-bs-toggle="tooltip" title="View your {{ $course->student_assignments_count }} submitted assignments">
                                    📝 {{ $course->student_assignments_count }} Assignments
                                </a>

                                <a href="{{ route('student.course.progress', $course->slug) }}"
                                    class="badge bg-success text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                    data-bs-toggle="tooltip" title="Your overall progress on this course is {{ $course->progressForStudent() }}%">
                                    📊 {{ $course->progressForStudent() }}% Progress
                                </a>
                            </div>

                            <!-- Actions -->
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('mycourse.note.index',$course->slug) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3 shadow-sm">
                                    Start Learning
                                </a>
                                <a href="{{ route('course.viewLearning', [$course->slug, $course->programSlug]) }}" class="text-decoration-none text-muted small">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Isotope Script -->
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