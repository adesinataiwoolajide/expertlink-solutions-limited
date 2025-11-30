@extends('layouts.front')
@section('content')
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_box text-center">
                        <h2 class="breadcrumb-title">Our Teams</h2>
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                            <li class="breadcrumb-item active">Our Teams</li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="site-wrapper-reveal">
            <div class="bg-white">
                <div class="team-member-wrapper section-space--pt_100 section-space--pb_70">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title section-space--mb_60 text-center">
                                    <h3 class="heading">We pride ourselves on having a team <br> of <span class="text-color-primary">highly-skilled</span> experts</h3>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row ht-team-member-style-three">

                            <div class="col-lg-3 col-md-6 wow move-up">
                                <div class="grid-item mb-30">
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
                                        <div class="team-info text-center">
                                            <h6 class="name">Adesina Taiwo </h6>
                                            <div class="position">Software Engineer</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 wow move-up">
                                <div class="grid-item mb-30">
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
                                        <div class="team-info text-center">
                                            <h6 class="name">Adesina Taiwo </h6>
                                            <div class="position">Software Engineer</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 wow move-up">
                                <div class="grid-item mb-30">
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
                                        <div class="team-info text-center">
                                            <h6 class="name">Adesina Taiwo </h6>
                                            <div class="position">Software Engineer</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 wow move-up">
                                <div class="grid-item mb-30">
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
                                        <div class="team-info text-center">
                                            <h6 class="name">Adesina Taiwo </h6>
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
@endsection