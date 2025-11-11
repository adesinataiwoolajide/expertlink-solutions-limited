@extends('layouts.front')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Frequently asked questions</h2>
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="./">Home</a></li>
                            <li class="breadcrumb-item active">faq</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            
            <div class="accordion-wrapper section-space--ptb_100">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <div class="section-title-wrap text-center section-space--mb_20">
                                <h6 class="section-sub-title mb-20"></h6>
                                <h3 class="heading">Frequently asked questions</h3>
                            </div>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="faq-wrapper section-space--mt_40">
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

                        <div class="col-lg-6">
                            <div class="toggles-wrapper section-space--mt_40">
                                <div class="faq-wrapper">
                                    <div id="faq-toggles">
                                        <div class="card">
                                            <div class="card-header" id="faq_1">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#faq_one" aria-expanded="false" aria-controls="faq_one">
                                                        What software development services do you provide?<span> <i class="fas fa-chevron-down"></i><i class="fas fa-chevron-up"></i> </span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="faq_one" class="collapse" aria-labelledby="faq_1">
                                                <div class="card-body">
                                                    <p>We develop custom software solutions tailored to your business needs, including web applications, enterprise systems, and mobile platforms.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="faq_2">
                                                <h5 class="mb-0">
                                                    <button class="btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#faq_two" aria-expanded="false" aria-controls="faq_two">
                                                        What is system integration and why is it important?<span> <i class="fas fa-chevron-down"></i><i class="fas fa-chevron-up"></i> </span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="faq_two" class="collapse" aria-labelledby="faq_2">
                                                <div class="card-body">
                                                    <p>System integration ensures that all your IT components work seamlessly together. We help unify hardware, software, and networks to improve efficiency and reduce operational costs.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="faq_3">
                                                <h5 class="mb-0">
                                                    <button class="collapsed" data-bs-toggle="collapse" data-bs-target="#faq_three" aria-expanded="false" aria-controls="faq_three">
                                                        Can you assist with system installation and upgrades?<span> <i class="fas fa-chevron-down"></i><i class="fas fa-chevron-up"></i> </span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="faq_three" class="collapse" aria-labelledby="faq_3" data-bs-parent="#faq-toggles">
                                                <div class="card-body">
                                                    <p>Absolutely. ExpertLink Solutions handles full system installations, upgrades, and maintenance to keep your infrastructure secure and up-to-date.</p>
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
        </div>
    </div>
@endsection