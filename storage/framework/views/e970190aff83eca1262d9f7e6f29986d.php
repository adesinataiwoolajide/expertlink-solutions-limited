<?php $title = "View My Notes"; $segments = Request::segments();  ?>
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
    
    <?php echo $__env->make('layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <style>
        .note-card:hover {
            transform: translateY(-4px);
            transition: all 0.3s ease;
            box-shadow: 0 0.75rem 1.25rem rgba(0,0,0,0.1);
        }

        .note-card {
            transition: all 0.3s ease;
        }
        .note-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 1rem 1.5rem rgba(0,0,0,0.1);
        }
    </style>
    <div class="card">
        <div class="card-body bg-light">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-primary fw-bold mb-0">
                    <?php echo e($course->course_name); ?> Notes
                </h4>
                <div class="mb-2">
                    <span class="text-muted">Overall Assignments Progress: <?php echo e($assignmentProgress); ?>%</span>
                    <div class="progress rounded-pill bg-light" style="height: 8px;">
                        <div class="progress-bar bg-info" role="progressbar"
                            style="width: <?php echo e($assignmentProgress); ?>%; min-width: 5px;"
                            aria-valuenow="<?php echo e($assignmentProgress); ?>" aria-valuemin="0" aria-valuemax="100"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="<?php echo e($course->student_assignments_count ?? 0); ?> assignments completed">
                        </div>
                    </div>
                </div>

                <div>
                    <span class="text-muted">Overall Tasks Progress: <?php echo e($taskProgress); ?>%</span>
                    <div class="progress rounded-pill bg-light" style="height: 8px;">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width: <?php echo e($taskProgress); ?>%; min-width: 5px;"
                            aria-valuenow="<?php echo e($taskProgress); ?>" aria-valuemin="0" aria-valuemax="100"
                            data-bs-toggle="tooltip" data-bs-placement="top"
                            title="<?php echo e($course->student_tasks_count ?? 0); ?> tasks completed">
                        </div>
                    </div>
                </div>

               
                <?php if(Auth::user()->hasAnyRole(['Student'])): ?> 
                    <a href="<?php echo e(route('myCourses')); ?>" class="btn btn-outline-primary rounded-pill px-4">
                        <i class="bi bi-pencil-square me-2"></i> My Learning
                    </a>
                <?php endif; ?>
            </div>
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="video-container" style="width:100%; clear:both; padding:10px;  margin-bottom:20px;">
                        <?php if(!empty($course->course_introduction)): ?>
                            <label style="font-weight:bold;">Introduction Video:</label>
                            <?php if(Storage::disk('public')->exists($filePath)): ?>
                                <video style="width:100%; height:500px; border:1px solid #ddd; border-radius:6px;" controls controlsList="nodownload">
                                    <source src="<?php echo e(asset('storage/' . $filePath)); ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            <?php else: ?>
                                <p style="color:red; font-weight:bold;">Introduction video not available.</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden note-card">
                            <div class="card-body d-flex flex-column p-4">
                                <a href="<?php echo e(route('mycourse.note.read', [$note->slug, $note->courseSlug])); ?>" class="text-decoration-none">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle bg-danger d-flex align-items-center justify-content-center flex-shrink-0" style="width:52px; height:52px;">
                                            <i class="ri-play-fill text-white fs-4"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="fw-semibold text-dark mb-1"><?php echo e($note->topic); ?></h6>
                                            <small class="text-muted">
                                                <?php echo e($note->materials->count() ?? 0); ?> Reference Materials
                                            </small>
                                        </div>
                                    </div>
                                </a>
                                <p class="mb-3 text-muted small">
                                    <div class="d-flex align-items-center mb-2">
                                        <strong>Author:</strong>
                                        <?php if($note->allocation): ?>
                                            <?php echo e($note->allocation->user->first_name . ' ' . $note->allocation->user->last_name. '  ' ?? 'ELS-ADMIN  '); ?>

                                        <?php else: ?>
                                            <?php echo e('ELS Tutor '); ?>

                                        <?php endif; ?>
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <i class="ri-star-fill" style="color:<?php echo e($i <= 5 ? '#ffc107' : '#e4e5e9'); ?>; font-size:16px;"></i>
                                        <?php endfor; ?>
                                        <span class="ms-2 text-muted small">
                                            <?php echo e(number_format(5, 1)); ?> (<?php echo e(5); ?> reviews)
                                        </span>
                                    </div>
                                </p>

                                <div class="mt-auto d-flex flex-wrap gap-2">
                                    <!-- Assignments badge -->
                                    <a href="<?php echo e(route('course.assignments', $note->slug)); ?>"
                                    class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="View your <?php echo e($note->student_assignments_count); ?> submitted assignments">
                                        📝 <?php echo e($note->student_assignments_count); ?> Assignments
                                    </a>

                                    <!-- Tasks badge -->
                                    <a href="<?php echo e(route('course.tasks', $note->slug)); ?>"
                                    class="badge bg-success text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="View your <?php echo e($note->student_tasks_count); ?> completed tasks">
                                        ✅ <?php echo e($note->student_tasks_count); ?> Tasks
                                    </a>

                                    <!-- Progress badge -->
                                    <a href="<?php echo e(route('course.progress', $note->slug)); ?>"
                                    class="badge bg-primary text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none"
                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Your overall progress on this note is <?php echo e($note->progressForStudent()); ?>%">
                                        📊 <?php echo e($note->progressForStudent()); ?>% Progress
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/notes/courseIndex.blade.php ENDPATH**/ ?>