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
                <li class="breadcrumb-item active" aria-current="page">View All Assignments</li>
            </ol>
        </nav>
    </div>
    <?php echo $__env->make('layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Due Date</th>
                                <th>Total Grade</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td> <div class="text-dark"><?php echo $assignment->description; ?></div></td>
                                <td><?php echo e($assignment->due_date); ?></td>
                                <td><?php echo e($assignment->max_score); ?></td>
                                <td><?php echo e($assignment->created_at); ?>

                                    <br> By: <?php echo e($assignment->instructor ? $assignment->instructor->first_name . ' ' . $assignment->instructor->last_name : 'NIL'); ?>

                                </td>
                                <td>
                                    <a href="<?php echo e(route('submission.course.create',$assignment->slug)); ?>" class="btn btn-info text-white">View</a> 
                                    <?php if(Auth::user()->hasAnyRole(['Administrator','Admin', 'Instructor'])): ?>
                                        <a href="<?php echo e(route('show.course.assignments',[$assignment->slug,$assignment->noteSlug])); ?>" class="btn btn-primary text-white">Submission</a> 
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/assignments/index.blade.php ENDPATH**/ ?>