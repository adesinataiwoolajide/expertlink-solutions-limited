<?php $title = ' 419'; ?>


<?php $__env->startSection('content'); ?>
    <h1><?php echo e($title); ?></h1>
    <h2>Page Expired</h2>
    <p>Your session has expired due to inactivity or a security timeout. Please refresh the page or return to the homepage.</p>
    <a href="<?php echo e(route('signout')); ?>" class="button"> Click here to Login</a>
    <div class="toggle" onclick="toggleDarkMode()">Toggle Dark Mode</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.errors', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/errors/419.blade.php ENDPATH**/ ?>