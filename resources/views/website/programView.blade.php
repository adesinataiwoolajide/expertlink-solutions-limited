@extends('layouts.front')

@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">{{ $program->program_name ?? '' }}</h2>
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
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

                        <div class="col-lg-4 order-lg-2 order-2">
                            <div class="page-sidebar-content-wrapper page-sidebar-right small-mt__40 tablet-mt__40">

                                
                                <div class="sidebar-widget widget-blog-recent-post wow move-up">
                                    <h4 class="sidebar-widget-title">New Courses</h4>
                                    <ul>
                                        @foreach($courses as $key => $vale)
                                            <li>
                                                <a href="{{ route('website.programs.courseShow',[$vale->slug,$program->slug])}}">{{ $vale->course_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                               
                            </div>
                        </div>
                        <div class="col-lg-8 order-lg-1 order-1">
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