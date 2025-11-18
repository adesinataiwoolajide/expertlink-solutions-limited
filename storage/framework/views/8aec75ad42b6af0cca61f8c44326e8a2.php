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
    <?php if(Auth::user()->hasAnyRole(['Administrator',"Admin", "Instructor"])): ?>
        <div class="row gx-3">
            <?php if(Auth::user()->hasAnyRole(['Administrator',"Admin"])): ?>
                <div class="col-xxl-2 col-sm-4 col-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon-box sm2 border border-2 rounded-5 border-info">
                                    <i class="ri-account-pin-circle-fill fs-5 text-info"></i>
                                </div>
                                <div class="ms-3">
                                    <h3 class="m-0 fw-semibold"><?php echo e(number_format($totalUsers)); ?></h3>
                                    <h6 class="m-0 text-secondary small">Total Users</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endif; ?>

            <div class="col-xxl-2 col-sm-4 col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon-box sm2 border border-2 rounded-5 border-info">
                                <i class="ri-dashboard-2-fill fs-5 text-info"></i>
                            </div>
                            <div class="ms-2">
                                <h3 class="m-0 fw-semibold"><?php echo e(number_format($totalPrograms)); ?></h3>
                                <h6 class="m-0 text-secondary small">Total Programs</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-2 col-sm-4 col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon-box sm2 border border-2 rounded-5 border-info">
                                <i class="ri-eye-fill fs-5 text-info"></i>
                            </div>
                            <div class="ms-2">
                                <h3 class="m-0 fw-semibold"><?php echo e(number_format($totalCourses)); ?></h3>
                                <h6 class="m-0 text-secondary small">Total Courses</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-2 col-sm-4 col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon-box sm2 border border-2 rounded-5 border-info">
                                <i class="ri-handbag-fill fs-5 text-info"></i>
                            </div>
                            <div class="ms-2">
                                <h3 class="m-0 fw-semibold"><?php echo e(number_format($totalAllocations)); ?></h3>
                                <h6 class="m-0 text-secondary small">Total Allocation</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-2 col-sm-4 col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon-box sm2 border border-2 rounded-5 border-info">
                                <i class="ri-group-2-fill fs-5 text-info"></i>
                            </div>
                            <div class="ms-2">
                                <h3 class="m-0 fw-semibold"><?php echo e(number_format($totalAllocationHistories)); ?></h3>
                                <h6 class="m-0 text-secondary small">Total Allocation Histories</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-2 col-sm-4 col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon-box sm2 border border-2 rounded-5 border-info">
                                <i class="ri-honor-of-kings-fill fs-5 text-info"></i>
                            </div>
                            <div class="ms-2">
                                <h3 class="m-0 fw-semibold"><?php echo e(number_format($totalInstructors)); ?></h3>
                                <h6 class="m-0 text-secondary small">Total Instructors</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php if(Auth::user()->hasAnyRole(['Student'])): ?>

    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/dashboard.blade.php ENDPATH**/ ?>