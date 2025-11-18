<?php $title = ' View Note'; ?>


<?php $__env->startSection('content'); ?>

    
    <h2 id="lecture_heading" 
        style="display:flex; align-items:center; font-size:1.5rem; font-weight:bold; color:#222; margin-bottom:20px;">
        <svg width="24" height="24" style="margin-right:8px;">
            <use xlink:href="#icon__Subject"></use>
        </svg>
        <?php echo e($course->course_name); ?>

    </h2>

    <div style="width:100%;">

        <!-- Ratings -->
        <div style="width:50%; float:left; padding:10px; box-sizing:border-box;">
            <div style="display:flex; align-items:center; margin:10px 0;">
                <label style="font-weight:bold; margin-right:8px;">Course Ratings:</label>
                <?php $rating = $course->ratings; ?>
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <i class="ri-star-fill" style="color:<?php echo e($i <= $rating ? '#ffc107' : '#e4e5e9'); ?>; font-size:16px;"></i>
                <?php endfor; ?>
                <span style="font-size:0.9rem; color:#555; margin-left:8px;">
                    <?php echo e(number_format($rating, 1)); ?> (<?php echo e($course->reviews); ?> reviews)
                </span>
            </div>
        </div>

        <!-- Duration -->
        <div style="width:50%; float:left; padding:10px; box-sizing:border-box;">
            <label style="font-weight:bold;">Course Duration: <?php echo e($course->duration); ?></label>
        </div>

      
        <!-- Introduction Video -->
        <div style="width:100%; clear:both; padding:10px; box-sizing:border-box; margin-bottom:20px;">
            <?php if(!empty($course->course_introduction)): ?>
                <label style="font-weight:bold;">Introduction Video:</label>
                <?php if(Storage::disk('public')->exists($filePath)): ?>
                    <video style="width:100%; height:500px; border:1px solid #ddd; border-radius:6px;" controls controlsList="nodownload">
                        <source src="<?php echo e(asset('storage/' . $filePath)); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                <?php else: ?>
                    <p style="color:red; font-weight:bold;">Introduction video not available.</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Basic Requirements -->
        <div style="width:100%; padding:10px; margin-bottom:15px; box-sizing:border-box;">
            <label style="font-weight:bold;">Course Basic Requirements:</label>
            <div style="border:1px solid #ddd; padding:10px; border-radius:6px; background:#f8f9fa;">
                <?php echo $course->basic_requirements; ?>

            </div>
        </div>
          <!-- Training Type -->
        <div class="mb-4 col-md-6">
            <label class="form-label fw-bold text-dark">Training Type:</label>
            <p class="form-control-plaintext">
                <?php $__currentLoopData = json_decode($course->training_type); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge bg-info text-white me-1"><?php echo e(ucfirst(trim($type))); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
        </div>

        <div class="mb-4 col-md-6">
            <label class="form-label fw-bold text-dark">Course Technologies:</label>
            <p class="form-control-plaintext">
                <?php $__currentLoopData = json_decode($course->course_technologies); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $types): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class="badge bg-dark text-white me-1"><?php echo e(ucfirst(trim($types))); ?></span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
        </div>


        <!-- Outline -->
        <div style="width:100%; padding:10px; margin-bottom:15px; box-sizing:border-box;">
            <label style="font-weight:bold;">Course Outline:</label>
            <div style="border:1px solid #ddd; padding:10px; border-radius:6px; background:#f8f9fa;">
                <?php echo $course->course_outline; ?>

            </div>
        </div>

        <!-- Learning Module -->
        <div style="width:100%; padding:10px; margin-bottom:15px; box-sizing:border-box;">
            <label style="font-weight:bold;">Learning Module:</label>
            <div style="border:1px solid #ddd; padding:10px; border-radius:6px; background:#f8f9fa;">
                <?php echo $course->learning_module; ?>

            </div>
        </div>

        <!-- Schedule -->
        <div style="width:100%; padding:10px; margin-bottom:15px; box-sizing:border-box;">
            <label style="font-weight:bold;">Course Schedule:</label>
            <div style="border:1px solid #ddd; padding:10px; border-radius:6px; background:#f8f9fa;">
                <?php echo $course->course_schedule; ?>

            </div>
        </div>

        <!-- Overview -->
        <div style="width:100%; padding:10px; margin-bottom:15px; box-sizing:border-box;">
            <label style="font-weight:bold;">Course Overview:</label>
            <div style="border:1px solid #ddd; padding:10px; border-radius:6px; background:#f8f9fa;">
                <?php echo $course->course_overview; ?>

            </div>
        </div>

        <!-- Benefits -->
        <div style="width:100%; padding:10px; margin-bottom:15px; box-sizing:border-box;">
            <label style="font-weight:bold;">Benefits:</label>
            <div style="border:1px solid #ddd; padding:10px; border-radius:6px; background:#f8f9fa;">
                <?php echo $course->benefits; ?>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.lecture', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/notes/reading.blade.php ENDPATH**/ ?>