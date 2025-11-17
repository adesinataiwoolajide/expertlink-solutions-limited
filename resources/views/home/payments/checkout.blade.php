@php $title = "CHeckout"; $segments = Request::segments();  @endphp
<x-app-layout>

    <div class="container py-5">
        <h3 class="mb-4 fw-bold text-primary text-center">
            💳 Choose Your Payment Method
        </h3>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <div class="row g-4">
                    <!-- Payment Options -->
                    <div class="col-md-3">
                        <div class="d-grid gap-3">
                            
                            <form action="{{ route('payment.paystack') }}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                <input type="hidden" name="amount" value="{{ $grandTotal }}">
                                <button type="submit" class="btn btn-outline-primary btn-lg d-flex align-items-center justify-content-center">
                                    <i class="ri-wallet-3-line me-2 fs-5"></i> Pay with Paystack
                                </button>
                            </form>

                            <form action="{{ route('payment.monnify') }}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                <input type="hidden" name="name" value="{{ auth()->user()->first_name. ' '. auth()->user()->last_name }}">
                                <input type="hidden" name="amount" value="{{ $grandTotal }}">
                                <button type="submit" class="btn btn-outline-warning btn-lg d-flex align-items-center justify-content-center text-dark">
                                    <i class="ri-bank-line me-2 fs-5"></i> Pay with Monnify
                                </button>
                            </form>
                            
                            <form action="{{ route('payment.stripe') }}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ auth()->user()->email }}">
                                <input type="hidden" name="name" value="{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}">
                                <input type="hidden" name="amount" value="{{ $grandTotal }}">
                                <button type="submit" class="btn btn-outline-dark btn-lg d-flex align-items-center justify-content-center">
                                    <i class="ri-credit-card-line me-2 fs-5"></i> Pay with Stripe
                                </button>
                            </form>

                        </div>
                    </div>

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
                                    @forelse($cart as $id => $item)
                                        <tr>
                                            <td class="fw-semibold">{{ $item['course_name'] }}</td>
                                            <td>{{ $item['course']->program->program_name }}</td>
                                            <td>₦{{ number_format(getDiscountedPrice($item['course']->course_price, $item['course']->course_discount),2) }}</td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item['slug'] }}">
                                                    <i class="ri-delete-bin-line me-1"></i> Remove
                                                </a>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteModal-{{ $item['slug'] }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item['slug'] }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title" id="deleteModalLabel-{{ $item['slug'] }}">Confirm Removal</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to remove <strong>{{ $item['course_name'] }}</strong>? This action cannot be undone.
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">Yes, Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">
                                                <i class="ri-shopping-cart-line me-1"></i> Your cart is currently empty.
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
                                    <div class="card border-0 shadow-sm rounded-3">
                                        <div class="card-body">
                                            <h5 class="fw-bold mb-3">🧾 Cart Summary</h5>
                                            <ul class="list-group list-group-flush mb-3">
                                                <li class="list-group-item d-flex justify-content-between">
                                                    <span>Subtotal</span>
                                                    <span>₦{{ number_format($grandTotal) }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between fw-bold">
                                                    <span>Grand Total</span>
                                                    <span>₦{{ number_format($grandTotal) }}</span>
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
                                                                <a href="{{ route('cart.clear') }}" class="btn btn-warning">Yes, Clear All</a>
                                                            </div>
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


</x-app-layout>