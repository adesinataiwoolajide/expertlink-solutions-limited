
<?php if(session('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <span class="fw-semibold">Well done!</span> <?php echo session('success'); ?> 
        <a href="#" class="alert-link"></a>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>

     <div class="alert alert-danger alert-dismissible fade show">
        <span class="fw-semibold">Error!</span> <?php echo session('error'); ?> 
        <a href="#" class="alert-link">try submitting again</a>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
   
<?php endif; ?>

<?php if(session('status')): ?>
    
    <div class="alert alert-success alert-dismissible fade show">
        <span class="fw-semibold">Well done!</span> <?php echo session('status'); ?> 
        <a href="#" class="alert-link"></a>.
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>

<?php endif; ?>


<?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/layouts/alert.blade.php ENDPATH**/ ?>