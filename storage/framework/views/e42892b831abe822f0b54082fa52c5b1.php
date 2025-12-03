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
    <div class="card">
        <div class="card-body bg-light">
            <h4><?php echo e($note->topic); ?> - Your Progress</h4>

            <p>Assignments Progress: <?php echo e($assignmentProgress); ?>%</p>
            <div class="progress mb-3">
                <div class="progress-bar bg-info" style="width: <?php echo e($assignmentProgress); ?>%"></div>
            </div>

            <p>Tasks Progress: <?php echo e($taskProgress); ?>%</p>
            <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width: <?php echo e($taskProgress); ?>%"></div>
            </div>

            <p>Overall Progress: <?php echo e($overallProgress); ?>%</p>
            <div class="progress">
                <div class="progress-bar bg-primary" style="width: <?php echo e($overallProgress); ?>%"></div>
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
<?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/notes/progress.blade.php ENDPATH**/ ?>