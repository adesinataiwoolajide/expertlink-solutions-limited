<?php $title = "View Courses"; $segments = Request::segments();  ?>
<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="<?php echo e(route('dashboard')); ?>" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('course.index')); ?>" title="View all Courses">View all Courses</a></li>
            </ol>
        </nav>
    </div>
    <?php echo $__env->make('layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <style>
        .text-gradient {
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        }

        .icon-circle {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        }

        .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.15);
        }

        .disabled-card {
        pointer-events: none;
        opacity: 0.6;
        }
    </style>
    
    <div class="card-body mt-4 bg-light rounded-4 shadow-sm">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-gradient mb-0">🚀 Let’s Start Learning</h3>
            <a href="<?php echo e(route('myCourses')); ?>" class="btn btn-outline-primary rounded-pill px-4 shadow-sm">
                <i class="ri-book-open-line me-1"></i> My Learning
            </a>
        </div>

        <!-- Programs Grid -->
        <div class="row">
            <?php $__currentLoopData = $program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-lg-3 col-sm-12 mb-4">

                    <?php if(count($view->courses) > 0): ?>
                        <a href="<?php echo e(route('course.learning',$view->slug)); ?>" class="text-decoration-none">
                    <?php else: ?>
                        <div class="disabled-card">
                    <?php endif; ?>

                        <div class="card h-100 border-0 shadow-lg rounded-4 hover-card">
                            <div class="card-body d-flex flex-column p-4">
                                <!-- Program Icon + Title -->
                                <div class="d-flex align-items-center mb-3">
                                    <div class="icon-circle bg-primary text-white">
                                        <i class="ri-book-open-line fs-5"></i>

                                    </div>
                                    <h6 class="ms-3 mb-0 fw-bold text-dark">
                                        <?php echo e($view->program_name); ?><br>
                                        <small class="text-muted">(<?php echo e(count($view->courses)); ?> Courses)</small>
                                    </h6>
                                </div>

                                <!-- Ratings -->
                                <div class="mt-auto">
                                    <div class="d-flex align-items-center">
                                        <?php $rating = 4.5; ?>
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <i class="ri-star-fill" 
                                            style="color:<?php echo e($i <= $rating ? '#ffc107' : '#e4e5e9'); ?>; font-size:18px;"></i>
                                        <?php endfor; ?>
                                        <span class="ms-2 text-muted small"><?php echo e(number_format($rating, 1)); ?>/5</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php if(count($view->courses) > 0): ?>
                        </a>
                    <?php else: ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/courses/display.blade.php ENDPATH**/ ?>