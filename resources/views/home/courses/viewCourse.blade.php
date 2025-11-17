@php $title = $course->course_name; $segments = Request::segments();  @endphp
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
     <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{ $course->course_name }} Details</h5>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('course.index') }}" class="btn btn-primary">
                        View All Courses
                    </a>
                    @php
                        $cartCount = count(session()->get('cart', []));
                    @endphp
                    @if($cartCount > 0)
                        <a href="{{ route('cart.view') }}" class="btn btn-outline-secondary position-relative">
                            <i class="ri-shopping-cart-2-line fs-5"></i>
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    @endif
                </div>
            </div>
           
            <div class="card-body">
                <div class="row gx-3">
                    <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
                        <ul class="nav nav-pills flex-column vertical-form-wizard" id="verticalFormStepper" role="tablist">
                            <li class="nav-item mb-3" role="presentation">
                                <button type="button" class="nav-link active w-100 text-start" id="vStep1-tab"
                                    data-bs-toggle="pill" data-bs-target="#vStep1" role="tab" aria-controls="vStep1"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">📘</span>
                                        <div class="ms-2">
                                            <span class="step-title fw-semibold d-block">Course Info</span>
                                            <small>{{$course->course_name}}</small>
                                        </div>
                                    </div>
                                </button>
                            </li>
                            <li class="nav-item mb-3" role="presentation">
                                <button type="button" class="nav-link w-100 text-start" id="vStep2-tab"
                                    data-bs-toggle="pill" data-bs-target="#vStep2" role="tab" aria-controls="vStep2"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">🧑‍🎓</span>
                                        <div class="ms-2">
                                            <span class="step-title fw-semibold d-block">Available Course</span>
                                            <small>List of all Available Courses</small>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="tab-content border rounded-2" id="verticalFormStepperContent">
                            <div class="tab-pane fade show active" id="vStep1" role="tabpanel" aria-labelledby="vStep1-tab">
                                
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="text-primary">Course Details</h4>
                                    @if (Auth::user()->hasAnyRole(['Administrator', 'Admin']))
                                        <a href="{{ route('course.edit', $course->slug) }}" class="btn btn-primary">
                                            <i class="bi bi-pencil-square me-1"></i> Edit Details
                                        </a>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Course Name:</label>
                                        <p class="form-control-plaintext">{{ $course->course_name }}</p>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Program Name:</label>
                                        <p class="form-control-plaintext">{{ $program_name }}</p>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Course Original Price (₦):</label>
                                        <span class="badge rounded-pill bg-success text-white" style="font-weight:700; font-size:1rem;">
                                            ₦{{ number_format($course->course_price,2) }}
                                        </span>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Course Discounted Price (₦):</label>
                                        <span class="badge rounded-pill bg-danger text-white" style="font-weight:700; font-size:1rem;">
                                            ₦{{ number_format(getDiscountedPrice($course->course_price, $course->course_discount),2) }}
                                        </span>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        
                                        <div class="d-flex align-items-center mt-2 mb-2">
                                            <label class="form-label fw-bold">Course Ratings: </label>
                                            @php $rating = $course->ratings; @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="ri-star-fill" style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }}; font-size:16px;"></i>
                                            @endfor
                                            <span class="ms-2" style="font-size:0.9rem; color:#555;">
                                                {{ number_format($rating, 1) }} ({{ $course->reviews }} reviews)
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Course Duration: {{ $course->duration }}</label>
                                    </div>


                                    <div class="mb-4 col-md-6">
                                        <label class="form-label fw-bold text-dark">Training Type:</label>
                                        <p class="form-control-plaintext">
                                            @foreach(json_decode($course->training_type) as $type)
                                                <span class="badge bg-info text-white me-1">{{ ucfirst(trim($type)) }}</span>
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label class="form-label fw-bold text-dark">Course Technologies:</label>
                                        <p class="form-control-plaintext">
                                            @foreach(json_decode($course->course_technologies) as $types)
                                                <span class="badge bg-dark text-white me-1">{{ ucfirst(trim($types)) }}</span>
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        
                                        <ul class="nav nav-tabs" id="courseTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                                                    Basic Requirements
                                                </button>
                                            </li>
                                            @if($course->course_introduction)
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button" role="tab" aria-controls="video" aria-selected="false">
                                                        Introduction Video
                                                    </button>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="tab-content mt-3" id="courseTabContent">
                                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                                <div class="border p-2 rounded bg-light">{!! $course->basic_requirements !!}</div>
                                            </div>

                                            <div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="video-tab">
                                                <div class="mb-3 col-md-12">
                                                    
                                                    <video width="100%" height="500" controls controlsList="nodownload">
                                                        <source src="{{ asset('storage/course_videos/' . $course->course_introduction) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Course Outline:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->course_outline !!}</div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Learning Module:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->learning_module !!}</div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Course Schedule:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->course_schedule !!}</div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Course Overview:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->course_overview !!}</div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Benefits:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->benefits !!}</div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="tab-pane fade" id="vStep2" role="tabpanel" aria-labelledby="vStep2-tab">
                                <style>
                                    .double-strike {
                                        position: relative;
                                        display: inline-block;
                                        color: inherit;
                                    }
                                    .double-strike::before,
                                    .double-strike::after {
                                        content: "";
                                        position: absolute;
                                        left: 0;
                                        right: 0;
                                        height: 1px;
                                        background-color: currentColor;
                                    }
                                    .double-strike::before {
                                        top: 40%;
                                    }
                                    .double-strike::after {
                                        top: 60%;
                                    }
                                </style>

                                @if($courses->count())
                                    <div class="container py-5">
                                        <h4 class="mb-4 fw-bold text-primary text-center">Recommended Courses</h4>
                                        <div class="row g-4">
                                            @foreach ($courses as $course)
                                                @php
                                                    $originalPrice = $course->course_price;
                                                    $rating = $course->ratings ?? 4.5;
                                                @endphp
                                                <div class="col-md-4">
                                                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                                        <img src="{{ asset('course-banner/' . $course->banner) }}"
                                                            alt="{{ $course->course_name }}"
                                                            class="img-fluid"
                                                            style="height: 180px; object-fit: cover;">
                                                        <div class="card-body">
                                                            <h5 class="fw-semibold text-dark mb-2">
                                                                <a href="{{ route('course.viewLearning', [$course->slug, $program->slug]) }}"
                                                                class="text-decoration-none text-dark">
                                                                    {{ Str::limit($course->course_name, 60) }}
                                                                </a>
                                                            </h5>
                                                            <p class="mb-1 text-muted">
                                                                <strong>Instructor:</strong>
                                                                {{ $course->allocation ? $course->allocation->user->first_name . ' ' . $course->allocation->user->last_name : 'ELS Tutor' }}
                                                            </p>

                                                            <div class="d-flex align-items-center mb-2">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <i class="ri-star-fill"
                                                                    style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }}; font-size:16px;"></i>
                                                                @endfor
                                                                <span class="ms-2 text-muted small">
                                                                    {{ number_format($rating, 1) }} ({{ $course->reviews }} reviews)
                                                                </span>
                                                            </div>

                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div>
                                                                    <span class="badge bg-success text-white fw-bold px-3 py-2">
                                                                        ₦{{ number_format(getDiscountedPrice($course->course_price, $course->course_discount),2) }}
                                                                    </span>
                                                                    <span class="badge bg-danger text-white double-strike fw-bold px-3 py-2 ms-2">
                                                                        ₦{{ number_format($originalPrice) }}
                                                                    </span>
                                                                </div>
                                                                <a href="{{ route('cart.add', [$course->slug]) }}"
                                                                class="btn btn-sm btn-outline-primary fw-semibold">
                                                                    <i class="ri-shopping-cart-2-line me-1"></i> Add to Cart
                                                                </a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="ht-pagination mt-5 pagination justify-content-center">
                                            <div class="pagination-wrapper">
                                                {{ $courses->links() }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="container py-5">
                                        <div class="card border-danger text-center shadow-sm">
                                            <div class="card-body">
                                                <i class="ri-error-warning-fill fs-3 text-danger mb-2"></i>
                                                <h5 class="card-title text-danger">No Courses Found</h5>
                                                <p class="card-text text-muted">There are currently no courses available for this program.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>
