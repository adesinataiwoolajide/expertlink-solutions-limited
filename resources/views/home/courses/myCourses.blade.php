@php $title = "My Courses"; $segments = Request::segments();  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('course.index') }}" title="View all Courses">View all Courses</a></li>
            </ol>
        </nav>
    </div>
    @include('layouts.alert')
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <div class="card-body" style="background-color:#f8f9fa;">
        <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
            <h4 style="font-weight:600;">Lets start learning</h4>
            <a href="{{ route('myCourses') }}" style="text-decoration:none; color:#007bff; font-weight:500;">My learning</a>
        </div>
        
        <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

        <!-- Section Title and Filter Buttons -->
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">
                        Proud projects that <span class="text-primary">make us stand out</span>
                    </h2>
                    <p class="text-muted mt-2">Explore our diverse portfolio across key technology domains.</p>
                </div>

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
            </div>
        </div>

        <!-- Course Cards -->
        <div class="row" id="course-grid">
            @foreach ($courses as $course)
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4 course-item cat--{{ $course->programSlug }}">
                    <div class="card h-100 border-0 shadow rounded-4 overflow-hidden">
                        <!-- Banner -->
                        <div class="position-relative">
                            <img src="{{ asset('course-banner/' . $course->banner) }}"
                                alt="{{ $course->course_name }}"
                                class="img-fluid w-100"
                                style="height: 180px; object-fit: cover;">
                            <span class="badge bg-primary position-absolute top-0 end-0 m-2">
                                {{ $course->program->program_name ?? 'New' }}
                            </span>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <!-- Title -->
                            <h5 class="fw-bold text-dark mb-1">{{ $course->course_name }}</h5>
                            <p class="text-muted mb-2">{{ count($course->notes) }} Notes</p>

                            <!-- Instructor -->
                            <p class="text-secondary mb-3 small">
                                @if($course->allocation)
                                    Instructor: {{ $course->allocation->user->first_name }} {{ $course->allocation->user->last_name }}
                                @else
                                    Added By: {{ $course->user->first_name }} {{ $course->user->last_name }}
                                @endif
                            </p>

                            <!-- Ratings -->
                            <div class="d-flex align-items-center mb-3">
                                @php $rating = $course->ratings; @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="ri-star-fill" style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }}; font-size: 18px;"></i>
                                @endfor
                                <span class="ms-2 text-muted small">{{ number_format($rating, 1) }}/5</span>
                            </div>

                            <!-- Actions -->
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="#" class="btn btn-sm btn-outline-primary px-3">Start Learning</a>
                                <a href="{{ route('course.viewLearning', [$course->slug, $course->programSlug]) }}"
                                class="text-decoration-none text-muted small">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Isotope Filtering Script -->
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
