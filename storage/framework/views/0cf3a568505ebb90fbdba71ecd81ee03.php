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
    
    <div class="card-body" style="background-color:#f8f9fa;">
        <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
            <h4 style="font-weight:600;">Lets start learning</h4>
            <a href="<?php echo e(route('myCourses')); ?>" style="text-decoration:none; color:#007bff; font-weight:500;">My learning</a>
        </div>

        <div class="row">
            <?php $__currentLoopData = $program; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 mb-4">
                    <?php if(count($view->courses) > 0): ?>
                        <a href="<?php echo e(route('course.learning',$view->slug)); ?>" style="text-decoration: none;">
                    <?php else: ?>
                        <div style="pointer-events: none; opacity: 0.6; text-decoration: none;">
                    <?php endif; ?>

                        <div class="card shadow-sm" style="border-radius:12px;">
                            <div class="card-body d-flex flex-column" style="padding:1.25rem;">
                                <div class="d-flex align-items-center mb-3">
                                    <div style="width:40px; height:40px; background-color:#007bff; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                                        <i class="ri-play-fill text-white fs-5"></i>
                                    </div>
                                    <h6 class="ms-3 mb-0" style="font-weight:600; color:#333;">
                                        <?php echo e($view->program_name); ?><br>
                                        <small style="color:#666;">(<?php echo e(count($view->courses)); ?> Courses)</small>
                                    </h6>
                                </div>

                                <!-- Ratings -->
                                <div class="mt-auto">
                                    <div class="d-flex align-items-center">
                                        <?php
                                            $rating = 4.5;
                                        ?>
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <i class="ri-star-fill" style="color:<?php echo e($i <= $rating ? '#ffc107' : '#e4e5e9'); ?>; font-size:16px;"></i>
                                        <?php endfor; ?>
                                        <span class="ms-2" style="font-size:0.9rem; color:#555;"><?php echo e(number_format($rating, 1)); ?>/5</span>
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