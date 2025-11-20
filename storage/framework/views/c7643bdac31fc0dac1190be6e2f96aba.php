<?php $title =  "Create Course Note"; $segments = Request::segments(); $number=1;  ?>
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
                <li class="breadcrumb-item"><a href="<?php echo e(route('course.note.index',$courseSlug)); ?>" title="View all <?php echo e($segments[1]); ?>">View all <?php echo e($segments[1]); ?></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('note.create',[$notes->courseSlug, $allocation->slug])); ?>" title="Create <?php echo e($segments[1]); ?>">Create New <?php echo e($segments[1]); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page">Create <?php echo e($segments[1]); ?></li>
            </ol>
        </nav>
        
    </div>
    <?php echo $__env->make('layouts.alert', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Please fill the below form to Update a Course Note for <?php echo e($course->course_name ?? ''); ?></h5>
                <?php if(Auth::user()->hasAnyRole(['Instructor', 'Administrator', 'Admin'])): ?>
                <a href="<?php echo e(route('course.note.index', $course->slug)); ?>"
                    class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm text-decoration-none">
                    View Course Note
                </a>
                
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row gx-3">
                    <form action="<?php echo e(route('course.note.update',$notes->slug)); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="programSlug" value="<?php echo e($course->programSlug); ?>">
                        <input type="hidden" name="courseSlug" value="<?php echo e($courseSlug); ?>">
                        <input type="hidden" name="allocationSlug" value="<?php echo e($allocationSlug); ?>">
                        
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Course Name:</label>
                                <input type="text" class="form-control" value="<?php echo e($course->course_name ?? ''); ?>" readonly>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Topic:</label>
                                <input type="text" class="form-control" name="topic" placeholder="Enter the Topic" value="<?php echo e(old('topic')  ?? $notes->topic); ?>" required>
                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('topic'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('topic')),'class' => 'mt-2 text-danger']); ?>
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

                            <?php $__currentLoopData = ['link_one', 'link_two', 'link_three', 'link_four']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">YouTube Link <?php echo e($index + 1); ?>:</label>
                                    <input type="text" class="form-control" name="<?php echo e($link); ?>" value="<?php echo e(old($link) ?? $notes->$link); ?>">
                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get($link),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get($link)),'class' => 'mt-2 text-danger']); ?>
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
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Course Note Content:</label>
                                <textarea class="form-control summernote" name="content" id="content" required><?php echo old('content') ?? $notes->content; ?></textarea>
                                <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('content'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('content')),'class' => 'mt-2 text-danger']); ?>
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
                                <label class="form-label font-bold">Reference Materials:</label>
                                <div class="container mt-4">
                                    <div id="dropZone" class="border border-primary border-dashed rounded p-4 text-center mb-4"
                                        ondragover="event.preventDefault()" ondrop="handleDrop(event)">
                                        <p class="mb-0 text-muted">Drag & drop files here or click to upload</p>
                                        <input type="file" id="materialInput" name="material[]" accept=".pdf,.jpg,.jpeg,.png,.svg" multiple hidden />
                                        <button class="btn btn-primary mt-2" onclick="document.getElementById('materialInput').click()">Browse Files</button>
                                    </div>
                                    <div class="row" id="filePreview"></div>
                                    <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('material'),'class' => 'mt-2 text-danger']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('material')),'class' => 'mt-2 text-danger']); ?>
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

                            <div class="mb-3 col-md-12">
                                <label for="postNote">Choose when to post the note:</label>
                                <select id="postNote" name="postNote" id="postNote" class="form-control" required>
                                    <option value=""></option>
                                    <option value="now">Post Note Now</option>
                                    <option value="later">Post Note Later</option>
                                </select>
                            </div>
                           
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary">Update The Course Note</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Script -->
<script>
    const postNoteSelect = document.getElementById('postNote');
    const submitBtn = document.getElementById('submitBtn');

    postNoteSelect.addEventListener('change', function () {
        submitBtn.disabled = this.value === '';
    });

    const input = document.getElementById('materialInput');
    const preview = document.getElementById('filePreview');
    let selectedFiles = [];
    const MAX_SIZE_MB = 2;

    input.addEventListener('change', (e) => {
        const newFiles = Array.from(e.target.files).filter(file => {
            if (file.size > MAX_SIZE_MB * 1024 * 1024) {
                alert(`"${file.name}" is too large. Max size is ${MAX_SIZE_MB}MB.`);
                return false;
            }
            return true;
        });
        selectedFiles = selectedFiles.concat(newFiles);
        renderPreview();
    });

    function handleDrop(e) {
        e.preventDefault();
        const droppedFiles = Array.from(e.dataTransfer.files).filter(file => {
            if (file.size > MAX_SIZE_MB * 1024 * 1024) {
                alert(`"${file.name}" is too large. Max size is ${MAX_SIZE_MB}MB.`);
                return false;
            }
            return true;
        });
        selectedFiles = selectedFiles.concat(droppedFiles);
        renderPreview();
    }

    function renderPreview() {
        preview.innerHTML = '';
        selectedFiles.forEach((file, index) => {
            const fileSize = (file.size / 1024).toFixed(2); // KB
            const fileCard = document.createElement('div');
            fileCard.className = 'col-md-4 mb-4';

            fileCard.innerHTML = `
                <div class="bg-white border border-gray-200 p-3 rounded shadow-sm h-100 d-flex flex-column justify-content-between">
                    <div class="d-flex align-items-center mb-2">
                        <div class="d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded me-2" style="width: 24px; height: 24px;">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="flex-grow-1">
                            <p class="mb-0 fw-medium small" style="word-break: break-word;">${file.name}</p>
                            <p class="mb-0 text-muted small">${fileSize} KB</p>
                        </div>
                    </div>
                    <div class="mt-auto text-end">
                        <button type="button" onclick="removeFile(${index})" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash-alt"></i> Remove
                        </button>
                    </div>
                </div>
            `;

            preview.appendChild(fileCard);
        });

        // Sync input files
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        input.files = dataTransfer.files;
    }

    function removeFile(index) {
        selectedFiles.splice(index, 1);
        renderPreview();
    }
</script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/notes/edit.blade.php ENDPATH**/ ?>