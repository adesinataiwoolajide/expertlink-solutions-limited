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
            <div class="card-header">
                <h5 class="card-title"><?php echo e($note->topic); ?> - Assignments</h5>
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('mycourse.note.read', [$note->slug, $note->courseSlug])); ?>" 
                    class="btn btn-sm btn-outline-primary">
                        Read Course Note
                    </a>

                    <a href="<?php echo e(route('mycourse.note.index', [$note->courseSlug])); ?>" 
                    class="btn btn-sm btn-outline-info">
                        All Course Note
                    </a>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="tabs-with-badges" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active px-4 py-2 d-flex align-items-center" id="badge-tab-one"
                            data-bs-toggle="tab" data-bs-target="#badge-content-one" type="button" role="tab"
                            aria-controls="badge-content-one" aria-selected="true">
                            <i class="ri-task-line me-2"></i> Assignment
                            <span class="badge bg-danger ms-2 rounded-pill">!</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-four"
                            data-bs-toggle="tab" data-bs-target="#badge-content-four" type="button" role="tab"
                            aria-controls="badge-content-four" aria-selected="false">
                            <i class="ri-award-line me-2"></i> List of Assignments
                            <span class="badge bg-info ms-2 rounded-pill"><?php echo e(count($assignments) ?? 0); ?></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-two"
                            data-bs-toggle="tab" data-bs-target="#badge-content-two" type="button" role="tab"
                            aria-controls="badge-content-two" aria-selected="false">
                            <i class="ri-bar-chart-line me-2"></i> Performance
                            <span class="badge bg-success ms-2 rounded-pill"><?php echo e(count($assignments) ?? 0); ?></span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-three"
                            data-bs-toggle="tab" data-bs-target="#badge-content-three" type="button" role="tab"
                            aria-controls="badge-content-three" aria-selected="false">
                            <i class="ri-award-line me-2"></i> Results
                            <span class="badge bg-warning ms-2 rounded-pill">!</span>
                        </button>
                    </li>
                </ul>
                <?php echo $__env->make('layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div class="tab-content border border-danger rounded p-4" id="tabs-with-badges-content">
                    <div class="tab-pane fade show active" id="badge-content-one" role="tabpanel" aria-labelledby="badge-tab-one">
                        <div class="row gx-3">
                            <?php if(Auth::user()->hasAnyRole(['Administrator','Instructor'])): ?>
                                <form action="<?php echo e(route('store.course.assignments',$note->slug)); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                                    <input type="hidden" name="courseSlug" value="<?php echo e($note->courseSlug); ?>">
                                    <input type="hidden" name="noteSlug" value="<?php echo e($note->slug); ?>">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Submission Due Date:</label>
                                            <input type="text" class="form-control datepicker-time" name="due_date" placeholder="Enter the Topic" value="<?php echo e(old('due_date')); ?>" required>
                                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('due_date'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('due_date')),'class' => 'mt-2 text-danger']); ?>
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
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Assignment Score:</label>
                                            <select data-placeholder="Select a score..." class="form-control select-icons" name="max_score" required>
                                                <option value="<?php echo e(old('max_score')); ?>"> <?php echo e(old('max_score') ?? ' -- Select a score --'); ?></option>
                                                <?php for($i = 1; $i <= 10; $i++): ?>
                                                    <option value="<?php echo e($i); ?>"> <?php echo e($i); ?> </option>
                                                <?php endfor; ?>
                                            </select>
                                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('max_score'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('max_score')),'class' => 'mt-2 text-danger']); ?>
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
                                            <label class="form-label">Question:</label>
                                            <textarea class="form-control summernote" name="description" id="content" required><?php echo old('description') ?? "<p> Please enter the assignment contents here</p>"; ?></textarea>
                                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('description'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('description')),'class' => 'mt-2 text-danger']); ?>
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
                                        <div class="col-12 text-end mt-4">
                                            <button type="submit" class="btn btn-primary">Save The Assignment</button>
                                        </div>
                                    </div>
                                </form>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="badge-content-four" role="tabpanel" aria-labelledby="badge-tab-four">
                        <?php if(count($assignments) > 0): ?>
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
                                            
                                                <?php if(Auth::user()->hasAnyRole(['Administrator','Instructor'])): ?>
                                                    <a href="" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#basicModal-<?php echo e($assignment->slug); ?>">Edit</a>
                                                    <?php if($assignment->submissions->count() > 0): ?>
                                                        <a href="" class="btn btn-outline-primary">Grade</a>
                                                    <?php endif; ?>
                                                    <div class="modal fade" id="basicModal-<?php echo e($assignment->slug); ?>" tabindex="-1" aria-labelledby="basicModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="basicModalLabel">Edit Assignment <?php echo e($assignment->slug); ?></h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="<?php echo e(route('update.course.assignments',$assignment->slug)); ?>" method="POST" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="courseSlug" value="<?php echo e($note->courseSlug); ?>">
                                                                        <input type="hidden" name="noteSlug" value="<?php echo e($note->slug); ?>">
                                                                        <div class="row">
                                                                            <div class="mb-3 col-md-6">
                                                                                <label class="form-label">Submission Due Date:</label>
                                                                                <input type="text" class="form-control datepicker-time" name="due_date" placeholder="Enter the Topic" value="<?php echo e(old('due_date') ?? $assignment->due_date); ?>" required>
                                                                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('due_date'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('due_date')),'class' => 'mt-2 text-danger']); ?>
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
                                                                            <div class="mb-3 col-md-6">
                                                                                <label class="form-label">Assignment Score:</label>
                                                                                <select data-placeholder="Select a score..." class="form-control select-icons" name="max_score" required>
                                                                                    <option value="<?php echo e(old('max_score') ?? $assignment->max_score); ?>"> <?php echo e(old('max_score') ?? $assignment->max_score); ?></option>
                                                                                    <?php for($i = 1; $i <= 10; $i++): ?>
                                                                                        <option value="<?php echo e($i); ?>"> <?php echo e($i); ?> </option>
                                                                                    <?php endfor; ?>
                                                                                </select>
                                                                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('max_score'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('max_score')),'class' => 'mt-2 text-danger']); ?>
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
                                                                                <label class="form-label">Question:</label>
                                                                                <textarea class="form-control summernote" name="description" id="content" required><?php echo old('description') ?? $assignment->description; ?></textarea>
                                                                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('description'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('description')),'class' => 'mt-2 text-danger']); ?>
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

                                                <?php if(Auth::user()->hasAnyRole(['Administrator','Student'])): ?>
                                                    <a href="<?php echo e(route('submission.course.create',$assignment->slug)); ?>" class="btn btn-outline-primary">Submit Answer</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-info text-center mt-4" role="alert">
                                <h5 class="fw-bold">No Assignments Available</h5>
                                <p class="mb-0">
                                    There are currently no assignments for this course. 
                                    <br>Please check back later or contact your instructor for updates.
                                   
                                </p>
                            </div>

                        <?php endif; ?>
                    </div>

                    <div class="tab-pane fade" id="badge-content-two" role="tabpanel" aria-labelledby="badge-tab-two">
                        <ul class="list-group">
                            <?php $__empty_1 = true; $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="list-group-item">
                                    <?php echo e($assignment->title); ?> - <?php echo e($assignment->submission_status); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <li class="list-group-item text-muted">No assignments submitted yet.</li>
                            <?php endif; ?>
                        </ul>
                        <?php echo e($assignments->links()); ?>

                    </div>
                    <div class="tab-pane fade" id="badge-content-three" role="tabpanel" aria-labelledby="badge-tab-three">
                        <div class="row gx-3">
                          
                            <?php $__currentLoopData = $assignments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="card mb-4">
                                    <div class="d-flex justify-content-between align-items-center mb-2 p-3 border-bottom">
                                        <h6 class="mb-0 fw-bold text-dark">Question: <?php echo $assignment->description; ?></h6><br>
                                        <h6 class="mb-0 fw-bold text-dark">Due: <?php echo e($assignment->due_date); ?></h6>
                                        <span class="badge bg-danger-subtle text-danger">Max Score: <?php echo e($assignment->max_score); ?></span>
                                        <span class="small text-muted">
                                            Created On: <?php echo e($assignment->created_at->format('M d, Y')); ?>

                                        </span>
                                    </div>

                                    <div class="row">
                                        <?php $__empty_1 = true; $__currentLoopData = $allSubmissions->where('assignmentSlug', $assignment->slug); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submitted): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="col-md-6 mb-3">
                                                <div class="card-body d-flex align-items-start gap-3">
                                                    <div class="icon-box sm bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center" style="width:45px; height:45px;">
                                                        <i class="ri-notification-2-line text-danger fs-5"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-2 small text-secondary">
                                                            Submitted By: <?php echo e($submitted->student->email ?? 'Unknown Student'); ?>

                                                        </p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="small text-muted">
                                                                Submitted On: <?php echo e($submitted->created_at->format('M d, Y')); ?>

                                                            </span>
                                                            <span class="badge bg-success"><?php echo e($submitted->status); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="p-3">
                                                <span class="small text-muted">No submissions yet for this assignment.</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/assignments/create.blade.php ENDPATH**/ ?>