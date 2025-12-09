<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', 'Expert Link Solutions')); ?></title>
        <link rel="shortcut icon" href="<?php echo e(asset('elsAdmin/images/els-inc.png')); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Technology IT Solutions HTML Template">
        <link rel="stylesheet" href="<?php echo e(asset('elsFront/css/vendor/vendor.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('elsFront/css/plugins/plugins.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('elsFront/css/style.css')); ?>">
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
                                    <img src="<?php echo e(asset('elsAdmin/auth-access/els-logo.png')); ?>" width="100" height="48" aria-label="Expert Link Logo" class="img-fluid" alt="">
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
                                                    <a href="<?php echo e(route('website')); ?>"><span>Home</span></a>
                                                </li>
                                                <li class="has-children has-children--multilevel-submenu">
                                                    <a href="<?php echo e(route('website.programs')); ?>"><span>Our Programs</span></a>
                                                    <ul class="submenu">
                                                        <?php $__currentLoopData = getRecordData('App\Models\Programs', ['courses'], 'program_name', 'asc', 'get'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                            <li class="has-children">
                                                                <a href="<?php echo e(route('website.programs.show',$value->slug)); ?>"><span><?php echo e($value->program_name); ?></span></a>
                                                                <?php if(count($value->courses) > 0): ?>
                                                                    <ul class="submenu">
                                                                        <?php $__currentLoopData = $value->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <li><a href="<?php echo e(route('website.programs.courseShow',[$cos->slug,$value->slug])); ?>"><span><?php echo e($cos->course_name); ?></span></a></li>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </ul>
                                                                <?php endif; ?>
                                                            </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                    </ul>
                                                </li>
                                                 <li class="">
                                                    <a href="<?php echo e(route('website.courses')); ?>"><span>Our Courses</span></a>
                                                </li>
                                                <li class="">
                                                    <a href="<?php echo e(route('website.aboutus')); ?>"><span>About Us</span></a>
                                                </li>
                                            
                                                <li class="has-children has-children--multilevel-submenu">
                                                    <a href="#"><span>Resources</span></a>
                                                    <ul class="submenu">
                                                        <li><a href="<?php echo e(route('website.faq')); ?>"><span>FAQ</span></a></li>
                                                        <li><a href="<?php echo e(route('website.teams')); ?>"><span>Our Team</span></a></li>
                                                        <li><a href="<?php echo e(route('website.blog')); ?>"><span>Blog</span></a></li>
                                                        <li><a href="<?php echo e(route('website.partner')); ?>"><span>Our Partners</span></a></li>
                                                        <li><a href="<?php echo e(route('website.review')); ?>"><span>Client Reviews</span></a></li>
                                                    </ul>
                                                </li>
                                                <li class="">
                                                    <a href="<?php echo e(route('website.services')); ?>"><span>Our Services</span></a>
                                                </li>
                                                <li class="">
                                                    <a href="<?php echo e(route('website.contactus')); ?>"><span>Contact Us</span></a>
                                                </li>
                                                 <li class="has-children has-children--multilevel-submenu">
                                                    <a href="#"><span>Account</span></a>
                                                    <ul class="submenu">
                                                        <?php if(auth()->guard()->guest()): ?>
                                                            <li><a href="/login"><span>Login</span></a></li>
                                                            <li><a href="/register"><span>Register</span></a></li>
                                                        <?php else: ?>
                                                            <li><a href="/login"><span>Logout</span></a></li>
                                                            <li><a href="<?php echo e(route('dashboard')); ?>"><span>My Dashboard</span></a></li>
                                                        <?php endif; ?>
                                                        
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
            <?php echo $__env->yieldContent('content'); ?>
             <div class="cta-image-area_one section-space--ptb_80 cta-bg-image_two">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-lg-7">
                            <div class="cta-content md-text-center">
                                <h3 class="heading">We run all kinds of IT services that vow your <span class="text-color-primary"> success</span></h3>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="cta-button-group--two text-center">
                                <a href="<?php echo e(route('website.contactus')); ?>" class="btn btn--white btn-one"><span class="btn-icon me-2"><i class="far fa-comment-alt"></i></span> Let us talk</a>
                                <a href="<?php echo e(route('website.services')); ?>" class="btn btn--secondary btn-two "><span class="btn-icon me-2"><i class="fas fa-info-circle"></i></span> Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-area-wrapper bg-gray">
                <div class="footer-area section-space--ptb_80">
                    <div class="container">
                        <div class="row footer-widget-wrapper">
                            <div class="col-lg-4 col-md-6 col-sm-6 footer-widget">
                                <div class="footer-widget__logo mb-30">
                                    <img src="<?php echo e(asset('elsAdmin/auth-access/els-logo.png')); ?>" width="160" height="48" class="img-fluid" alt="">
                                </div>
                                <ul class="footer-widget__list">
                                    <li>58 Howard Street #2 San Francisco, CA 941</li>
                                    <li><a href="mailto:contact@expertlinksolutions.com" class="hover-style-link">contact@expertlinksolutions.com</a></li>
                                    <li><a href="tel:123344556" class="hover-style-link text-black font-weight--bold">(+68)1221 09876</a></li>
                                    <li><a href="https://hasthemes.com/" class="hover-style-link text-color-primary">www.expertlinksolutions.com</a></li>
                                </ul>
                            </div>
                            
                            <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                                <h6 class="footer-widget__title mb-20">Our Services</h6>
                                <ul class="footer-widget__list">
                                    <?php $__currentLoopData = collect(ourServices())->shuffle()->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(route('website.seeviceDetails', $service['link'])); ?>" class="hover-style-link">
                                                <?php echo e($service['title']); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                                <h6 class="footer-widget__title mb-20">Quick links</h6>
                                <ul class="footer-widget__list">
                                    <li><a href="<?php echo e(route('website.programs')); ?>" class="hover-style-link">Our Programs</a></li>
                                    <li><a href="<?php echo e(route('website.courses')); ?>" class="hover-style-link">Our Courses</a></li>
                                    <li><a href="#" class="hover-style-link">Privacy Policy</a></li>
                                    <li><a href="/register" class="hover-style-link">Create account</a></li>
                                    <li><a href="/login" class="hover-style-link">Login</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                                <h6 class="footer-widget__title mb-20">Support</h6>
                                <ul class="footer-widget__list">
                                    <li><a href="<?php echo e(route('website.aboutus')); ?>" class="hover-style-link">About Us</a></li>
                                    <li><a href="<?php echo e(route('website.faq')); ?>" class="hover-style-link">Help & FAQ</a></li>
                                    <li><a href="<?php echo e(route('website.contactus')); ?>" class="hover-style-link">Contact Us</a></li>
                                    <li><a href="<?php echo e(route('website.teams')); ?>" class="hover-style-link">Our Team</a></li>
                                    <li><a href="<?php echo e(route('website.services')); ?>" class="hover-style-link">Our Services</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-2 col-md-4 col-sm-6 footer-widget">
                                <div class="footer-widget__title section-space--mb_50"></div>
                                <ul class="footer-widget__list">
                                    <li><a href="#" class="image_btn" aria-label="Google play Button"><img class="img-fluid" src="<?php echo e(asset('elsFront/images/icons/aeroland-button-google-play.webp')); ?>" alt=""></a></li>
                                    <li><a href="#" class="image_btn" aria-label="App Store Button"><img class="img-fluid" src="<?php echo e(asset('elsFront/images/icons/aeroland-button-app-store.webp')); ?>" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright-area section-space--pb_30">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 text-center text-md-start">
                                <span class="copyright-text">&copy; <?php echo e(date("Y")); ?> Expert Link Solutions Limited. All Rights Reserved.</span>
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
                                        <img src="<?php echo e(asset('elsAdmin/auth-access/els-logo.png')); ?>" class="img-fluid" alt="">
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
                            <li class="">
                                <a href="<?php echo e(route('website')); ?>"><span>Home</span></a>
                            </li>
                            <li class="has-children">
                                <a href="<?php echo e(route('website.programs')); ?>"><span>Our Programs</span></a>
                                <ul class="sub-menu">
                                    <?php $__currentLoopData = getRecordData('App\Models\Programs', ['courses'], 'program_name', 'asc', 'get'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <li class="has-children">
                                            <a href="<?php echo e(route('website.programs.show',$value->slug)); ?>"><span><?php echo e($value->program_name); ?></span></a>
                                            <?php if(count($value->courses) > 0): ?>
                                                <ul class="submenu">
                                                    <?php $__currentLoopData = $value->courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><a href="<?php echo e(route('website.programs.courseShow',[$cos->slug,$value->slug])); ?>"><span><?php echo e($cos->course_name); ?></span></a></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </ul>
                            </li>
                                <li class="">
                                <a href="<?php echo e(route('website.courses')); ?>"><span>Our Courses</span></a>
                            </li>
                            <li class="">
                                <a href="<?php echo e(route('website.aboutus')); ?>"><span>About Us</span></a>
                            </li>
                        
                            <li class="has-children">
                                <a href="#"><span>Resources</span></a>
                               <ul class="sub-menu">
                                    <li><a href="<?php echo e(route('website.faq')); ?>"><span>FAQ</span></a></li>
                                    <li><a href="<?php echo e(route('website.teams')); ?>"><span>Our Team</span></a></li>
                                    <li><a href="<?php echo e(route('website.blog')); ?>"><span>Blog</span></a></li>
                                    <li><a href="<?php echo e(route('website.partner')); ?>"><span>Our Partners</span></a></li>
                                    <li><a href="<?php echo e(route('website.review')); ?>"><span>Client Reviews</span></a></li>
                                </ul>
                            </li>
                            <li class="">
                                <a href="<?php echo e(route('website.services')); ?>"><span>Our Services</span></a>
                            </li>
                            <li class="">
                                <a href="<?php echo e(route('website.contactus')); ?>"><span>Contact Us</span></a>
                            </li>
                            
                           
                            <li class="has-children">
                                <a href="#">Account</a>
                                <ul class="sub-menu">
                                    <?php if(auth()->guard()->guest()): ?>
                                        <li><a href="/login"><span>Login</span></a></li>
                                        <li><a href="/register"><span>Register</span></a></li>
                                    <?php else: ?>
                                        <li><a href="/login"><span>Logout</span></a></li>
                                        <li><a href="<?php echo e(route('dashboard')); ?>"><span>My Dashboard</span></a></li>
                                    <?php endif; ?>
                                    
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
        <script src="<?php echo e(asset('elsFront/js/vendor/modernizr-2.8.3.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elsFront/js/vendor/jquery-3.5.1.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elsFront/js/vendor/jquery-migrate-3.3.0.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elsFront/js/vendor/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elsFront/js/plugins/plugins.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elsFront/js/main.js')); ?>"></script>
    </body>
</html><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/layouts/front.blade.php ENDPATH**/ ?>