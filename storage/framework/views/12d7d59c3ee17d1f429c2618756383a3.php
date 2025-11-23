<?php $title = "CHeckout"; $segments = Request::segments();  ?>
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
        <h3 class="mb-4 fw-bold text-primary text-center">
            💳 Choose Your Payment Method
        </h3>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <div class="row g-4">
                    <!-- Payment Options -->
                    <?php if(count($cart) > 0): ?>
                    <div class="col-md-3">
                        <div class="d-grid gap-3">
                            <script src="https://js.paystack.co/v1/inline.js"></script>
                            <button type="button" class="btn btn-outline-primary btn-lg d-flex align-items-center justify-content-center"
                                onclick="payWithPaystack()">
                                <i class="ri-wallet-3-line me-2 fs-5"></i> Pay with Paystack
                            </button>
                            <script>
                                function payWithPaystack() {
                                    let handler = PaystackPop.setup({
                                        key: '<?php echo e(getPaystack()); ?>',
                                        email: '<?php echo e(auth()->user()->email); ?>',
                                        amount: <?php echo e($grandTotal * 100); ?>,
                                        currency: 'NGN',
                                        ref: 'PSK_' + Math.floor((Math.random() * 1000000000) + 1), 
                                        callback: function(response) {
                                            window.location.href = "<?php echo e(route('payment.verify')); ?>?reference=" + response.reference;
                                        },
                                        onClose: function() {
                                            alert('Transaction was not completed on Paystack, window closed.');
                                        }
                                    });
                                    handler.openIframe();
                                }
                            </script>

                            <script src="https://sdk.monnify.com/plugin/monnify.js"></script>

                            <button type="button"
                                    class="btn btn-outline-warning btn-lg d-flex align-items-center justify-content-center text-dark"
                                    onclick="payWithMonnify()">
                                <i class="ri-bank-line me-2 fs-5"></i> Pay with Monnify
                            </button>

                            <script>
                                function payWithMonnify() {
                                    const paymentRef = "MN_" + Math.floor(Math.random() * 1000000000 + 1);

                                    MonnifySDK.initialize({
                                        amount: <?php echo e($grandTotal); ?>,
                                        currency: "NGN",
                                        reference: paymentRef,
                                        customerName: "<?php echo e(auth()->user()->first_name . ' ' . auth()->user()->last_name); ?>",
                                        customerEmail: "<?php echo e(auth()->user()->email); ?>",
                                        apiKey: "<?php echo e(config('monnify.api_key')); ?>",
                                        contractCode: "<?php echo e(config('monnify.contract_code')); ?>",
                                        paymentDescription: "Course Payment",
                                        isTestMode: true, // Set to false in production

                                        onComplete: function(response) {
                                            if (response.paymentStatus === 'FAILED') {
                                                alert('Payment failed: ' + response.responseMessage);
                                            } else {
                                                window.location.href = "<?php echo e(route('monnify.verify')); ?>?paymentReference=" + response.paymentReference;
                                            }
                                        },

                                        onClose: function() {
                                            alert('Transaction was not completed on Monnify, window closed.');
                                        }
                                    });
                                }
                            </script>

                            <!-- Include Opay JS SDK -->
                            <script src="https://cashier.opayweb.com/static/js/pay.js"></script>

                            <button type="button" 
                                    class="btn btn-outline-primary btn-lg d-flex align-items-center justify-content-center"
                                    onclick="payWithOpay()">
                                <i class="ri-wallet-3-line me-2 fs-5"></i> Pay with Opay
                            </button>

                            <script>
                                function payWithOpay() {
                                    let orderId = 'OPAY_' + Math.floor((Math.random() * 1000000000) + 1);

                                    OpayCheckout.init({
                                        merchantId: '256612345678901',   // Your Opay merchant ID
                                        publicKey: 'OPAYPUB17635699443980.20201496315731027', // Your Opay public key
                                        amount: <?php echo e($grandTotal); ?>,
                                        currency: 'NGN',
                                        orderId: orderId,
                                        userEmail: '<?php echo e(auth()->user()->email); ?>',
                                        callbackUrl: "<?php echo e(route('opay.verify')); ?>",
                                        onSuccess: function(response) {
                                            window.location.href = "<?php echo e(route('opay.verify')); ?>?reference=" + response.reference;
                                        },
                                        onError: function(error) {
                                            alert('Transaction failed: ' + error.message);
                                        },
                                        onClose: function() {
                                            alert('Transaction was not completed on Opay, window closed.');
                                        }
                                    });
                                }
                            </script>
                        </div>
                    </div>
                    <?php endif; ?>

                    <!-- Cart Table -->
                    <div class="col-md-9">
                        <div class="table-responsive mb-3">
                            <table class="table table-bordered align-middle">
                                <thead class="table-primary">
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Program</th>
                                        <th>Price</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td class="fw-semibold"><?php echo e($item['course_name']); ?></td>
                                            <td><?php echo e($item['program_name'] ?? 'NIL'); ?></td>
                                            <td>₦<?php echo e(number_format(getDiscountedPrice($item['price'], $item['course_discount']),2)); ?></td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-<?php echo e($item['slug']); ?>">
                                                    <i class="ri-delete-bin-line me-1"></i>
                                                </a>
                                                <div class="modal fade" id="deleteModal-<?php echo e($item['slug']); ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?php echo e($item['slug']); ?>" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title" id="deleteModalLabel-<?php echo e($item['slug']); ?>">Confirm Removal</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to remove <strong><?php echo e($item['course_name']); ?></strong>? This action cannot be undone.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <a href="<?php echo e(route('cart.remove', $id)); ?>" class="btn btn-danger">Yes, Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">
                                                <i class="ri-shopping-cart-line me-1"></i> Your cart is currently empty.
                                                <a href="<?php echo e(route('course.index')); ?>" class="btn btn-outline-info text-dark">
                                                    View Courses
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <?php if(count($cart) > 0): ?>
                            <!-- Cart Summary -->
                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-sm rounded-3">
                                        <div class="card-body">
                                            <h5 class="fw-bold mb-3">🧾 Cart Summary</h5>
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span>Subtotal</span>
                                                    <span>₦<?php echo e(number_format($grandTotal)); ?></span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between fw-bold">
                                                    <span>Grand Total</span>
                                                    <span>₦<?php echo e(number_format($grandTotal)); ?></span>
                                                </li>
                                            </ul>
                                            <div class="text-start">
                                                <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#clearModal">
                                                    <i class="ri-delete-bin-line me-1"></i> Clear All Cart
                                                </a>

                                                <!-- Clear Cart Modal -->
                                                <div class="modal fade" id="clearModal" tabindex="-1" aria-labelledby="clearModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-warning text-dark">
                                                                <h5 class="modal-title" id="clearModalLabel">Confirm Cart Clearance</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to empty your learning cart? This action cannot be undone.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <a href="<?php echo e(route('cart.clear')); ?>" class="btn btn-warning">Yes, Clear All</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/home/payments/checkout.blade.php ENDPATH**/ ?>