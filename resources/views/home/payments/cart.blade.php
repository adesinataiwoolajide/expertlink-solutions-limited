@php $title = "Learning Cart"; $segments = Request::segments();  @endphp
<x-app-layout>
    
        
   <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary mb-0">🛒 Your Learning Cart</h3>
        <a href="{{ route('course.index') }}" class="btn btn-primary">
            <i class="ri-add-line me-1"></i> Add More Courses
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @php
        $subtotal = collect($cart)->sum('price');
        $discount = $subtotal * 0.10;
        $grandTotal = $subtotal - 0;
    @endphp

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
                @php $nos = 1; @endphp
                @forelse($cart as $id => $item)
                    <tr>
                        <td>{{ $nos++ }}</td>
                        <td class="fw-semibold">{{ $item['course_name'] }}</td>
                        <td>{{ $item['course']->program->program_name }}</td>
                        <td>₦{{ number_format(getDiscountedPrice($item['course']->course_price, $item['course']->course_discount),2) }}</td>
                        <td class="text-center">
                            <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $item['slug'] }}">
                                <i class="ri-delete-bin-line me-1"></i> Remove
                            </a>
                            <div class="modal fade" id="deleteModal-{{ $item['slug']}}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item['slug'] }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $item['slug'] }}">Confirm Cart Removal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to remove <strong>{{ $item['course_name'] }} </strong>? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="{{ route('cart.remove', $id) }}" class="btn btn-danger">Yes, Remove from Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            <i class="ri-shopping-cart-line me-1"></i> Your cart is currently empty.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(count($cart) > 0)
        <div class="row justify-content-end">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">🧾 Cart Summary</h5>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>₦{{ number_format($subtotal) }}</span>
                            </li>
                            
                            <li class="list-group-item d-flex justify-content-between fw-bold">
                                <span>Grand Total</span>
                                <span>₦{{ number_format($grandTotal) }}</span>
                            </li>
                        </ul>
                        <div class="text-end">
                            <a href="{{ route('cart.clear') }}" class="btn btn-outline-danger">
                                <i class="ri-delete-bin-line me-1"></i> Clear Cart
                            </a>

                            <a href="{{ route('payment.checkout') }}" class="btn btn-outline-info text-dark">
                                <i class="ri-bank-card-line me-1"></i> Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
</x-app-layout>