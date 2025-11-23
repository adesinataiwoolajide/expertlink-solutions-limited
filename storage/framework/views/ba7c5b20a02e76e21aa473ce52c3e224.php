<?php $title = "Learning Cart"; $segments = Request::segments();  ?>
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
    
        
   <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary mb-0">🛒 Your Learning Cart</h3>
        <a href="<?php echo e(route('course.index')); ?>" class="btn btn-primary">
            <i class="ri-add-line me-1"></i> Add Courses
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>
    <?php if(session('error')): ?>
        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <?php
        $subtotal = collect($cart)->sum('price');
        $discount = $subtotal * 0.10;
        $grandTotal = $subtotal - 0;
    ?>

    <div class="table-responsive mb-5">
         <table class="table m-0 table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Program</th>
                    <th>Price</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $nos = 1; ?>
                <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($nos++); ?></td>
                        <td class="fw-semibold"><?php echo e($item['course_name']); ?></td>
                       
                        <td><?php echo e($item['program_name'] ?? 'NIL'); ?></td>
                        <td>₦<?php echo e(number_format(getDiscountedPrice($item['price'], $item['course_discount']),2)); ?></td>
                        <td class="text-center">
                            <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo e($item['slug']); ?>">
                                <i class="ri-delete-bin-line me-1"></i>
                            </a>
                            <div class="modal fade" id="deleteModal-<?php echo e($item['slug']); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($item['slug']); ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="deleteModalLabel-<?php echo e($item['slug']); ?>">Confirm Cart Removal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to remove <strong><?php echo e($item['course_name']); ?> </strong>? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="<?php echo e(route('cart.remove', $id)); ?>" class="btn btn-danger">Yes, Remove from Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            <i class="ri-shopping-cart-line me-1"></i> Your cart is currently empty.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if(count($cart) > 0): ?>
        <div class="row justify-content-end">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">🧾 Cart Summary</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>₦<?php echo e(number_format($subtotal)); ?></span>
                            </li>
                            
                            <li class="list-group-item d-flex justify-content-between fw-bold">
                                <span>Grand Total</span>
                                <span>₦<?php echo e(number_format($grandTotal)); ?></span>
                            </li>
                        </ul>
                        <div class="d-flex flex-wrap justify-content-end gap-4">
                            <a href="<?php echo e(route('cart.clear')); ?>" class="btn btn-outline-danger">
                                <i class="ri-delete-bin-line me-1"></i> Clear Cart
                            </a>

                            <a href="<?php echo e(route('payment.checkout')); ?>" class="btn btn-outline-info text-dark">
                                <i class="ri-bank-card-line me-1"></i> Proceed to Checkout
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/payments/cart.blade.php ENDPATH**/ ?>