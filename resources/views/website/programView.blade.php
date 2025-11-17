@extends('layouts.front')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">{{ $program->program_name ?? '' }}</h2>
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                            <li class="breadcrumb-item active">Our programs</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

     <div id="main-wrapper">
        <div class="site-wrapper-reveal">

            <div class="blog-pages-wrapper section-space--ptb_100">
                <div class="container">
                    <div class="row">
                        @if(count($courses) > 0)
                            <div class="col-lg-4 order-lg-2 order-2">
                               
                                <div class="page-sidebar-content-wrapper page-sidebar-right mt-5">
                                    <div class="sidebar-widget widget-blog-recent-post wow fadeInUp">
                                        <h4 class="sidebar-widget-title text-uppercase fw-bold text-primary mb-4">
                                            <i class="ri-graduation-cap-line me-2"></i> New Courses
                                        </h4>
                                        <ul class="list-group list-group-flush">
                                            @forelse($courses as $course)
                                                <li class="list-group-item px-0 py-2 border-0">
                                                    <a href="{{ route('website.programs.courseShow', [$course->slug, $program->slug]) }}"
                                                    class="d-flex align-items-center text-decoration-none text-dark hover-shadow-sm">
                                                        <i class="ri-arrow-right-s-line text-primary me-2"></i>
                                                        <span class="fw-medium">{{ $course->course_name }}</span>
                                                    </a>
                                                </li>
                                            @empty
                                                <li class="list-group-item px-0 py-2 border-0 text-muted">
                                                    <i class="ri-information-line me-2"></i> No courses available at the moment.
                                                </li>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 order-lg-1 order-1">
                        @else
                            <div class="col-lg-12 order-lg-1 order-1">
                                
                        @endif
                            <div class="main-blog-wrap">
                                <div class="single-blog-item">
                                    <div class="post-feature blog-thumbnail  wow move-up">
                                        <img class="img-fluid" src="{{ asset('program-banner/'. $program->banner )}}" alt="">
                                    </div>
                                    <div class="post-info lg-blog-post-info  wow move-up">
                                        <h5 class="post-title">{{ $program->program_name ?? '' }}</h5>
                                    </div>
                                    <div class="post-excerpt mt-15" style="text-align: justify;">
                                        <p style="text-align: justify;"> {!! $program->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection