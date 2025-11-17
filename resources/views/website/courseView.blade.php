@extends('layouts.front')
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
            <div class="blog-pages-wrapper section-space--ptb_100">
                <div class="container my-5">
                    <div class="card shadow-lg border-0">
                        <!-- Banner -->
                        <div class="card-header p-0">
                            <img class="img-fluid w-50 rounded-top" src="{{ asset('program-banner/'. $course->program->banner )}}"  alt="Course Banner">
                        </div>

                        <div class="card-body text-center">
                            <h2 class="fw-bold mb-3">{{ $course->course_name }}</h2>
                        </div>

                        <div class="card-body">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <h6 class="fw-bold">Course Name</h6>
                                    <p class="text-muted">{{ $course->course_name }}</p>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="fw-bold">Original Price</h6>
                                    <span class="badge bg-success fs-6">
                                        ₦{{ number_format($course->course_price,2) }}
                                    </span>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="fw-bold">Discounted Price</h6>
                                    <span class="badge bg-danger fs-6">
                                        ₦{{ number_format(getDiscountedPrice($course->course_price, $course->course_discount),2) }}
                                    </span>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="fw-bold">Ratings</h6>
                                    @php $rating = $course->ratings; @endphp
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="ri-star-fill" style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }};"></i>
                                    @endfor
                                    <small class="text-muted ms-2">
                                        {{ number_format($rating, 1) }} ({{ $course->reviews }} reviews)
                                    </small>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="fw-bold">Duration</h6>
                                    <p class="text-muted">{{ $course->duration }}</p>
                                </div>

                                <div class="col-md-6">
                                    <h6 class="fw-bold">Training Type</h6>
                                    @foreach(json_decode($course->training_type) as $type)
                                        <span class="badge bg-info me-1">{{ ucfirst(trim($type)) }}</span>
                                    @endforeach
                                </div>

                                <div class="col-md-6">
                                    <h6 class="fw-bold">Technologies</h6>
                                    @foreach(json_decode($course->course_technologies) as $tech)
                                        <span class="badge bg-dark me-1">{{ ucfirst(trim($tech)) }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
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
                        </div>

                        <div class="card-body">
                            <h6 class="fw-bold">Course Outline</h6>
                            <div class="p-3 bg-light rounded mb-3">{!! $course->course_outline !!}</div>

                            <h6 class="fw-bold">Learning Module</h6>
                            <div class="p-3 bg-light rounded mb-3">{!! $course->learning_module !!}</div>

                            <h6 class="fw-bold">Course Schedule</h6>
                            <div class="p-3 bg-light rounded mb-3">{!! $course->course_schedule !!}</div>

                            <h6 class="fw-bold">Course Overview</h6>
                            <div class="p-3 bg-light rounded mb-3">{!! $course->course_overview !!}</div>

                            <h6 class="fw-bold">Benefits</h6>
                            <div class="p-3 bg-light rounded">{!! $course->benefits !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection