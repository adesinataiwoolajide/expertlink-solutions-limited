@extends('layouts.front')
<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">{{ $course->course_name }}</h2>
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $course->course_name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="container my-5">
                <!-- Hero Banner -->
                <div class="position-relative mb-4">
                    <img src="{{ asset('program-banner/'. $course->program->banner )}}" 
                        class="img-fluid w-100 rounded" 
                        style="max-height: 350px; object-fit: cover;" 
                        alt="Course Banner">
                   
                </div>

                <!-- Stats Section -->
                <div class="row text-center mb-4">
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6 class="fw-bold">Original Price</h6>
                                <span class="badge bg-success fs-6">₦{{ number_format($course->course_price,2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6 class="fw-bold">Discounted Price</h6>
                                <span class="badge bg-danger fs-6">₦{{ number_format(getDiscountedPrice($course->course_price, $course->course_discount),2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h6 class="fw-bold">Ratings</h6>
                                @php $rating = $course->ratings; @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="ri-star-fill" style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }};"></i>
                                @endfor
                                <p class="text-muted mb-0">{{ number_format($rating, 1) }} ({{ $course->reviews }} reviews)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Details -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold"><i class="ri-time-line me-2"></i> Duration</h6>
                        <p class="text-muted">{{ $course->duration }}</p>

                        <h6 class="fw-bold"><i class="ri-graduation-cap-line me-2"></i> Training Type</h6>
                        @foreach(json_decode($course->training_type) as $type)
                            <span class="badge bg-info me-1">{{ ucfirst(trim($type)) }}</span>
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold"><i class="ri-code-s-slash-line me-2"></i> Technologies</h6>
                        @foreach(json_decode($course->course_technologies) as $tech)
                            <span class="badge bg-dark me-1">{{ ucfirst(trim($tech)) }}</span>
                        @endforeach
                    </div>
                </div>

                <!-- Tabs -->
                <ul class="nav nav-tabs" id="courseTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button">Basic Requirements</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="video-tab" data-bs-toggle="tab" data-bs-target="#video" type="button">Introduction Video</button>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="overview">
                        <div class="p-3 bg-light rounded">{!! $course->basic_requirements !!}</div>
                    </div>
                    <div class="tab-pane fade" id="video">
                        <video class="w-100 rounded" height="400" controls controlsList="nodownload">
                            <source src="{{ asset('storage/course_videos/' . $course->course_introduction) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>

                <div class="accordion accordion-flush mt-4" id="courseDetails">
                    @foreach ([
                        'Course Outline' => $course->course_outline,
                        'Learning Module' => $course->learning_module,
                        'Course Schedule' => $course->course_schedule,
                        'Course Overview' => $course->course_overview,
                        'Benefits' => $course->benefits
                    ] as $title => $content)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ Str::slug($title) }}">
                                {{ $title }}
                            </button>
                        </h2>
                        <div id="{{ Str::slug($title) }}" class="accordion-collapse collapse" data-bs-parent="#courseDetails">
                            <div class="accordion-body">{!! $content !!}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="text-center mt-4">
                    <a class="btn btn-primary btn-lg px-5" href="/register">
                        <i class="ri-login-circle-line me-2"></i> Enroll Now
                    </a>
                </div>
            </div>
                
        </div>
    </div>
@endsection