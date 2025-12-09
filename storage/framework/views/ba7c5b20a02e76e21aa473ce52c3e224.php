<?php 
    $title = "Learning Cart"; 
    $segments = Request::segments();  
    $subtotal = collect($cart)->sum('price'); 
    $grandTotal = $subtotal; 
?>

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
        
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="fw-bold text-gradient mb-0">🛒 Your Learning Cart</h2>
            <a href="<?php echo e(route('course.index')); ?>" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="ri-add-line me-1"></i> Browse Courses
            </a>
        </div>

        <!-- Alerts -->
        <?php if(session('success')): ?>
            <div class="alert alert-success rounded-pill shadow-sm"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger rounded-pill shadow-sm"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <!-- Cart Table -->
        <div class="table-responsive mb-5">
            <table class="table table-hover align-middle shadow-sm rounded-3 overflow-hidden">
                <thead class="bg-gradient text-white">
                    <tr>
                        <th>#</th>
                        <th>Course</th>
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
                            <td class="text-success fw-bold">
                                ₦<?php echo e(number_format(getDiscountedPrice($item['price'], $item['course_discount']),2)); ?>

                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#deleteModal-<?php echo e($item['slug']); ?>">
                                    <i class="ri-delete-bin-line me-1"></i> Remove
                                </button>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal-<?php echo e($item['slug']); ?>" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4">
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title">Confirm Removal</h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to remove <strong><?php echo e($item['course_name']); ?></strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                                                <a href="<?php echo e(route('cart.remove', $id)); ?>" class="btn btn-danger rounded-pill">Yes, Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="ri-shopping-cart-line me-2"></i> Your cart is empty.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Cart Summary -->
        <?php if(count($cart) > 0): ?>
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="card border-0 shadow-lg rounded-4">
                        <div class="card-body">
                            <h4 class="fw-bold mb-4 text-gradient">🧾 Cart Summary</h4>
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Subtotal</span>
                                    <span class="fw-semibold">₦<?php echo e(number_format($subtotal)); ?></span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <span class="text-success">₦<?php echo e(number_format($grandTotal)); ?></span>
                                </li>
                            </ul>
                            <div class="d-flex flex-wrap justify-content-end gap-3">
                                <a href="<?php echo e(route('cart.clear')); ?>" class="btn btn-outline-danger rounded-pill px-4">
                                    <i class="ri-delete-bin-line me-1"></i> Clear Cart
                                </a>
                                <a href="<?php echo e(route('payment.checkout')); ?>" class="btn btn-success rounded-pill px-4 shadow-sm">
                                    <i class="ri-bank-card-line me-1"></i> Checkout
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