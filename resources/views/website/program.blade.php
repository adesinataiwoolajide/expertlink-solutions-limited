@extends('layouts.front')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Our programs</h2>
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                            <li class="breadcrumb-item active">Our programs</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-wrapper-reveal">
        <!--===========  Projects wrapper Start =============-->
        <div class="projects-wrapper section-space--ptb_100 projects-masonary-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-wrap text-center section-space--mb_40">
                            <h3 class="heading">Innovative programs that<span class="text-color-primary"> showcase our uniqueness</span></h3>
                        </div>
                        <div class="messonry-button text-center  section-space--mb_60">
                            <div class="projects-case-wrap">
                                <div class="row mesonry-list">
                                    @foreach($programs as $keys => $val)
                                        <div class="col-lg-4 col-md-6 cat--2">
                                            <a href="{{ route('website.programs.show',[$val->slug]) }}" class="projects-wrap style-01">
                                                <div class="projects-image-box">
                                                    <div class="projects-image">
                                                        <img class="img-fluid" src="{{ asset('program-banner/' . $val->banner) }}" alt="" style="width: 200px;" alt="">
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="heading">Expert Link Solutions</h6>
                                                        <div class="post-categories">{{$val->program_name}}</div>
                                                        
                                                        <div class="box-projects-arrow">
                                                            <span class="button-text">View program</span>
                                                            <i class="fas fa-arrow-right ml-1"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                    <div class="ht-pagination mt-30 pagination justify-content-center">
                                        <div class="pagination-wrapper">
                                            {{$programs->links()}}
                                        </div>
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