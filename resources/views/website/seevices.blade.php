@extends('layouts.front')
@section('content')
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
           
            <div class="row-separators-wrap row-separators-style separators-space row-separators-images">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="separators-inner text-center">
                                <h4 class="text-white">Expert Link Solutions Limited</h4>
                                <h5 class="font-weight--normal text-white">We offer tailored IT training and consulting services to empower your team with the skills and strategies needed to thrive in today’s digital landscape </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="vc_row-separator center_curve_alt bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" preserveAspectRatio="none" viewBox="0 0 100 100">
                        <path d="M 0 0 L0 100 L100 100 L100 0 Q 50 200 0 0"></path>
                    </svg>
                </div>
            </div>
            <div class="feature-images-wrapper bg-gradient section-space--ptb_100">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center section-space--mb_60">
                                <h2 class="heading">Tailored IT solutions for your evolving needs in <br> <span class="text-color-primary">Business Technology</span></h2>
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="image-l-r-box">
                        <div class="row">
                            <div class="col image-box-area">
                                <div class="row image-box-boder-box">
                                    @foreach($services as $service)
                                        <div class="col-lg-4 col-md-6 image-box-boder">
                                            <div class="ht-box-images style-09">
                                                <div class="image-box-wrap">
                                                    <div class="box-image">
                                                        <img src="{{ $service['image'] }}" class="img-fluid" alt="{{ $service['title'] }}">
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="heading">{{ $service['title'] }}</h6>
                                                        <div class="text">{{ substr($service['summary'],0,120) }}</div>
                                                        <div class="more-arrow-link">
                                                            <a href="{{ route('website.seeviceDetails',$service['link']) }}">Learn more <i class="fas fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="talk-message-box-wrapper section-space--mt_80 small-mt__60">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="talk-message-box ">
                                    <div class="message-icon">
                                        <i class="far fa-comment-alt"></i>
                                    </div>
                                    <div class="talk-message-box-content ">
                                        <h6 class="heading">Cheers to the work that comes from trusted service providers in time.</h6>
                                        <a href="{{ route('website.contactus') }}" class="ht-btn ht-btn-sm">Contact Us</a>
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