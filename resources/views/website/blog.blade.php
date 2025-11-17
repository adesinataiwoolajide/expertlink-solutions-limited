@extends('layouts.front')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Our Blog</h2>
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                            <li class="breadcrumb-item active">Our blog post</li>
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
                        <div class="col-lg-12">
                            <!-- Post Feature Start -->
                            <div class="post-feature blog-thumbnail  wow move-up">
                                <img class="img-fluid" src="assets/images/blog/blog-05-1170x570.webp" alt="Blog Images">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection