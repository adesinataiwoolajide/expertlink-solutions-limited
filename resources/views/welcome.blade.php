@extends('layouts.front')
@section('content')
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="machine-learning-hero machine-learning-hero-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <div class="machine-learning-hero-text wow move-up">
                                <h1 class="font-weight--reguler text-white mb-15">
                                    <span class="text-color-secondary">Training & Consulting</span> <br> Solutions for Business Growth
                                </h1>

                                <p>
                                    Expert Link Solutions Limited enables organizations to thrive through specialized training and strategic consulting in AI, digital transformation, and business innovation.
                                </p>

                                <div class="hero-button mt-30">
                                    <a href="{{ route('website.services'); }}" class="btn btn--secondary">Our Services</a>
                                    <div class="hero-popup-video video-popup">
                                        <a href="https://www.youtube.com/watch?v=vqZuSUtczbU" class="video-link">
                                            <div class="video-content">
                                                <div class="video-play">
                                                    <span class="video-play-icon">
                                                <i class="fa fa-play"></i>
                                            </span>
                                                </div>
                                                <div class="video-text"> How we work</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>

            {{-- <div class="brand-logo-slider-area section-space--ptb_60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- brand logo slider -->
                            <div class="brand-logo-slider__container-area">
                                <div class="swiper-container brand-logo-slider__container">
                                    <div class="swiper-wrapper brand-logo-slider__one">
                                        <div class="swiper-slide brand-logo brand-logo--slider">
                                            <a href="#">
                                                <div class="brand-logo__image">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-01.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="brand-logo__image-hover">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-01-hover.webp')}}" class="img-fluid" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide brand-logo brand-logo--slider">
                                            <a href="#">
                                                <div class="brand-logo__image">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-02.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="brand-logo__image-hover">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-02-hover.webp')}}" class="img-fluid" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide brand-logo brand-logo--slider">
                                            <a href="#">
                                                <div class="brand-logo__image">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-03.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="brand-logo__image-hover">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-03-hover.webp')}}" class="img-fluid" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide brand-logo brand-logo--slider">
                                            <a href="#">
                                                <div class="brand-logo__image">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-04.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="brand-logo__image-hover">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-04-hover.webp')}}" class="img-fluid" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide brand-logo brand-logo--slider">
                                            <a href="#">
                                                <div class="brand-logo__image">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-05.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="brand-logo__image-hover">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-05-hover.webp')}}" class="img-fluid" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide brand-logo brand-logo--slider">
                                            <a href="#">
                                                <div class="brand-logo__image">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-06.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="brand-logo__image-hover">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-06-hover.webp')}}" class="img-fluid" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide brand-logo brand-logo--slider">
                                            <a href="#">
                                                <div class="brand-logo__image">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-07.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="brand-logo__image-hover">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-07-hover.webp')}}" class="img-fluid" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide brand-logo brand-logo--slider">
                                            <a href="#">
                                                <div class="brand-logo__image">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-08.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="brand-logo__image-hover">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-08-hover.webp')}}" class="img-fluid" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="swiper-slide brand-logo brand-logo--slider">
                                            <a href="#">
                                                <div class="brand-logo__image">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-09.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="brand-logo__image-hover">
                                                    <img src="{{ asset('elsFront/images/brand/mitech-client-logo-09-hover.webp')}}" class="img-fluid" alt="">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="feature-large-images-wrapper section-space--ptb_100">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center section-space--mb_60">
                                <h6 class="section-sub-title mb-20">Our company</h6>
                                <h3 class="heading">Share the joy of achieving <span class="text-color-primary"> glorious   <br> moments</span> & climbed up <span class="text-color-primary">the top.</span></h3>
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="cybersecurity-about-box">
                        <div class="row">
                            <div class="col-lg-5 offset-lg-1">
                                <div class="modern-number-01 number-two">
                                    <h2 class="heading  me-5"><span class="mark-text">5</span>Years’ Experience in IT</h2>
                                    <h5 class="heading mt-30">We’ve been triumphing all these <span class="text-color-primary"> 38 years. </span> Sacrifices are made up with success. </h5>
                                </div>
                            </div>

                            <div class="col-lg-5 ms-auto">
                                <div class="faq-wrapper">
                                    <div id="accordion">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                                        How can ExpertLink Solutions support your business?<span> <i class="fas fa-chevron-down"></i><i class="fas fa-chevron-up"></i> </span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>We offer tailored IT training and consulting services to empower your team with the skills and strategies needed to thrive in today’s digital landscape.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        What networking and installation services do you offer?<span> <i class="fas fa-chevron-down"></i><i class="fas fa-chevron-up"></i> </span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>ExpertLink Solutions provides end-to-end networking solutions, including structured cabling, device configuration, and system installation for homes and businesses.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Do you sell ICT gadgets and provide procurement services?<span> <i class="fas fa-chevron-down"></i><i class="fas fa-chevron-up"></i> </span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <p>Yes, we supply a wide range of ICT gadgets and offer professional procurement services to ensure you get the best value and quality for your tech investments.</p>
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
            <div class="fun-fact-wrapper bg-theme-default section-space--pb_30 section-space--pt_60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 wow move-up">
                            <div class="fun-fact--two text-center">
                                <div class="fun-fact__count counter">120</div>
                                <h6 class="fun-fact__text">Clients Served</h6>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow move-up">
                            <div class="fun-fact--two text-center">
                                <div class="fun-fact__count counter">45</div>
                                <h6 class="fun-fact__text">Industries Consulted</h6>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow move-up">
                            <div class="fun-fact--two text-center">
                                <div class="fun-fact__count counter">85</div>
                                <h6 class="fun-fact__text">Workshops Delivered</h6>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow move-up">
                            <div class="fun-fact--two text-center">
                                <div class="fun-fact__count counter">98</div>
                                <h6 class="fun-fact__text">Client Satisfaction Rate</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="feature-images-wrapper bg-gray section-space--ptb_100">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center">
                                <h6 class="section-sub-title mb-20">Our services</h6>
                                <h3 class="heading">For your very specific industry, <br> we have <span class="text-color-primary"> highly-tailored IT solutions.</span></h3>
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="feature-images__two small-mt__10">
                                <div class="modern-grid-image-box row row--30">
                                    @foreach($services as $service)
                                        <div class="single-item wow move-up col-lg-6 col-md-6 section-space--mt_60">
                                            <a href="{{ route('website.seeviceDetails',$service['link']) }}" class="ht-box-images style-02">
                                                <div class="image-box-wrap">
                                                    <div class="box-image">
                                                        <img class="img-fluid" src="{{ $service['image'] }}" alt="{{ $service['title'] }}">
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="heading">{{ $service['title'] }}</h6>
                                                        <div class="text">{{ substr($service['summary'], 0, 135) }}</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="section-under-heading text-center section-space--mt_60">
                                Ready to elevate your IT strategy? <a href="{{ route('website.services')}}">Learn more about our services</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-us-section-wrappaer machine-learning-contact-us-bg section-space--ptb_120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5 col-md-6">
                            <div class="conact-us-wrap-three">
                                <h6 class="mb-3 section-sub-title">OUR SOLUTION</h6>
                                <h5 class="heading text-white">Expert Link Solutions Limited Empower your team with expert-led IT training and strategic consulting.</h5>
                            </div>
                            <div class="contact-info-two mt-40 text-left">
                                <div class="contact-us-button mt-20">
                                    <a href="{{ route('website.contactus') }}" class="btn btn--secondary">Contact us</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="gradation-process-area section-space--ptb_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="gradation-title-wrapper section-space--mb_60">
                                <div class="gradation-title-wrap">
                                    <h6 class="section-sub-title text-black mb-20">Our Approach</h6>
                                    <h4 class="heading">Empowering <span class="text-color-primary">your business <br> through IT excellence</span></h4>
                                </div>
                                <div class="gradation-sub-heading">
                                    <h3 class="heading"><mark>4</mark> Key Steps</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ht-gradation style-01">
                                <!-- Step 1 -->
                                <div class="item item-1 animate wow fadeInRight" data-wow-delay="0.1s">
                                    <div class="line"></div>
                                    <div class="circle-wrap">
                                        <div class="mask">
                                            <div class="wave-pulse wave-pulse-1"></div>
                                            <div class="wave-pulse wave-pulse-2"></div>
                                            <div class="wave-pulse wave-pulse-3"></div>
                                        </div>
                                        <h6 class="circle">1</h6>
                                    </div>
                                    <div class="content-wrap">
                                        <h6 class="heading">01. Discovery & Assessment</h6>
                                        <div class="text">We begin by understanding your business goals, technical challenges, and training needs to tailor the right solution.</div>
                                        <a class="gradation-btn" href="#">
                                            <span class="button-text" data-text="Learn more">Learn more</span>
                                            <span class="button-icon fas fa-arrow-right"></span>
                                        </a>
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div class="item item-1 animate wow fadeInRight" data-wow-delay="0.15s">
                                    <div class="line"></div>
                                    <div class="circle-wrap">
                                        <div class="mask">
                                            <div class="wave-pulse wave-pulse-1"></div>
                                            <div class="wave-pulse wave-pulse-2"></div>
                                            <div class="wave-pulse wave-pulse-3"></div>
                                        </div>
                                        <h6 class="circle">2</h6>
                                    </div>
                                    <div class="content-wrap">
                                        <h6 class="heading">02. Strategy & Solution Design</h6>
                                        <div class="text">Our consultants craft a customized roadmap—whether for IT training, digital transformation, or technical upskilling.</div>
                                        <a class="gradation-btn" href="#">
                                            <span class="button-text" data-text="Learn more">Learn more</span>
                                            <span class="button-icon fas fa-arrow-right"></span>
                                        </a>
                                    </div>
                                </div>

                                <!-- Step 3 -->
                                <div class="item item-1 animate wow fadeInRight" data-wow-delay="0.20s">
                                    <div class="line"></div>
                                    <div class="circle-wrap">
                                        <div class="mask">
                                            <div class="wave-pulse wave-pulse-1"></div>
                                            <div class="wave-pulse wave-pulse-2"></div>
                                            <div class="wave-pulse wave-pulse-3"></div>
                                        </div>
                                        <h6 class="circle">3</h6>
                                    </div>
                                    <div class="content-wrap">
                                        <h6 class="heading">03. Training & Enablement</h6>
                                        <div class="text">We deliver hands-on training sessions, workshops, and mentoring to equip your team with the skills they need.</div>
                                        <a class="gradation-btn" href="#">
                                            <span class="button-text" data-text="Learn more">Learn more</span>
                                            <span class="button-icon fas fa-arrow-right"></span>
                                        </a>
                                    </div>
                                </div>

                                <!-- Step 4 -->
                                <div class="item item-1 animate wow fadeInRight" data-wow-delay="0.25s">
                                    <div class="line"></div>
                                    <div class="circle-wrap">
                                        <div class="mask">
                                            <div class="wave-pulse wave-pulse-1"></div>
                                            <div class="wave-pulse wave-pulse-2"></div>
                                            <div class="wave-pulse wave-pulse-3"></div>
                                        </div>
                                        <h6 class="circle">4</h6>
                                    </div>
                                    <div class="content-wrap">
                                        <h6 class="heading">04. Implementation & Support</h6>
                                        <div class="text">We help integrate solutions into your workflow and provide ongoing support to ensure long-term success.</div>
                                        <a class="gradation-btn" href="#">
                                            <span class="button-text" data-text="Learn more">Learn more</span>
                                            <span class="button-icon fas fa-arrow-right"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="team-member-wrapper section-space--pt_100 section-space--pb_40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="section-title section-space--mb_60">
                                <h3 class="heading">Our <span class="text-color-primary">experience </span> experts</h3>
                                <p class="text mt-30">Expert Link Solutions Limited specializes in technological and IT-related services such as product engineering, warranty management, building cloud, infrastructure, network, etc. </p>

                                <div class="sider-title-button-box mt-30">
                                    <a href="{{ route('website.contactus') }}" class="ht-btn ht-btn-md">Contact Us</a>
                                    <a href="{{ route('website.teams') }}" class="btn-text font-weight--bold small-mt__20">View all team <i class="ml-1 button-icon fas fa-arrow-right"></i></a>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-8 ht-team-member-style-one">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 wow move-up">
                                    <div class="grid-item">
                                        <div class="ht-team-member">
                                            <div class="team-image">
                                                <img class="img-fluid" src="{{ asset('elsAdmin/images/my-passport.jpeg')}}" alt="">
                                                <div class="social-networks">
                                                    <div class="inner">
                                                        <a target="_blank" href="#" class=" hint--bounce  hint--top hint--theme-two" aria-label="Facebook"><i class="fab fa-facebook"></i>
                                                        </a>
                                                        <a target="_blank" href="#" class=" hint--bounce hint--top hint--theme-two" aria-label="Twitter"><i class="fab fa-twitter"></i>
                                                        </a>
                                                        <a target="_blank" href="#" class=" hint--bounce hint--top hint--theme-two" aria-label="Instagram"><i class="fab fa-instagram"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="team-info ">
                                                <h5 class="name">Taiwo Adesina </h5>
                                                <div class="position">Software Engineer</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 wow move-up">
                                    <div class="grid-item">
                                        <div class="ht-team-member">
                                            <div class="team-image">
                                                <img class="img-fluid" src="{{ asset('elsAdmin/images/my-passport.jpeg')}}" alt="">
                                                <div class="social-networks">
                                                    <div class="inner">
                                                        <a target="_blank" href="#" class=" hint--bounce  hint--top hint--theme-two" aria-label="Facebook"><i class="fab fa-facebook"></i>
                                                        </a>
                                                        <a target="_blank" href="#" class=" hint--bounce hint--top hint--theme-two" aria-label="Twitter"><i class="fab fa-twitter"></i>
                                                        </a>
                                                        <a target="_blank" href="#" class=" hint--bounce hint--top hint--theme-two" aria-label="Instagram"><i class="fab fa-instagram"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="team-info ">
                                                <h5 class="name">Taiwo Adesina </h5>
                                                <div class="position">Software Engineer</div>
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
    </div>

@endsection