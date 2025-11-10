@extends('layouts.front')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Our programs</h2>
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
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
                            <h3 class="heading">Proud projects that<span class="text-color-primary"> make us stand out</span></h3>
                        </div>
                        <div class="messonry-button text-center  section-space--mb_60">
                            
                            <div class="projects-case-wrap">
                                <div class="row mesonry-list">

                                    <!--<div class="resizer"></div>-->
                                    @foreach(getRecordData('App\Models\Programs', ['courses'], 'program_name', 'asc', 'get') as $keys => $val)
                                        <div class="col-lg-4 col-md-6 cat--2">
                                            <a href="{{ route('website.programs.show',[$val->slug]) }}" class="projects-wrap style-01">
                                                <div class="projects-image-box">
                                                    <div class="projects-image">
                                                        <img class="img-fluid" src="{{ asset('elsFront/images/projects/case-study-01-480x298.webp')}}" alt="">
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="heading">Expert Link Solutions</h6>
                                                        <div class="post-categories">{{$val->program_name}}</div>
                                                        <div class="text">
                                                            At Mitech, we have a holistic and integrated approach towards core modernization to experience technological evolution.
                                                        </div>
                                                        <div class="box-projects-arrow">
                                                            <span class="button-text">View program</span>
                                                            <i class="fas fa-arrow-right ml-1"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection