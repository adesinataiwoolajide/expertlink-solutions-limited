@extends('layouts.front')
@section('content')
    <style>
        .service-details ul {
            list-style-type: disc;
            margin-left: 20px;
            padding-left: 20px;
        }

        .service-details li {
            margin-bottom: 8px;
            color: #333;
            position: relative;
        }

        .service-details li::marker {
            color: #ff5722; /* orange bullets */
            font-size: 1.2em;
        }
        /* Service details paragraphs */
        /* Service details paragraphs */
        .service-details p {
            text-align: justify;       /* neat alignment on both sides */
            line-height: 1.6;          /* better readability */
            margin-bottom: 15px;       /* spacing between paragraphs */
            color: #333;               /* neutral text color */
        }

        /* List group styling */
        .list-group {
            margin-left: 0;
            padding-left: 0;
        }

        /* Each list item */
        .list-group-item {
            text-align: justify;       
            line-height: 1.6;
            margin-bottom: 10px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1); 
            position: relative;
            padding-left: 35px;        
            transition: background-color 0.3s ease, transform 0.2s ease;
            border-left: 5px solid #086AD8; /* primary color accent border */
        }

        /* Custom icon before each item */
        .list-group-item::before {
            content: "✔";              
            position: absolute;
            left: 10px;
            color: #086AD8;            /* primary color for icon */
            font-weight: bold;
        }

        /* Hover effect */
        .list-group-item:hover {
            background-color: rgba(8,106,216,0.1); /* subtle primary color tint */
            transform: translateX(5px);
            cursor: pointer;
            text-shadow: 0 0 8px #086AD8; /* glowing effect in primary color */
        }
    </style>
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">

            
           
            <div class="row-separators-wrap row-separators-style separators-space row-separators-images">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="separators-inner text-center">
                                <h4 class="text-white">Expert Link Solutions Limited</h4>
                                <h5 class="font-weight--normal text-white">{{ $service['summary'] }}</h5>
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

                        <!-- Sidebar -->
                        <div class="col-lg-4 order-lg-1 order-2">
                            <div class="page-sidebar-content-wrapper page-sidebar-left small-mt__40 tablet-mt__40">

                                <!-- Search Widget -->
                                <div class="sidebar-widget search-post wow move-up">
                                    <div class="widget-title">
                                        <h4 class="sidebar-widget-title">Search</h4>
                                    </div>
                                    <form action="#" method="post">
                                        <div class="widget-search">
                                            <input type="text" placeholder="Enter search keyword…">
                                            <button type="submit" class="search-submit">
                                                <span class="search-btn-icon fa fa-search"></span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Recent Services -->
                                <div class="sidebar-widget widget-blog-recent-post wow move-up">
                                    <h4 class="sidebar-widget-title">Other Services</h4>
                                    <ul>
                                        @foreach($services as $item)
                                            @if($item['link'] !== $service['link'])
                                                <li>
                                                    <a href="{{ route('website.seeviceDetails',$item['link']) }}">{{ $item['title'] }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                              
                                <div class="sidebar-widget widget-tag wow move-up">
                                    <h4 class="sidebar-widget-title">Tags</h4>
                                    <a href="#" class="ht-btn ht-btn-xs">IT Services</a>
                                    <a href="#" class="ht-btn ht-btn-xs">Consulting</a>
                                    <a href="#" class="ht-btn ht-btn-xs">Cloud</a>
                                    <a href="#" class="ht-btn ht-btn-xs">Security</a>
                                </div>

                            </div>
                        </div>

                        <!-- Main Content -->
                        <div class="col-lg-8 order-lg-2 order-1">
                            <div class="main-blog-wrap">
                                <div class="single-blog-item">
                                    <div class="post-feature blog-thumbnail wow move-up mb-4">
                                        <img class="img-fluid rounded shadow" src="{{ $service['bg-image'] }}" alt="{{ $service['title'] }}">
                                    </div>
                                    <div class="post-info lg-blog-post-info wow move-up">
                                        <h3 class="post-title fw-bold">{{ $service['title'] }}</h3>
                                        <div class="description mt-4" style="text-align: justify">
                                            {!! $service['description'] !!}
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <a href="{{ url('services') }}" class="btn btn-outline-primary btn-lg rounded-pill shadow-sm">
                                            <i class="fas fa-arrow-left me-2"></i> Back to Our Services
                                        </a>
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