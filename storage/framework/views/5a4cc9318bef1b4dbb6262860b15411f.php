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
                        <i class="ri-eye-line me-1"></i> View Note
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
                            <span class="badge bg-success ms-2 rounded-pill"><?php echo e($submitted->count()); ?></span>
                        </button>
                    </li>
                    
                </ul>
                <div class="tab-content border border-primary rounded p-4" id="tabs-with-badges-content">
                    <div class="tab-pane fade show active" id="badge-content-one" role="tabpanel" aria-labelledby="badge-tab-one">
                        <div class="card shadow-sm mb-3 border-0">
                            
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
                            <?php if(Auth::user()->hasAnyRole(['Administrator','Student'])): ?>
                                <?php if(count($submitted) == 0): ?>
                                    <?php if($isOverdue == false): ?>
                                        <form action="<?php echo e(route('submission.course.store',$assignment->slug)); ?>" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="courseSlug" value="<?php echo e($assignment->courseSlug); ?>">
                                            <input type="hidden" name="noteSlug" value="<?php echo e($assignment->noteSlug); ?>">
                                            <input type="hidden" name="instructorSlug" value="<?php echo e($assignment->instructorSlug); ?>">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label fw-bold text-dark">Assignment Answer:</label>
                                                    <textarea class="form-control summernote" name="answer_text" required><?php echo old('answer_text') ?? 'Enter your answer here...'; ?></textarea>
                                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('answer_text'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('answer_text')),'class' => 'mt-2 text-danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit Assignment</button>
                                        </form>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php $subs = $submitted->first(); ?>
                                    <?php if(optional($subs)->status != 'Graded'): ?>
                                        
                                        <form action="<?php echo e(route('submission.course.update',$subs->slug)); ?>" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="courseSlug" value="<?php echo e($subs->courseSlug); ?>">
                                            <input type="hidden" name="noteSlug" value="<?php echo e($subs->noteSlug); ?>">
                                            <input type="hidden" name="instructorSlug" value="<?php echo e($subs->instructorSlug); ?>">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label fw-bold text-dark">Assignment Answer:</label>
                                                    <textarea class="form-control summernote" name="answer_text" required><?php echo old('answer_text') ?? optional($subs)->answer_text; ?></textarea>
                                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('answer_text'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('answer_text')),'class' => 'mt-2 text-danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Assignment</button>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="badge-content-two" role="tabpanel" aria-labelledby="badge-tab-two">
                        <h5 class="fw-bold mb-4 text-primary">Assignment Submission</h5>
                        <?php $index = 1; ?>
                        <?php $__empty_1 = true; $__currentLoopData = $submitted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="card shadow-sm mb-4 border-0">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold text-dark">
                                        <?php echo e($index); ?>. Submitted on <?php echo e(\Carbon\Carbon::parse($submission->created_at)->format('D, M j, Y g:i A')); ?> by <?php echo e($submission->student->email); ?>

                                    </span>
                                    <span class="badge 
                                        <?php if($submission->submission_status === 'submitted'): ?> bg-warning text-white 
                                        <?php elseif($submission->submission_status === 'graded'): ?> bg-success 
                                        <?php else: ?> bg-danger <?php endif; ?>">
                                        <?php echo e(ucfirst($submission->submission_status)); ?>

                                    </span>
                                </div>

                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <strong>Assignment Score:</strong>
                                            <span class="badge 
                                                <?php if(is_null($submission->student_score)): ?>
                                                    bg-secondary-subtle text-white
                                                <?php elseif($submission->student_score >= 7): ?>
                                                    bg-success
                                                <?php elseif($submission->student_score >= 5): ?>
                                                    bg-warning text-white
                                                <?php else: ?>
                                                    bg-danger
                                                <?php endif; ?>">
                                                <?php echo e($submission->student_score ?? 'Not graded yet'); ?>

                                            </span>
                                        </div>

                                        <div class="col-md-6">
                                            <strong>Remark:</strong>
                                            <span class="text-muted"><?php echo e($submission->submission_remark ?? '—'); ?></span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <strong>Answer:</strong>
                                        <div class="mt-2">
                                            <?php echo $submission->answer_text; ?>

                                        </div>
                                    </div>
                                    <?php if($isOverdue == false): ?>
                                        <?php if(Auth::user()->hasAnyRole(['Administrator', 'Instructor'])): ?>
                                            <hr>

                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal-<?php echo e($submission->slug); ?>">Grade Assignment</button>
                                            </div>
                                            <div class="modal fade" id="basicModal-<?php echo e($submission->slug); ?>" tabindex="-1" aria-labelledby="basicModalLabel"
                                            aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="basicModalLabel">Grade Student Assignment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="<?php echo e(route('submission.grade.store',$submission->slug)); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                                                            <div class="modal-body">
                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Assignment Score:</label>
                                                                    <input type="number" class="form-control" placeholder="0" name="student_score" value="<?php echo e($submission->assignment->max_score); ?>" readonly>
                                                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('student_score'),'class' => 'mt-2 text-danger','max' => '10']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('student_score')),'class' => 'mt-2 text-danger','max' => '10']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                                                                </div>
                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Student Score:</label>
                                                                    <select data-placeholder="Select a score..." class="form-control select-icons" name="max_score" required>
                                                                        <option value="<?php echo e(old('assignment_score') ?? $submission->student_score); ?>"> <?php echo e(old('assignment_score') ?? $submission->student_score); ?></option>
                                                                        <option value=""></option>
                                                                        <?php for($i = $submission->assignment->max_score; $i >= 0; $i--): ?>
                                                                            <option value="<?php echo e($i); ?>"> <?php echo e($i); ?> </option>
                                                                        <?php endfor; ?>
                                                                    </select>
                                                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('assignment_score'),'class' => 'mt-2 text-danger','max' => '10']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('assignment_score')),'class' => 'mt-2 text-danger','max' => '10']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                                                                </div>
                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Submission Remarks:</label>
                                                                    <textarea class="form-control" placeholder="Assignment Remarks" name="assignment_remark" required><?php echo e(old('assignment_remark') ?? $submission->submission_remark); ?></textarea>
                                                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('assignment_remark'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('assignment_remark')),'class' => 'mt-2 text-danger']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="alert alert-warning">
                                You haven’t submitted anything for this assignment yet.
                            </div>
                        <?php endif; ?>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/submissions/create.blade.php ENDPATH**/ ?>