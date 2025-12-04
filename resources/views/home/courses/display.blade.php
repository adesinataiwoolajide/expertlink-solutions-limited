@php $title = "View Courses"; $segments = Request::segments();  @endphp
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
    <style>
        .text-gradient {
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        }

        .icon-circle {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        }

        .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.15);
        }

        .disabled-card {
        pointer-events: none;
        opacity: 0.6;
        }
    </style>
    
    <div class="card-body mt-4 bg-light rounded-4 shadow-sm">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-gradient mb-0">🚀 Let’s Start Learning</h3>
            <a href="{{ route('myCourses') }}" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                <i class="ri-book-open-line me-1"></i> My Learning
            </a>
        </div>

        <!-- Programs Grid -->
        <div class="row">
            @foreach ($program as $k => $view)
                <div class="col-md-4 col-lg-3 col-sm-12 mb-4">

                    @if(count($view->courses) > 0)
                        <a href="{{ route('course.learning',$view->slug) }}" class="text-decoration-none">
                    @else
                        <div class="disabled-card">
                    @endif

                        <div class="card h-100 border-0 shadow-lg rounded-4 hover-card">
                            <div class="card-body d-flex flex-column p-4">
                                <!-- Program Icon + Title -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle bg-primary text-white">
                                        <i class="ri-book-open-line fs-5"></i>

                                    </div>
                                    <h6 class="ms-3 mb-0 fw-bold text-dark">
                                        {{ $view->program_name }}<br>
                                        <small class="text-muted">({{ count($view->courses) }} Courses)</small>
                                    </h6>
                                </div>

                                <!-- Ratings -->
                                <div class="mt-auto">
                                    <div class="d-flex align-items-center">
                                        @php $rating = 4.5; @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="ri-star-fill" 
                                            style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }}; font-size:18px;"></i>
                                        @endfor
                                        <span class="ms-2 text-muted small">{{ number_format($rating, 1) }}/5</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @if(count($view->courses) > 0)
                        </a>
                    @else
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
