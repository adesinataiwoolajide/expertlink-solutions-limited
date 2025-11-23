@php 
    $title = "Payment Invoice"; 
    $segments = Request::segments();  
@endphp

<x-app-layout>
    <!-- Breadcrumb -->
    <div class="app-hero-header d-flex align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('payment.index') }}" title="View all Payments">View All Payments</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Payment Invoice</li>
            </ol>
        </nav>
    </div>

    <!-- Alerts -->
    <div class="row gx-3 mt-2">
        <div class="col-lg-12 col-ms-12">
            @include('layouts.alert')
        </div>
    </div>

    <div class="row gx-3 mt-2">
        <div class="col-lg-12 col-ms-12">
            <div id="invoiceDiv" class="card shadow-sm mb-4">
                
                <!-- Invoice Header with Logo -->
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('elsAdmin/images/els.png')}}" alt="Company Logo" height="100" width="100" class="me-3">
                        <div>
                            <h5 class="card-title mb-0">Invoice #{{ $payment->paymentReference }}</h5>
                            <small class="text-muted">Issued on {{ $payment->created_at->format('d M, Y') }}</small>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <!-- Payment & User Details -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h6 class="fw-bold border-bottom pb-2 mb-3">Payment Details</h6>
                            <dl class="row mb-0">
                                <dt class="col-sm-5">Total Amount:</dt>
                                <dd class="col-sm-7">{{ $payment->currencyCode }} {{ number_format($payment->totalAmount, 2) }}</dd>

                                <dt class="col-sm-5">Description:</dt>
                                <dd class="col-sm-7">{{ $payment->paymentDescription }}</dd>

                                <dt class="col-sm-5">Transaction Ref:</dt>
                                <dd class="col-sm-7">{{ $payment->transactionReference }}</dd>

                                <dt class="col-sm-5">Payment Ref:</dt>
                                <dd class="col-sm-7">{{ $payment->paymentReference }}</dd>

                                <dt class="col-sm-5">Method:</dt>
                                <dd class="col-sm-7">
                                    @php $method = strtolower($payment->paymentMethod); @endphp
                                    @if ($method === 'card')
                                        <span class="badge bg-primary">{{ $payment->paymentMethod }}</span>
                                    @elseif ($method === 'bank transfer')
                                        <span class="badge bg-success">{{ $payment->paymentMethod }}</span>
                                    @elseif ($method === 'cash')
                                        <span class="badge bg-warning text-dark">{{ $payment->paymentMethod }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $payment->paymentMethod }}</span>
                                    @endif
                                </dd>

                                <dt class="col-sm-5">Provider:</dt>
                                <dd class="col-sm-7">
                                    @php $provider = strtolower($payment->paymentProvider); @endphp
                                    @if ($provider === 'stripe')
                                        <span class="badge bg-primary">{{ $payment->paymentProvider }}</span>
                                    @elseif ($provider === 'opay')
                                        <span class="badge bg-success">{{ $payment->paymentProvider }}</span>
                                    @elseif ($provider === 'paystack')
                                        <span class="badge bg-info text-dark">{{ $payment->paymentProvider }}</span>
                                    @elseif ($provider === 'monnify')
                                        <span class="badge bg-warning text-dark">{{ $payment->paymentProvider }}</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $payment->paymentProvider }}</span>
                                    @endif
                                </dd>

                                <dt class="col-sm-5">Status:</dt>
                                <dd class="col-sm-7">
                                    @if ($payment->paymentStatus === 'success')
                                        <span class="badge bg-success">Success</span>
                                    @elseif ($payment->paymentStatus === 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-danger">Failed</span>
                                    @endif
                                </dd>
                            </dl>
                        </div>

                        <div class="col-md-6">
                            <h6 class="fw-bold border-bottom pb-2 mb-3">User Details</h6>
                            <dl class="row mb-0">
                                <dt class="col-sm-4">Name:</dt>
                                <dd class="col-sm-8">{{ $payment->user?->first_name }} {{ $payment->user?->last_name }}</dd>

                                <dt class="col-sm-4">Email:</dt>
                                <dd class="col-sm-8">{{ $payment->user?->email }}</dd>

                                <dt class="col-sm-4">Phone:</dt>
                                <dd class="col-sm-8">{{ $payment->user?->phone_number }}</dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Course Subscriptions -->
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Course Subscriptions</h6>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>S/N</th>
                                    <th>Course Title</th>
                                    <th>Program</th>
                                    <th>Amount</th>
                                    <th>Subscription Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payment->courseSubscriptions as $index => $subscription)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $subscription->course?->course_name ?? 'N/A' }}</td>
                                        <td>{{ $subscription->program?->program_name ?? 'N/A' }}</td>
                                        <td>{{ $payment->currencyCode }} {{ number_format($subscription->course_amount, 2) }}</td>
                                        <td>{{ $subscription->created_at->format('d M, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No subscriptions linked to this payment.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Summary -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <p class="fw-bold">Total Courses: {{ $payment->courseSubscriptions->count() }}</p>
                        </div>
                        <div class="col-md-6 text-end">
                            <p class="fw-bold">Grand Total: {{ $payment->currencyCode }} {{ number_format($payment->totalAmount, 2) }}</p>
                        </div>
                    </div>

                    <!-- Invoice Footer -->
                    <div class="border-top pt-3 mt-4 text-center">
                        <p class="mb-1 fw-bold">Expert Link Solutions Limited</p>
                        <small class="text-muted">
                            123 Business Street, Lagos, Nigeria<br>
                            Phone: +234 8138 139 333 | Email: support@expertlinksolutions.com
                        </small>
                    </div>

                    <!-- Actions -->
                    <div class="mt-4 text-end">
                        <a href="{{ route('payment.index') }}" class="btn btn-info">Back to Payments</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>