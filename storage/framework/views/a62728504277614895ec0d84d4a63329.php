<?php $title = ' Read Note'; ?>


<?php $__env->startSection('content'); ?>

    
    <h3 id="lecture_heading" 
        style="display:flex; align-items:center; font-size:1.5rem; font-weight:bold; color:#222; margin-bottom:20px;">
        <svg width="24" height="24" style="margin-right:8px;">
            <use xlink:href="#icon__Subject"></use>
        </svg>
        <?php echo e($notes->topic); ?>

    </h3>
    <div style="width:100%;">
        
        <p style="display: block; list-style-type: none; font-size: 15px; color: #425252; font-family:Proxima; text-decoration: none; font-weight: 200">
           <?php echo $notes->content; ?> 
        </p>
        
        <?php $__currentLoopData = $notes->materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materials): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php

            $imageExtensions = ['jpg', 'jpeg', 'png', 'svg'];
            $pdfExtensions = ['pdf'];
            $extension = pathinfo(strtolower($materials->course_file), PATHINFO_EXTENSION);
            $fileUrl = asset('storage/course-material/' . $materials->course_file);
            ?>
            <div class="pdf-container" style="width:100%; clear:both; padding:10px;  margin-bottom:20px;">
                <iframe width="100%" height="600" src="<?php echo e($fileUrl); ?>#zoom=150&toolbar=0&navpanes=1&scrollbar=1"  type="application/pdf" 
                frameborder="1" scrolling="auto"> </iframe>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php $__currentLoopData = ['link_one', 'link_two', 'link_three', 'link_four']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="video-container" style="width:100%; clear:both; padding:10px;  margin-bottom:20px;">
                <?php 
                    $youtubeLink = $notes->$link;
                    if (strpos($youtubeLink, 'watch?v=') !== false) {
                        $youtubeLink = str_replace('watch?v=', 'embed/', $youtubeLink);
                    }
                ?>

                <?php if($youtubeLink != 'https://www.youtube.com/embed/'): ?>
                    <iframe width="100%" height="500"
                            src="<?php echo e($youtubeLink); ?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                <?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.lecture', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/notes/view-reading.blade.php ENDPATH**/ ?>