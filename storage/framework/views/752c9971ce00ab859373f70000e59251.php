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
     <div class="col-sm-12">
        <div class="card mb-3">
            <?php echo $__env->make('layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                
                <h5 class="card-title mb-0 fw-bold text-primary">
                    <?php echo e($assignment->note->topic ?? 'No Topic'); ?>

                </h5>

                <!-- Actions -->
                <div class="btn-group" role="group">
                    <a href="<?php echo e(route('mycourse.note.read', [$assignment->noteSlug, $assignment->courseSlug])); ?>" 
                    class="btn btn-sm btn-outline-primary">
                        <i class="ri-eye-line me-1"></i> Read Note
                    </a>
                    <a href="<?php echo e(route('mycourse.note.index', [$assignment->courseSlug])); ?>" 
                    class="btn btn-sm btn-outline-info">
                        <i class="ri-book-line me-1"></i> All Notes
                    </a>
                    <a href="<?php echo e(route('note.course.assignments', [$assignment->noteSlug])); ?>" 
                    class="btn btn-sm btn-outline-danger">
                        <i class="ri-book-line me-1"></i> All Assignments
                    </a>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs" id="tabs-with-badges" role="tablist">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active px-4 py-2 d-flex align-items-center" id="badge-tab-one"
                        data-bs-toggle="tab" data-bs-target="#badge-content-one" type="button" role="tab"
                        aria-controls="badge-content-one" aria-selected="true">
                        <i class="ri-notification-2-line me-2"></i> Assignment
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-two"
                            data-bs-toggle="tab" data-bs-target="#badge-content-two" type="button" role="tab"
                            aria-controls="badge-content-two" aria-selected="false">
                            <i class="ri-message-3-line me-2"></i> Submission
                            <span class="badge bg-success ms-2 rounded-pill"><?php echo e($allSubmissions->total()); ?></span>
                        </button>
                    </li>
                    
                </ul>
                <div class="tab-content border border-primary rounded p-4" id="tabs-with-badges-content">
                    <div class="tab-pane fade show active" id="badge-content-one" role="tabpanel" aria-labelledby="badge-tab-one">
                        
                        <div class="card shadow-sm mb-3 border-0">
                            <div class="card-body d-flex align-items-start gap-3">
                                <div class="icon-box sm bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:45px; height:45px;" aria-hidden="true">
                                    <i class="ri-notification-2-line text-danger fs-5"></i>
                                </div>

                                <div class="flex-grow-1">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0 fw-bold text-dark">
                                            Due: <span class="<?php echo e($isOverdue ? 'text-danger' : 'text-success'); ?>"><?php echo e($dueLabel); ?></span>
                                        </h6>

                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="badge <?php echo e($isOverdue ? 'bg-danger-subtle text-danger' : 'bg-success-subtle text-success'); ?>">
                                                <?php echo e($isOverdue ? 'Overdue' : 'Upcoming'); ?>

                                            </span>
                                            <span class="badge bg-secondary-subtle text-secondary">
                                                Max Score: <?php echo e($maxScore); ?>

                                            </span>
                                        </div>
                                    </div>

                                    
                                    <?php if(Str::length(strip_tags($rawHtmlDescription)) > 180): ?>
                                        <p class="mb-2 small text-secondary">
                                            <?php echo e($plainDescription); ?>

                                            <a class="text-primary text-decoration-none" data-bs-toggle="collapse"
                                            href="#desc-<?php echo e($assignment->slug); ?>" role="button" aria-expanded="false"
                                            aria-controls="desc-<?php echo e($assignment->slug); ?>">
                                                Show more
                                            </a>
                                        </p>
                                        <div class="collapse" id="desc-<?php echo e($assignment->slug); ?>">
                                            <div class="small text-secondary">
                                                <?php echo $rawHtmlDescription; ?>

                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="small text-secondary">
                                            <?php echo $rawHtmlDescription; ?>

                                        </div>
                                    <?php endif; ?>

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="badge-content-two" role="tabpanel" aria-labelledby="badge-tab-two">
                        <div class="card shadow-sm mb-3 border-0">
                            <div class="card-body">
                                <h5 class="fw-bold mb-3">Submissions (<?php echo e($allSubmissions->total()); ?>)</h5>

                                <?php $__empty_1 = true; $__currentLoopData = $allSubmissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="border-bottom py-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>Student:</strong> <?php echo e($submission->student->email ?? 'Unknown'); ?> <br>
                                                <small class="text-muted">
                                                    Submitted: <?php echo e($submission->created_at->format('D, M j, Y g:i A')); ?>

                                                </small>
                                            </div>
                                            <span class="badge <?php echo e($submission->submission_status === 'approved' ? 'bg-success' : 'bg-warning'); ?>">
                                                <?php echo e(ucfirst($submission->submission_status)); ?>

                                            </span>
                                        </div>

                                        <p class="mt-2 mb-1">
                                            <strong>Answer:</strong> <?php echo Str::limit($submission->answer_text, 150); ?>

                                        </p>

                                        <div class="mt-2 d-flex justify-content-between align-items-center">
                                            <small class="text-secondary">
                                                Instructor: <?php echo e($submission->instructor->email ?? 'N/A'); ?>

                                            </small>

                                            
                                            <a href="<?php echo e(route('submission.course.create', $submission->assignmentSlug)); ?>" 
                                            class="btn btn-sm btn-outline-primary">
                                                View Submission
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <p class="text-danger">No submissions yet.</p>
                                <?php endif; ?>

                                <div class="mt-3">
                                    <?php echo e($allSubmissions->links()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/assignments/show.blade.php ENDPATH**/ ?>