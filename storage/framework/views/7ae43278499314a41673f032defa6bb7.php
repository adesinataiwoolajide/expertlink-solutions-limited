<?php $title = ' 404'; ?>

<?php $__env->startSection('content'); ?>
    <h1><?php echo e($title); ?></h1>
    <h2>Resource not found</h2>
    <p>Oops! The page you're looking for can't be found.</p>
    <p>It might have been removed, had its name changed, or is temporarily unavailable.</p>
    <a href="<?php echo e(route('dashboard')); ?>" class="button">Go to Homepage</a>
    <a href="javascript:history.go(-1)" class="buttonError" style="margin-left: 2px;">Go Back</a>
    <div class="toggle" onclick="toggleDarkMode()">Toggle Dark Mode</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.errors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/errors/404.blade.php ENDPATH**/ ?>