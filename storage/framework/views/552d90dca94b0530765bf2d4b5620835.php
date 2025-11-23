<?php $title =  "View Course Note"; $segments = Request::segments(); $number=1;  ?>
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
                <li class="breadcrumb-item"><a href="<?php echo e(route('course.note.index',$notes->courseSlug)); ?>" title="View all <?php echo e($segments[1]); ?>">View all <?php echo e($segments[1]); ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('note.create',[$notes->courseSlug, $allocation->slug])); ?>" title="Create <?php echo e($segments[1]); ?>">Create New <?php echo e($segments[1]); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">View <?php echo e($segments[1]); ?></li>
            </ol>
        </nav>
        
    </div>
    <?php echo $__env->make('layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
     <div class="col-md-12 mt-3">
        <div class="card">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0"><?php echo e($notes->topic); ?></h5>
                        <div class="d-flex gap-2">
                            <?php if(Auth::user()->hasAnyRole(['Instructor', 'Administrator', 'Admin'])): ?>
                                <a href="<?php echo e(route('course.note.edit', ['slug' => $notes->slug])); ?>" class="btn btn-sm btn-outline-primary">
                                    Edit Course Note
                                </a>

                                <a href="<?php echo e(route('mycourse.note.read', [$notes->slug, $course->slug])); ?>" class="btn btn-sm btn-outline-info">
                                    Read Course Note
                                </a>
                            <?php endif; ?>

                            <?php if(Auth::user()->hasAnyRole(['Administrator'])): ?>
                                <a href="" data-bs-toggle="modal"data-bs-toggle="modal" data-bs-target="#deleteNoteModal-<?php echo e($notes->slug); ?>" accesskey=""class="btn btn-sm btn-outline-danger">
                                    Delete Course Note
                                </a>
                                <div class="modal fade" id="deleteNoteModal-<?php echo e($notes->slug); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($notes->slug); ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-danger">
                                                <h5 class="modal-title" id="deleteModalLabel-<?php echo e($notes->slug); ?>">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete : <strong><?php echo e($notes->topic); ?></strong> from the course notes? 
                                               <p class="text-danger"> <strong></strong> Please note that this action will also delete all associated course materials and cannot be undone. </strong></p>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="<?php echo e(route('course.note.delete', ['slug' => $notes->slug])); ?>" class="btn btn-danger">Yes, Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="tabs-with-badges" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active px-4 py-2 d-flex align-items-center" id="badge-tab-one"
                                    data-bs-toggle="tab" data-bs-target="#badge-content-one" type="button" role="tab" aria-controls="badge-content-one" aria-selected="true">
                                    <i class="ri-book-open-line me-2"></i> Preview Course Note
                                    <span class="badge bg-danger ms-2 rounded-pill">!!!</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-two"
                                    data-bs-toggle="tab" data-bs-target="#badge-content-two" type="button" role="tab" aria-controls="badge-content-two" aria-selected="false">
                                    <i class="ri-book-line me-2"></i> Course Materials
                                    <span class="badge bg-success ms-2 rounded-pill"><?php echo e(count($materials)); ?></span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-three"
                                data-bs-toggle="tab" data-bs-target="#badge-content-three" type="button" role="tab" aria-controls="badge-content-three" aria-selected="false">
                                <i class="ri-settings-3-line me-2"></i> Course Videos
                                <span class="badge bg-warning ms-2 rounded-pill">4</span>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content border border-primary rounded p-4" id="tabs-with-badges-content">
                            <div class="tab-pane fade show active" id="badge-content-one" role="tabpanel" aria-labelledby="badge-tab-one" style="position: relative; padding: 20px;">
                                <div class="course-header" style="margin-bottom: 15px;">
                                    <h4 class="text-primary"><strong></strong>Course Name:</strong> <?php echo e($course->course_name); ?></h4>
                                    <h5 class="text-primary"><strong>Topic:</strong> <?php echo e($notes->topic); ?></h5>
                                </div>
                                <div class="course-note-description">
                                    <?php echo $notes->content; ?>

                                </div>
                            </div>
                            <div class="tab-pane fade" id="badge-content-two" role="tabpanel" aria-labelledby="badge-tab-two">
                                <?php
                                    $iconMap = getIcons();
                                    $extensionColorMap = getFileColer();
                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'svg'];
                                    $pdfExtensions = ['pdf'];
                                    $materials = collect($materials)->sortBy(function ($material) use ($imageExtensions, $pdfExtensions) {
                                        $extension = pathinfo(strtolower($material->course_file), PATHINFO_EXTENSION);
                                        if (in_array($extension, $imageExtensions)) {
                                            return 0;
                                        } elseif (in_array($extension, $pdfExtensions)) {
                                            return 1;
                                        } else {
                                            return 2;
                                        }
                                    });
                                ?>

                                <div class="row">
                                    <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $extension = pathinfo(strtolower($material->course_file), PATHINFO_EXTENSION);
                                            $iconClass = $iconMap[$extension] ?? $iconMap['default'];
                                            $color = $extensionColorMap[$extension] ?? $extensionColorMap['default'];
                                            $fileUrl = asset('storage/course-material/' . $material->course_file);
                                        ?>

                                        <?php if(in_array($extension, $imageExtensions)): ?>
                                            
                                            <div class="col-12 col-sm-12 col-lg-6 mb-3">
                                                <div class="position-relative">
                                                    <img src="<?php echo e($fileUrl); ?>" class="d-block mx-lg-auto img-fluid rounded-5 shadow-lg" style="height: 550px;">
                                                    <?php if(Auth::user()->hasAnyRole(['Administrator'])): ?>
                                                        <div class="d-flex align-items-center">
                                                            <a href="" data-bs-toggle="modal"data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo e($material->slug); ?>" class="text-danger">
                                                                <i class="ri-delete-bin-line text-danger me-2 fs-4" style="cursor: pointer;" 
                                                                    onmouseover="this.classList.add('ri-delete-bin-fill')" 
                                                                    onmouseout="this.classList.remove('ri-delete-bin-fill')">
                                                                </i>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                           
                                        <?php else: ?>
                                            
                                            <div class="col-12 mb-4">
                                                <div class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-box sm bg-<?php echo e($color); ?>-subtle text-<?php echo e($color); ?> rounded-circle me-3">
                                                                <i class="<?php echo e($iconClass); ?>"></i>
                                                            </div>
                                                            <div><?php echo e($material->course_file); ?></div>
                                                        </div>
                                                        <?php if(Auth::user()->hasAnyRole(['Administrator'])): ?>
                                                            <div class="d-flex align-items-center">
                                                                <a href="" data-bs-toggle="modal"data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo e($material->slug); ?>" class="text-danger">
                                                                    <i class="ri-delete-bin-line text-danger me-2 fs-4" style="cursor: pointer;" 
                                                                        onmouseover="this.classList.add('ri-delete-bin-fill')" 
                                                                        onmouseout="this.classList.remove('ri-delete-bin-fill')">
                                                                    </i>
                                                                </a>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="mt-3">
                                                        <?php if($extension === 'pdf'): ?>
                                                            <iframe src="<?php echo e($fileUrl); ?>#zoom=150&toolbar=1&navpanes=1&scrollbar=1" 
                                                                type="application/pdf" width="100%" height="1000" style="border: none; min-height: 100vh;">
                                                            </iframe>
                                                        <?php else: ?>
                                                            <div class="text-muted">Preview not available for .<?php echo e($extension); ?> files.</div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="modal fade" id="deleteModal-<?php echo e($material->slug); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($material->slug); ?>" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title" id="deleteModalLabel-<?php echo e($material->slug); ?>">Confirm Deletion</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete <strong><?php echo e($material->course_file); ?></strong> from course material? This action cannot be undone.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <a href="<?php echo e(route('material.delete', $material->slug)); ?>" class="btn btn-danger">Yes, Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="badge-content-three" role="tabpanel" aria-labelledby="badge-tab-three">
                                <div class="row gx-3">
                                    <?php
                                        $colors = ['primary', 'info', 'success', 'danger'];
                                    ?>

                                    <?php $__currentLoopData = ['link_one', 'link_two', 'link_three', 'link_four']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $color = $colors[$index % count($colors)]; $youtubeLink = $notes->$link ?? '';
                                        ?>

                                        <?php if(str_contains($youtubeLink, 'youtube')): ?>
                                            <?php if(strtolower($youtubeLink) != 'https://www.youtube.com/watch?v=' && !empty($youtubeLink)): ?>
                                                <div class="video-container" style="width:88%; clear:both; padding:10px;  margin-bottom:20px;">
                                                    <?php 
                                                        if (strpos($youtubeLink, 'watch?v=') !== false) {
                                                            $youtubeLink = str_replace('watch?v=', 'embed/', $youtubeLink);
                                                        }
                                                    ?>
                                                    <?php if($youtubeLink != 'https://www.youtube.com/embed/'): ?>
                                                        <iframe width="100%" height="500" src="<?php echo e($youtubeLink); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
                                                        </iframe>
                                                    <?php endif; ?>
                                                </div>
                                                
                                            <?php endif; ?>
                                        <?php else: ?>
                                           
                                            <div class="pdf-container" style="width:100%; clear:both; padding:10px;  margin-bottom:20px;">
                                                <iframe width="100%" height="600" src="<?php echo e($youtubeLink); ?>#zoom=150&toolbar=0&navpanes=1&scrollbar=1"  type="application/pdf" 
                                                frameborder="1" scrolling="auto"> </iframe>
                                            </div>

                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/notes/show.blade.php ENDPATH**/ ?>