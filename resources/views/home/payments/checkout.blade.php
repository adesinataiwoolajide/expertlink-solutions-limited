@php $title = "CHeckout"; $segments = Request::segments();  @endphp
<x-app-layout>

    <div class="container py-5">
        <!-- Page Header -->
        <h2 class="mb-5 fw-bold text-gradient text-center">
            💳 Choose Your Payment Method
        </h2>

        <div class="card border-0 shadow-lg rounded-4 mb-5">
            <div class="card-body p-4">
                <div class="row g-4">
                    
                    <!-- Payment Options -->
                    @if(count($cart) > 0)
                        <div class="col-md-3">
                            <div class="d-grid gap-3">
                                <button type="button" 
                                        class="btn btn-outline-primary btn-lg rounded-pill d-flex align-items-center justify-content-center shadow-sm hover-btn"
                                        onclick="payWithPaystack()">
                                    <i class="ri-wallet-3-line me-2 fs-5"></i> Pay with Paystack
                                </button>

                                <button type="button" id="flutterwave-pay"
                                    class="btn btn-outline-info btn-lg rounded-pill d-flex align-items-center justify-content-center shadow-sm hover-btn">
                                    <i class="ri-bank-card-line me-2 fs-5"></i> Pay with Flutterwave
                                </button>


                                <button type="button"
                                        class="btn btn-outline-warning btn-lg rounded-pill d-flex align-items-center justify-content-center text-dark shadow-sm hover-btn"
                                        onclick="payWithMonnify()">
                                    <i class="ri-bank-line me-2 fs-5"></i> Pay with Monnify
                                </button>

                                <button type="button"
                                        class="btn btn-outline-success btn-lg rounded-pill d-flex align-items-center justify-content-center shadow-sm hover-btn"
                                        onclick="payWithOpay()">
                                    <i class="ri-money-dollar-circle-line me-2 fs-5"></i> Pay with Opay
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="col-md-9">
                        <div class="table-responsive mb-4">
                            <table class="table table-hover align-middle shadow-sm rounded-3 overflow-hidden">
                                <thead class="bg-gradient text-white">
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Program</th>
                                        <th>Price</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cart as $id => $item)
                                        <tr>
                                            <td class="fw-semibold">{{ $item['course_name'] }}</td>
                                            <td>{{ $item['program_name'] ?? 'NIL' }}</td>
                                            <td class="text-success fw-bold">
                                                ₦{{ number_format(getDiscountedPrice($item['price'], $item['course_discount']),2) }}
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteModal-{{ $item['slug'] }}">
                                                    <i class="ri-delete-bin-line me-1"></i> Remove
                                                </button>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal-{{ $item['slug'] }}" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content rounded-4">
                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title">Confirm Removal</h5>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to remove <strong>{{ $item['course_name'] }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                                                                <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger rounded-pill">Yes, Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                <i class="ri-shopping-cart-line me-2"></i> Your cart is empty.
                                                <a href="{{ route('course.index') }}" class="btn btn-outline-info rounded-pill ms-2">
                                                    View Courses
                                                </a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if(count($cart) > 0)
                            <!-- Cart Summary -->
                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <div class="card border-0 shadow-lg rounded-4">
                                        <div class="card-body">
                                            <h4 class="fw-bold mb-4 text-gradient">🧾 Cart Summary</h4>
                                            <ul class="list-group list-group-flush mb-4">
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span>Subtotal</span>
                                                    <span class="fw-semibold">₦{{ number_format($grandTotal) }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between fw-bold">
                                                    <span>Total</span>
                                                    <span class="text-success">₦{{ number_format($grandTotal) }}</span>
                                                </li>
                                            </ul>
                                            <div class="d-flex flex-wrap gap-3">
                                                <a href="#" class="btn btn-outline-danger rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#clearModal">
                                                    <i class="ri-delete-bin-line me-1"></i> Clear Cart
                                                </a>
                                            </div>

                                            <!-- Clear Cart Modal -->
                                            <div class="modal fade" id="clearModal" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content rounded-4">
                                                        <div class="modal-header bg-warning text-dark">
                                                            <h5 class="modal-title">Confirm Cart Clearance</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to empty your learning cart? This action cannot be undone.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                                                            <a href="{{ route('cart.clear') }}" class="btn btn-warning rounded-pill">Yes, Clear All</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        function payWithPaystack() {
            let handler = PaystackPop.setup({
                key: '{{ getPaystack() }}',
                email: '{{ auth()->user()->email }}',
                amount: {{ $grandTotal * 100 }},
                currency: 'NGN',
                ref: 'PSK_' + Math.floor((Math.random() * 1000000000) + 1), 
                callback: function(response) {
                    window.location.href = "{{ route('payment.verify') }}?reference=" + response.reference;
                },
                onClose: function() {
                    alert('Transaction was not completed on Paystack, window closed.');
                }
            });
            handler.openIframe();
        }
    </script>

    <script src="https://sdk.monnify.com/plugin/monnify.js"></script>
    <script>
        function payWithMonnify() {
            const paymentRef = "MN_" + Math.floor(Math.random() * 1000000000 + 1);

            MonnifySDK.initialize({
                amount: {{ $grandTotal }},
                currency: "NGN",
                reference: paymentRef,
                customerName: "{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}",
                customerEmail: "{{ auth()->user()->email }}",
                apiKey: "{{ config('monnify.api_key') }}",
                contractCode: "{{ config('monnify.contract_code') }}",
                paymentDescription: "Course Payment",
                isTestMode: true, // Set to false in production

                onComplete: function(response) {
                    if (response.paymentStatus === 'FAILED') {
                        alert('Payment failed: ' + response.responseMessage);
                    } else {
                        window.location.href = "{{ route('monnify.verify') }}?paymentReference=" + response.paymentReference;
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
    
    <script>
        function payWithOpay() {
            let orderId = 'OPAY_' + Math.floor((Math.random() * 1000000000) + 1);

            OpayCheckout.init({
                merchantId: '256612345678901',   // Your Opay merchant ID
                publicKey: 'OPAYPUB17635699443980.20201496315731027', // Your Opay public key
                amount: {{ $grandTotal }},
                currency: 'NGN',
                orderId: orderId,
                userEmail: '{{ auth()->user()->email }}',
                callbackUrl: "{{ route('opay.verify') }}",
                onSuccess: function(response) {
                    window.location.href = "{{ route('opay.verify') }}?reference=" + response.reference;
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
    <script src="https://checkout.flutterwave.com/v3.js"></script>
    <script>
        document.getElementById("flutterwave-pay").addEventListener("click", function () {
            FlutterwaveCheckout({
                public_key: "FLWPUBK_TEST-d545d3fb4f50f205ac7a00acecd96608-X",
                tx_ref: "tx-" + Date.now(),
                amount: {{ $grandTotal }},
                currency: "NGN",
                payment_options: "card, banktransfer, ussd",
                customer: {
                    email: '{{ auth()->user()->email }}',
                    phone_number: '{{ auth()->user()->phone_number }}',
                    name: '{{ auth()->user()->first_name }}'
                },
                callback: function (data) {
                    console.log(data);
                    window.location.href = "{{ route('flutterwave.verify') }}?transaction_id=" + data.transaction_id;
                }

                customizations: {
                    title: "Expert Link Solutions",
                    description: "Payment for courses",
                    logo: "{{ asset('elsAdmin/auth-access/els-logo.png')}}"
                }
            });
        });
    </script>

</x-app-layout>