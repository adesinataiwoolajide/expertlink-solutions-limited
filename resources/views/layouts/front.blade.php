<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('elsAdmin/images/els-inc.png')}}" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Technology IT Solutions HTML Template">
        <link rel="stylesheet" href="{{ asset('elsFront/css/vendor/vendor.min.css')}}">
        <link rel="stylesheet" href="{{ asset('elsFront/css/plugins/plugins.min.css')}}">
        <link rel="stylesheet" href="{{ asset('elsFront/css/style.css')}}">
    </head>
    <body>
        <div class="header-area header-sticky only-mobile-sticky">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header position-relative">
                            <!-- brand logo -->
                            <div class="header__logo top-logo">
                                <a href="./">
                                    <img src="{{ asset('elsFront/images/logo/logo-dark.webp')}}" width="160" height="48" aria-label="Mitech Logo" class="img-fluid" alt="">
                                </a>
                            </div>

                            <div class="header-right flexible-image-slider-wrap">

                                <div class="header-right-inner" id="hidden-icon-wrapper">

                                    
                                    <!-- Header Search Form -->
                                    <div class="header-search-form d-md-none d-block">
                                        <form action="#" class="search-form-top">
                                            <input class="search-field" type="text" placeholder="Search…">
                                            <button class="search-submit" id="search-button" aria-label="Search">
                                                <i class="search-btn-icon fa fa-search"></i>
                                            </button>
                                        </form>
                                    </div>

                                    <!-- Header Top Info -->
                                    <div class="swiper-container header-top-info-slider-werap top-info-slider__container">
                                        <div class="swiper-wrapper header-top-info-inner default-color">
                                            <div class="swiper-slide">
                                                <div class="info-item">
                                                    <div class="info-icon">
                                                        <span class="fa fa-phone"></span>
                                                    </div>
                                                    <div class="info-content">
                                                        <h6 class="info-title">0122 8899900</h6>
                                                        <div class="info-sub-title">Info@example.com</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="info-item">
                                                    <div class="info-icon">
                                                        <span class="fa fa-map-marker-alt"></span>
                                                    </div>
                                                    <div class="info-content">
                                                        <h6 class="info-title">219 Amara Fort Apt. 394</h6>
                                                        <div class="info-sub-title">New York, NY 941</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="info-item">
                                                    <div class="info-icon">
                                                        <span class="fa fa-clock"></span>
                                                    </div>
                                                    <div class="info-content">
                                                        <h6 class="info-title">8:00AM - 6:00PM</h6>
                                                        <div class="info-sub-title">Monday to Saturday</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="info-item">
                                                    <div class="info-icon">
                                                        <span class="fas fa-comment-alt"></span>
                                                    </div>
                                                    <div class="info-content">
                                                        <h6 class="info-title">Online 24/7</h6>
                                                        <div class="info-sub-title">+122 123 4567</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="header-social-networks style-icons">
                                        <div class="inner">
                                            <a class=" social-link hint--black hint--bottom-left" aria-label="Twitter" href="https://twitter.com/" data-hover="Twitter" target="_blank">
                                                <i class="social-icon fab fa-twitter"></i>
                                            </a>
                                            <a class=" social-link hint--black hint--bottom-left" aria-label="Facebook" href="https://facebook.com/" data-hover="Facebook" target="_blank">
                                                <i class="social-icon fab fa-facebook-f"></i>
                                            </a>
                                            <a class=" social-link hint--black hint--bottom-left" aria-label="Instagram" href="https://instagram.com/" data-hover="Instagram" target="_blank">
                                                <i class="social-icon fab fa-instagram"></i>
                                            </a>
                                            <a class=" social-link hint--black hint--bottom-left" aria-label="Linkedin" href="https://linkedin.com/" data-hover="Linkedin" target="_blank">
                                                <i class="social-icon fab fa-linkedin"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                                <!-- mobile menu -->
                                <div class="mobile-navigation-icon d-block d-xl-none" id="mobile-menu-trigger">
                                    <i></i>
                                </div>
                                <!-- hidden icons menu -->
                                <div class="hidden-icons-menu d-block d-md-none" id="hidden-icon-trigger">
                                    <a href="#">
                                        <i class="far fa-ellipsis-h-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="header-bottom-wrap bg-theme-default d-md-block d-none header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-bottom-inner position-relative">
                                <div class="header-bottom-left-wrap">
                                    <!-- navigation menu -->
                                    <div class="header__navigation d-none d-xl-block">
                                        <nav class="navigation-menu navigation-menu--text_white">

                                            <ul>
                                                <li class="">
                                                    <a href="{{ route('website') }}"><span>Home</span></a>
                                                </li>
                                                <li class="has-children has-children--multilevel-submenu">
                                                    <a href="{{ route('website.programs') }}"><span>Training Courses</span></a>
                                                    <ul class="submenu">
                                                        @foreach(getRecordData('App\Models\Programs', ['courses'], 'program_name', 'asc', 'get') as $key => $value)
                                                            
                                                            <li class="has-children">
                                                                <a href="{{ route('website.programs.show',$value->slug)}}"><span>{{$value->program_name}}</span></a>
                                                                @if(count($value->courses) > 0)
                                                                    <ul class="submenu">
                                                                        @foreach($value->courses as $cos)
                                                                            <li><a href="{{ route('website.programs.courseShow',[$cos->slug,$value->slug])}}"><span>{{ $cos->course_name }}</span></a></li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                        
                                                    </ul>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('website.aboutus') }}"><span>About Us</span></a>
                                                </li>
                                            
                                                <li class="has-children has-children--multilevel-submenu">
                                                    <a href="#"><span>Resources</span></a>
                                                    <ul class="submenu">
                                                        <li><a href="{{ route('website.faq') }}"><span>FAQ</span></a></li>
                                                        <li><a href="{{ route('website.teams') }}"><span>Our Team</span></a></li>
                                                        <li><a href="{{ route('website.blog') }}"><span>Blog</span></a></li>
                                                        <li><a href="{{ route('website.partner') }}"><span>Our Partners</span></a></li>
                                                        <li><a href="{{ route('website.review') }}"><span>Client Reviews</span></a></li>
                                                    </ul>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('website.services') }}"><span>Our Services</span></a>
                                                </li>
                                                <li class="">
                                                    <a href="{{ route('website.contactus') }}"><span>Contact Us</span></a>
                                                </li>
                                                 <li class="has-children has-children--multilevel-submenu">
                                                    <a href="#"><span>Account</span></a>
                                                    <ul class="submenu">
                                                        @guest
                                                            <li><a href="/login"><span>Login</span></a></li>
                                                            <li><a href="/register"><span>Register</span></a></li>
                                                        @else
                                                            <li><a href="/login"><span>Logout</span></a></li>
                                                            <li><a href="{{ route('dashboard') }}"><span>My Dashboard</span></a></li>
                                                        @endguest
                                                        
                                                    </ul>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="main-wrapper">
            @yield('content')

            <div class="footer-area-wrapper bg-gray">
                <div class="footer-area section-space--ptb_80">
                    <div class="container">
                        <div class="row footer-widget-wrapper">
                            <div class="col-lg-4 col-md-6 col-sm-6 footer-widget">
                                <div class="footer-widget__logo mb-30">
                                    <img src="{{ asset('elsFront/images/logo/dark-logo-160x48.webp')}}" width="160" height="48" class="img-fluid" alt="">
                                </div>
                                <ul class="footer-widget__list">
                                    <li>58 Howard Street #2 San Francisco, CA 941</li>
                                    <li><a href="mailto:contact@aeroland.com" class="hover-style-link">contact@aeroland.com</a></li>
                                    <li><a href="tel:123344556" class="hover-style-link text-black font-weight--bold">(+68)1221 09876</a></li>
                                    <li><a href="https://hasthemes.com/" class="hover-style-link text-color-primary">www.mitech.xperts.com</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                                <h6 class="footer-widget__title mb-20">IT Services</h6>
                                <ul class="footer-widget__list">
                                    <li><a href="#" class="hover-style-link">Managed IT</a></li>
                                    <li><a href="#" class="hover-style-link">IT Support</a></li>
                                    <li><a href="#" class="hover-style-link">IT Consultancy</a></li>
                                    <li><a href="#" class="hover-style-link">Cloud Computing</a></li>
                                    <li><a href="#" class="hover-style-link">Cyber Security</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                                <h6 class="footer-widget__title mb-20">Quick links</h6>
                                <ul class="footer-widget__list">
                                    <li><a href="#" class="hover-style-link">Pick up locations</a></li>
                                    <li><a href="#" class="hover-style-link">Terms of Payment</a></li>
                                    <li><a href="#" class="hover-style-link">Privacy Policy</a></li>
                                    <li><a href="#" class="hover-style-link">Where to Find Us</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                                <h6 class="footer-widget__title mb-20">Support</h6>
                                <ul class="footer-widget__list">
                                    <li><a href="#" class="hover-style-link">Forum Support</a></li>
                                    <li><a href="#" class="hover-style-link">Help & FAQ</a></li>
                                    <li><a href="#" class="hover-style-link">Contact Us</a></li>
                                    <li><a href="#" class="hover-style-link">Pricing and plans</a></li>
                                    <li><a href="#" class="hover-style-link">Cookies Policy</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                                <div class="footer-widget__title section-space--mb_50"></div>
                                <ul class="footer-widget__list">
                                    <li><a href="#" class="image_btn" aria-label="Google play Button"><img class="img-fluid" src="{{ asset('elsFront/images/icons/aeroland-button-google-play.webp')}}" alt=""></a></li>
                                    <li><a href="#" class="image_btn" aria-label="App Store Button"><img class="img-fluid" src="{{ asset('elsFront/images/icons/aeroland-button-app-store.webp')}}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright-area section-space--pb_30">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 text-center text-md-start">
                                <span class="copyright-text">&copy; {{date("Y")}} Expert Link Solutions Limited. All Rights Reserved.</span>
                            </div>
                            <div class="col-md-6 text-center text-md-end">
                                <ul class="list ht-social-networks solid-rounded-icon">

                                    <li class="item">
                                        <a href="https://twitter.com/" target="_blank" aria-label="Twitter" class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-twitter link-icon"></i>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <a href="https://facebook.com/" target="_blank" aria-label="Facebook" class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-facebook-f link-icon"></i>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <a href="https://instagram.com/" target="_blank" aria-label="Instagram" class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-instagram link-icon"></i>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <a href="https://linkedin.com/" target="_blank" aria-label="Linkedin" class="social-link hint--bounce hint--top hint--primary">
                                            <i class="fab fa-linkedin link-icon"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="scroll-top" id="scroll-top">
            <i class="arrow-top fas fa-chevron-up"></i>
            <i class="arrow-bottom fas fa-chevron-up"></i>
        </a>
        <div class="mobile-menu-overlay" id="mobile-menu-overlay">
            <div class="mobile-menu-overlay__inner">
                <div class="mobile-menu-overlay__header">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-8">
                                <!-- logo -->
                                <div class="logo">
                                    <a href="./">
                                        <img src="{{ asset('elsFront/images/logo/logo-dark.webp')}}" class="img-fluid" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-4">
                                <!-- mobile menu content -->
                                <div class="mobile-menu-content text-end">
                                    <span class="mobile-navigation-close-icon" id="mobile-menu-close-trigger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-overlay__body">
                    <nav class="offcanvas-navigation">
                        <ul>
                            <li class="has-children">
                                <a href="./">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index-infotechno.html"><span>Infotechno</span></a></li>
                                    <li><a href="index-processing.html"><span>Processing</span></a></li>
                                    <li><a href="index-appointment.html"><span>Appointment</span></a></li>
                                    <li><a href="index-services.html"><span>Services</span></a></li>
                                    <li><a href="index-resolutions.html"><span>Resolutions</span></a></li>
                                    <li><a href="index-cybersecurity.html"><span>cybersecurity</span></a></li>
                                    <li><a href="index-modern-it-company.html"><span>Modern IT Company</span></a></li>
                                    <li><a href="index-machine-learning.html"><span>Machine Learning</span></a></li>
                                    <li><a href="index-software-innovation.html"><span>Software Innovation</span></a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">Company</a>
                                <ul class="sub-menu">
                                    <li class="has-children">
                                        <a href="about-us-01.html"><span>About us</span></a>
                                        <ul class="sub-menu">
                                            <li><a href="about-us-01.html"><span>About us 01</span></a></li>
                                            <li><a href="about-us-02.html"><span>About us 02</span></a></li>
                                            <li class="has-children">
                                                <a href="#"><span>Submenu Level Two</span></a>
                                                <ul class="sub-menu">
                                                    <li><a href="#"><span>Submenu Level Three</span></a></li>
                                                    <li><a href="#"><span>Submenu Level Three</span></a></li>
                                                    <li><a href="#"><span>Submenu Level Three</span></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="contact-us.html"><span>Contact us</span></a></li>
                                    <li><a href="leadership.html"><span>Leadership</span></a></li>
                                    <li><a href="why-choose-us.html"><span>Why choose us</span></a></li>
                                    <li><a href="our-history.html"><span>Our history</span></a></li>
                                    <li><a href="faqs.html"><span>FAQs</span></a></li>
                                    <li><a href="careers.html"><span>Careers</span></a></li>
                                    <li><a href="pricing-plans.html"><span>Pricing plans</span></a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">IT solutions</a>
                                <ul class="sub-menu">
                                    <li><a href="it-services.html"><span>IT Services</span></a></li>
                                    <li><a href="managed-it-service.html"><span>Managed IT Services</span></a></li>
                                    <li><a href="industries.html"><span>Industries</span></a></li>
                                    <li><a href="business-solution.html"><span>Business solution</span></a></li>
                                    <li><a href="it-services-details.html"><span>IT Services Details</span></a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">Elements</a>
                                <ul class="sub-menu">
                                    <li class="has-children">
                                        <a href="#">Element Group 01</a>
                                        <ul class="sub-menu">
                                            <li><a href="element-accordion.html"><span>Accordions & Toggles</span></a></li>
                                            <li><a href="element-box-icon.html"><span>Box Icon</span></a></li>
                                            <li><a href="element-box-image.html"><span>Box Image</span></a></li>
                                            <li><a href="element-box-large-image.html"><span>Box Large Image</span></a></li>
                                            <li><a href="element-buttons.html"><span>Buttons</span></a></li>
                                            <li><a href="element-cta.html"><span>Call to action</span></a></li>
                                            <li><a href="element-client-logo.html"><span>Client Logo</span></a></li>
                                            <li><a href="element-countdown.html"><span>Countdown</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#">Element Group 02</a>
                                        <ul class="sub-menu">
                                            <li><a href="element-counters.html"><span>Counters</span></a></li>
                                            <li><a href="element-dividers.html"><span>Dividers</span></a></li>
                                            <li><a href="element-flexible-image-slider.html"><span>Flexible image slider</span></a></li>
                                            <li><a href="element-google-map.html"><span>Google Map</span></a></li>
                                            <li><a href="element-gradation.html"><span>Gradation</span></a></li>
                                            <li><a href="element-instagram.html"><span>Instagram</span></a></li>
                                            <li><a href="element-lists.html"><span>Lists</span></a></li>
                                            <li><a href="element-message-box.html"><span>Message box</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#">Element Group 03</a>
                                        <ul class="sub-menu">
                                            <li><a href="element-popup-video.html"><span>Popup Video</span></a></li>
                                            <li><a href="element-pricing-box.html"><span>Pricing Box</span></a></li>
                                            <li><a href="element-progress-bar.html"><span>Progress Bar</span></a></li>
                                            <li><a href="element-progress-circle.html"><span>Progress Circle</span></a></li>
                                            <li><a href="element-rows-columns.html"><span>Rows & Columns</span></a></li>
                                            <li><a href="element-social-networks.html"><span>Social Networks</span></a></li>
                                            <li><a href="element-tabs.html"><span>Tabs</span></a></li>
                                            <li><a href="element-team-member.html"><span>Team member</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children">
                                        <a href="#">Element Group 04</a>
                                        <ul class="sub-menu">
                                            <li><a href="element-testimonials.html"><span>Testimonials</span></a></li>
                                            <li><a href="element-timeline.html"><span>Timeline</span></a></li>
                                            <li><a href="element-carousel-sliders.html"><span>Carousel Sliders</span></a></li>
                                            <li><a href="element-typed-text.html"><span>Typed Text</span></a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">Case Studies</a>
                                <ul class="sub-menu">
                                    <li><a href="case-studies.html"><span>Case Studies 01</span></a></li>
                                    <li><a href="case-studies-02.html"><span>Case Studies 02</span></a></li>
                                    <li><a href="single-smart-vision.html"><span>Single Layout</span></a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">Blogs</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-list-large-image.html"><span>List Large Image</span></a></li>
                                    <li><a href="blog-list-left-large-image.html"><span>Left Large Image</span></a></li>
                                    <li><a href="blog-grid-classic.html"><span>Grid Classic</span></a></li>
                                    <li><a href="blog-grid-masonry.html"><span>Grid Masonry</span></a></li>
                                    <li class="has-children">
                                        <a href="blog-post-layout-one.html"><span>Single Layouts</span></a>
                                        <ul class="sub-menu">
                                            <li><a href="blog-post-layout-one.html"><span>Left Sidebar</span></a></li>
                                            <li><a href="blog-post-right-sidebar.html"><span>Right Sidebar</span></a></li>
                                            <li><a href="blog-post-no-sidebar.html"><span>No Sidebar</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search-overlay" id="search-overlay">

            <div class="search-overlay__header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-md-6 ms-auto col-4">
                            <!-- search content -->
                            <div class="search-content text-end">
                                <span class="mobile-navigation-close-icon" id="search-close-trigger"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-overlay__inner">
                <div class="search-overlay__body">
                    <div class="search-overlay__form">
                        <form action="#">
                            <input type="text" placeholder="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('elsFront/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <script src="{{ asset('elsFront/js/vendor/jquery-3.5.1.min.js')}}"></script>
        <script src="{{ asset('elsFront/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
        <script src="{{ asset('elsFront/js/vendor/bootstrap.min.js')}}"></script>
        <script src="{{ asset('elsFront/js/plugins/plugins.min.js')}}"></script>
        <script src="{{ asset('elsFront/js/main.js')}}"></script>
    </body>
</html>