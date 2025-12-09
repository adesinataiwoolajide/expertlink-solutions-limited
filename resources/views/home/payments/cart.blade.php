@php 
    $title = "Learning Cart"; 
    $segments = Request::segments();  
    $subtotal = collect($cart)->sum('discount'); 
    $grandTotal = $subtotal; 
@endphp

<x-app-layout>
    <div class="container py-5">
        
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h2 class="fw-bold text-gradient mb-0">🛒 Your Learning Cart</h2>
            <a href="{{ route('course.index') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="ri-add-line me-1"></i> Browse Courses
            </a>
        </div>

        <!-- Alerts -->
        @if(session('success'))
            <div class="alert alert-success rounded-pill shadow-sm">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger rounded-pill shadow-sm">{{ session('error') }}</div>
        @endif

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
                    @php $nos = 1; @endphp
                    @forelse($cart as $id => $item)
                        <tr>
                            <td>{{ $nos++ }}</td>
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
                                <div class="modal fade" id="deleteModal-{{ $item['slug']}}" tabindex="-1">
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
                            <td colspan="5" class="text-center text-muted py-4">
                                <i class="ri-shopping-cart-line me-2"></i> Your cart is empty.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Cart Summary -->
        @if(count($cart) > 0)
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <div class="card border-0 shadow-lg rounded-4">
                        <div class="card-body">
                            <h4 class="fw-bold mb-4 text-gradient">🧾 Cart Summary</h4>
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Subtotal</span>
                                    <span class="fw-semibold">₦{{ number_format($subtotal) }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between fw-bold">
                                    <span>Total</span>
                                    <span class="text-success">₦{{ number_format($grandTotal) }}</span>
                                </li>
                            </ul>
                            <div class="d-flex flex-wrap justify-content-end gap-3">
                                <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger rounded-pill px-4">
                                    <i class="ri-delete-bin-line me-1"></i> Clear Cart
                                </a>
                                <a href="{{ route('payment.checkout') }}" class="btn btn-success rounded-pill px-4 shadow-sm">
                                    <i class="ri-bank-card-line me-1"></i> Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>