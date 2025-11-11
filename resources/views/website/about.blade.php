@extends('layouts.front')
@section('content')
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="about-banner-wrap banner-space about-us-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 m-auto">
                            <div class="about-banner-content text-center">
                                <h1 class="mb-15 text-white">About Expert Link  Solutions</h1>
                                <h5 class="font-weight--normal text-white">We offer tailored IT training and consulting services to empower your team with the skills and strategies needed to thrive in today’s digital landscape </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===========  feature-large-images-wrapper  Start =============-->
            <div class="feature-large-images-wrapper section-space--ptb_100">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title-wrap Start -->
                            <div class="section-title-wrap text-center section-space--mb_60">
                                <h6 class="section-sub-title mb-20">Our company</h6>
                                <h3 class="heading">We run all kinds of IT services that <br> vow your <span class="text-color-primary"> success</span></h3>
                            </div>
                            <!-- section-title-wrap Start -->
                        </div>
                    </div>

                    <div class="cybersecurity-about-box section-space--pb_70">
                        <div class="row">
                            <div class="col-lg-4 offset-lg-1">
                                <div class="modern-number-01">
                                    <h2 class="heading  me-5"><span class="mark-text">2</span>Years’ Experience in IT and ICT Services</h2>
                                    <h6 class="heading mt-30">More About Our Success Stories</h6>
                                </div>
                            </div>

                            <div class="col-lg-5 offset-lg-1">
                                <div class="cybersecurity-about-text">
                                    <div class="text">Expert Link Solutions Limitedspecializes in technological and IT-related services such as product engineering, warranty management, building cloud, infrastructure, network, etc. We put a strong focus on the needs of your business to figure out solutions that best fits your demand and nail it.</div>
                                    <div class="button-text">
                                        <a href="#" class="btn-text">
                                            Discover now
                                            <span class="button-icon ml-1">
                                                <i class="fas fa-arrow-right"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              
                </div>
            </div>
            <div class="contact-us-section-wrappaer infotechno-contact-us-bg section-space--ptb_120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-lg-6">
                            <div class="conact-us-wrap-one">
                                <h3 class="heading">Obtaining further information by <span class="text-color-primary">make a contact</span> with our experienced IT teams. </h3>
                                <div class="sub-heading">Reach out for tailored IT training, consulting, system integration, and more,.</div>

                            </div>
                        </div>

                        <div class="col-lg-6 col-lg-6">
                            <div class="contact-info-one text-center">
                                <div class="icon">
                                    <span class="fas fa-phone"></span>
                                </div>
                                <h6 class="heading font-weight--reguler">Reach out now!</h6>
                                <h2 class="call-us"><a href="tel:190068668">1900 68668</a></h2>
                                <div class="contact-us-button mt-20">
                                    <a href="{{ route('website.contactus') }}" class="btn btn--secondary">Contact us</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                    <div class="col-lg-4 col-md-6 image-box-boder">
                                        <div class="ht-box-images style-09">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    <img src="{{ asset('elsFront/images/icons/mitech-box-image-style-06-image-02-120x120.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h6 class="heading">IT Consultancy</h6>
                                                    <div class="text">Strategic guidance to align your IT infrastructure with business goals.</div>
                                                    <div class="more-arrow-link">
                                                        <a href="it-services">Learn more <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 image-box-boder">
                                        <div class="ht-box-images style-09">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    <img src="{{ asset('elsFront/images/icons/n-icon-2.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h6 class="heading">Trainings</h6>
                                                    <div class="text">Empowering teams with hands-on IT skills and certifications.</div>
                                                    <div class="more-arrow-link">
                                                        <a href="managed-it-service">Learn more <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 image-box-boder">
                                        <div class="ht-box-images style-09">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    <img src="{{ asset('elsFront/images/icons/mitech-processing-service-image-03-100x104.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h6 class="heading">Cybersecurity Solutions</h6>
                                                    <div class="text">Protect your digital assets with advanced threat detection and prevention.</div>
                                                    <div class="more-arrow-link">
                                                        <a href="cybersecurity">Learn more <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 image-box-boder">
                                        <div class="ht-box-images style-09">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    <img src="{{ asset('elsFront/images/icons/mitech-processing-service-image-02-100x104.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h6 class="heading">Cloud Services</h6>
                                                    <div class="text">Scalable cloud solutions for storage, computing, and collaboration.</div>
                                                    <div class="more-arrow-link">
                                                        <a href="cloud-services">Learn more <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 image-box-boder">
                                        <div class="ht-box-images style-09">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    <img src="{{ asset('elsFront/images/icons/mitech-box-image-style-01-image-03-100x108.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h6 class="heading">Software Development</h6>
                                                    <div class="text">Custom applications tailored to your business needs and user experience.</div>
                                                    <div class="more-arrow-link">
                                                        <a href="software-development">Learn more <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 image-box-boder">
                                        <div class="ht-box-images style-09">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    <img src="{{ asset('elsFront/images/icons/mitech-box-image-style-06-image-03-120x120.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h6 class="heading">Network Solutions</h6>
                                                    <div class="text">Reliable and secure networking for seamless connectivity and performance.</div>
                                                    <div class="more-arrow-link">
                                                        <a href="network-solutions">Learn more <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 image-box-boder">
                                        <div class="ht-box-images style-09">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    <img src="{{ asset('elsFront/images/icons/mitech-box-image-style-05-image-05-60x60.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h6 class="heading">Data Analytics</h6>
                                                    <div class="text">Transform data into actionable insights for smarter decision-making.</div>
                                                    <div class="more-arrow-link">
                                                        <a href="data-analytics">Learn more <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 image-box-boder">
                                        <div class="ht-box-images style-09">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    <img src="{{ asset('elsFront/images/icons/mitech-box-image-style-05-image-04-60x60.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h6 class="heading">Technical Support</h6>
                                                    <div class="text">Fast and reliable support to keep your systems running smoothly.</div>
                                                    <div class="more-arrow-link">
                                                        <a href="technical-support">Learn more <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 image-box-boder">
                                        <div class="ht-box-images style-09">
                                            <div class="image-box-wrap">
                                                <div class="box-image">
                                                    <img src="{{ asset('elsFront/images/icons/mitech-home-resolutions-box-image-01-100x98.webp')}}" class="img-fluid" alt="">
                                                </div>
                                                <div class="content">
                                                    <h6 class="heading">System Integration</h6>
                                                    <div class="text">Unify your platforms and tools for streamlined operations and efficiency.</div>
                                                    <div class="more-arrow-link">
                                                        <a href="system-integration">Learn more <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                        <a href="#" class="ht-btn ht-btn-sm">Lets talk</a>
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