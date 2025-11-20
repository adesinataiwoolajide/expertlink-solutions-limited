<?php $title = "View all courses"; $segments = Request::segments();  ?>
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
                <li class="breadcrumb-item"><a href="<?php echo e(route('course.create')); ?>" title="Create <?php echo e($segments[1]); ?>">Create a <?php echo e($segments[1]); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">View All <?php echo e($segments[1]); ?></li>
            </ol>
        </nav>
        
    </div>
    <?php echo $__env->make('layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="col-sm-12 col-12 mt-2">
        <?php if(count($courses) > 0): ?>
        
            <div class="card mb-3">
                
                <div class="card-body">
                    <!-- Table start -->
                    <div class="table-responsive">
                        <table id="basicExample" class="table custom-table">

                            <thead>
                               <tr>
                                    <th>#</th>
                                    <th>📘 Course Name</th>
                                    <th>👤 Created By</th>
                                    <th>👤 Instructor Name</th>
                                    <th>🎓 Program Name</th>
                                    <th class="text-center">💰 Course Price (₦)</th>
                                    <th class="text-center">📘 Course Notes</th>
                                    <th>⚙️ Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $num =1; ?>
                                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php 
        $program_name = $course->program->program_name ?? $course->programSlug ?? "NIL";
        $noteCount = $course->notes_count ?? $course->notes()->count(); // prefer withCount in controller
    ?>

    
    <?php if(
        ($course->allocation && $course->allocation->user->slug == Auth::user()->slug) 
        || Auth::user()->hasAnyRole(['Administrator','Admin'])
    ): ?>
        <tr>
            <td><?php echo e($num++); ?></td>
            <td><?php echo e($course->course_name); ?></td>

            
            <td>
                <span class="badge <?php echo e($course->user && $course->user->email ? 'bg-success' : 'bg-info'); ?>">
                    <?php echo e($course->user->email ?? 'NULL'); ?>

                </span>
            </td>

            
            <td>
                <?php if($course->allocation): ?>
                    <span class="badge bg-primary text-white">
                        Allocated To:<br>
                        <?php echo e(optional($course->allocation->user)->first_name); ?> <?php echo e(optional($course->allocation->user)->last_name); ?>

                    </span>
                <?php else: ?>
                    <span class="badge bg-danger text-white">Pending Allocation</span>
                <?php endif; ?>
            </td>

            
            <td>
                <span class="badge bg-dark text-white"><?php echo e($program_name); ?></span>
            </td>

            
            <td class="text-center">
                <span class="badge bg-secondary"><?php echo e(number_format($course->course_price,2)); ?></span>
            </td>

            
            <td class="text-center">
                <?php if($noteCount > 0): ?>
                    <a href="<?php echo e(route('course.note.index', ['courseSlug' => $course->slug])); ?>">
                        <span class="badge bg-primary">View <?php echo e($noteCount); ?> Course Notes</span>
                    </a>
                    <?php if(Auth::user()->hasAnyRole(['Administrator','Instructor'])): ?>
                        <br>
                        <a href="<?php echo e(route('note.create', [$course->slug, optional($course->allocation)->slug])); ?>">
                            <span class="badge bg-success">Create a Note</span>
                        </a>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if($course->allocation && Auth::user()->hasAnyRole(['Administrator','Instructor'])): ?>
                        <a href="<?php echo e(route('note.create', [$course->slug, $course->allocation->slug])); ?>">
                            <span class="badge bg-success">Create a Note</span>
                        </a>
                    <?php else: ?>
                        <span class="badge bg-warning">No Notes Found</span>
                    <?php endif; ?>
                <?php endif; ?>
            </td>

            
            <td>
                <a href="<?php echo e(route('course.show', $course->slug)); ?>" class="btn btn-sm btn-info text-white">View</a>
                <?php if(Auth::user()->hasAnyRole(['Administrator','Admin'])): ?>
                    <a href="<?php echo e(route('course.edit', $course->slug)); ?>" class="btn btn-sm btn-primary text-white">Edit</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="alert alert-warning text-center">
                No course records found.
            </div>

        <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/courses/index.blade.php ENDPATH**/ ?>