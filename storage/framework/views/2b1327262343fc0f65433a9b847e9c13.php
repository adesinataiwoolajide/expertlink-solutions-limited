<?php $title = "My Courses"; $segments = Request::segments();  ?>
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
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

    <div class="card-body" style="background-color:#f8f9fa;">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-5">
                    <h2 class="fw-bold">
                        Explore the <span class="text-primary">amazing courses</span> you have enrolled in
                    </h2>
                    <p class="text-muted mt-2">Dive into your personalized learning journey and continue where you left off.</p>
                </div>

                <?php if(count($myProgram) > 0): ?>
                    <div class="d-flex flex-wrap justify-content-center gap-3 mb-5">
                        <button data-filter="*" class="btn btn-outline-primary active">
                            All <span class="badge bg-primary ms-1"><?php echo e(count($subList)); ?></span>
                        </button>
                        <?php $__currentLoopData = $myProgram; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $count = $subList->where('programSlug', $program->slug)->count();
                            ?>
                            <button data-filter=".cat--<?php echo e($program->slug); ?>" class="btn btn-outline-secondary">
                                <?php echo e($program->program_name); ?> <span class="badge bg-secondary ms-1"><?php echo e($count); ?></span>
                            </button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <div class="text-center my-5">
                        <p class="mb-3 text-danger">You don’t have any enrolled courses yet.</p>
                        <a href="<?php echo e(route('course.index')); ?>" class="btn btn-primary">
                            Browse Available Courses
                        </a>
                    </div>

                <?php endif; ?>
            </div>
        </div>

        <div class="row" id="course-grid">
           <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4 col-xl-3 mb-4 course-item cat--<?php echo e($course->programSlug); ?>">
                    <div class="card h-100 border-0 shadow rounded-4 overflow-hidden">
                        <!-- Banner -->
                        <div class="position-relative">
                            <img src="<?php echo e(asset('course-banner/' . $course->banner)); ?>"
                                alt="<?php echo e($course->course_name); ?>"
                                class="img-fluid w-100"
                                style="height: 180px; object-fit: cover;">
                            <span class="badge bg-primary position-absolute top-0 end-0 m-2">
                                <?php echo e($course->program->program_name ?? 'New'); ?>

                            </span>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            <!-- Title -->
                            <h5 class="fw-bold text-dark mb-1"><?php echo e($course->course_name); ?></h5>
                            <p class="text-muted mb-2"><?php echo e(count($course->notes)); ?> Notes</p>

                            <!-- Instructor -->
                            <p class="text-secondary mb-3 small">
                                <?php if($course->allocation): ?>
                                    Instructor: <?php echo e($course->allocation->user->first_name); ?> <?php echo e($course->allocation->user->last_name); ?>

                                <?php else: ?>
                                    Added By: <?php echo e($course->user->first_name); ?> <?php echo e($course->user->last_name); ?>

                                <?php endif; ?>
                            </p>

                            <!-- Rating -->
                            <div class="d-flex align-items-center mb-3">
                                <?php $rating = $course->ratings; ?>
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <i class="ri-star-fill" style="color:<?php echo e($i <= $rating ? '#ffc107' : '#e4e5e9'); ?>; font-size: 18px;"></i>
                                <?php endfor; ?>
                                <span class="ms-2 text-muted small"><?php echo e(number_format($rating, 1)); ?>/5</span>
                            </div>

                            <!-- Progress badges -->
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                <span class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm">
                                    📝 <?php echo e($course->student_assignments_count ?? 0); ?> Assignments
                                </span>
                                <span class="badge bg-success text-white px-3 py-2 rounded-pill shadow-sm">
                                    ✅ <?php echo e($course->student_tasks_count ?? 0); ?> Tasks
                                </span>
                            </div>

                            <!-- Progress bar with dynamic color + tooltip -->
                            <?php
                                $assignmentProgress = $course->progressForStudent();
                                $taskProgress = $course->taskProgressForStudent();
                                $overallProgress = round(($assignmentProgress + $taskProgress) / 2, 2);

                                if ($overallProgress < 40) {
                                    $progressColor = 'bg-danger'; // red
                                } elseif ($overallProgress < 70) {
                                    $progressColor = 'bg-warning'; // yellow
                                } else {
                                    $progressColor = 'bg-success'; // green
                                }

                                $tooltipText = "{$course->student_assignments_count} assignments, {$course->student_tasks_count} tasks completed";
                            ?>

                            <div class="mb-3">
                                <span class="text-muted small">Overall Progress: <?php echo e($overallProgress); ?>%</span>
                                <div class="progress rounded-pill bg-light" style="height: 8px;">
                                    <div class="progress-bar <?php echo e($progressColor); ?>" role="progressbar"
                                        style="width: <?php echo e($overallProgress); ?>%; min-width: 5px;"
                                        aria-valuenow="<?php echo e($overallProgress); ?>" aria-valuemin="0" aria-valuemax="100"
                                        data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e($tooltipText); ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="<?php echo e(route('mycourse.note.index',$course->slug)); ?>" class="btn btn-sm btn-outline-primary px-3">Start Learning</a>
                                <a href="<?php echo e(route('course.viewLearning', [$course->slug, $course->programSlug])); ?>" class="text-decoration-none text-muted small">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var grid = document.querySelector('#course-grid');
                var iso = new Isotope(grid, {
                    itemSelector: '.course-item',
                    layoutMode: 'fitRows'
                });

                document.querySelectorAll('[data-filter]').forEach(function (button) {
                    button.addEventListener('click', function () {
                        document.querySelectorAll('[data-filter]').forEach(btn => btn.classList.remove('active'));
                        this.classList.add('active');
                        var filterValue = this.getAttribute('data-filter');
                        iso.arrange({ filter: filterValue });
                    });
                });
            });
        </script>
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
<?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/courses/myCourses.blade.php ENDPATH**/ ?>