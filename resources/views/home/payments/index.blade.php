@php $title = "List of Payments"; $segments = Request::segments();  @endphp
<x-app-layout>
     <div class="app-hero-header d-flex align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">View all Payments</li>
            </ol>
        </nav>
        
    </div>
    <div class="row gx-3 mt-2">
        <div class="col-lg-12 col-ms-12">
            @include('layouts.alert')
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">View All Payments</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basicExample" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>User</th>
                                    <th>Total Amount</th>
                                    <th>Payment Method</th>
                                    <th>Currency</th>
                                    <th>Transaction Ref</th>
                                    <th>Status</th>
                                    <th>Provider</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $num = 1; @endphp
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $num }}</td>
                                        <td>{{ $payment->user?->first_name }} {{ $payment->user?->last_name }}</td>
                                        <td>{{ number_format($payment->totalAmount,2) }}</td>
                                        <td>
                                            @if ($payment->paymentMethod === 'Card')
                                                <span class="badge bg-primary">{{ $payment->paymentMethod }}</span>
                                            @elseif ($payment->paymentMethod === 'Bank Transfer')
                                                <span class="badge bg-success">{{ $payment->paymentMethod }}</span>
                                            @elseif ($payment->paymentMethod === 'Cash')
                                                <span class="badge bg-warning text-dark">{{ $payment->paymentMethod }}</span>
                                            @elseif ($payment->paymentMethod === 'PayPal')
                                                <span class="badge bg-info text-dark">{{ $payment->paymentMethod }}</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $payment->paymentMethod }}</span>
                                            @endif
                                        </td>
                                                                            <td>{{ $payment->currencyCode }}</td>
                                        <td>{{ $payment->transactionReference }}</td>
                                        <td>
                                            @if ($payment->paymentStatus === 'success')
                                                <span class="badge bg-success bg-opacity-10 text-success">Success</span>
                                            @elseif ($payment->paymentStatus === 'pending')
                                                <span class="badge bg-warning bg-opacity-10 text-warning">Pending</span>
                                            @else
                                                <span class="badge bg-danger bg-opacity-10 text-danger">Failed</span>
                                            @endif
                                        </td>
                                        <td>
                                            @php
                                                $provider = strtolower($payment->paymentProvider);
                                            @endphp

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
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('payment.show', $payment->slug) }}" class="">
                                                <span class="badge bg-primary"> View </span>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                    @php $num++; @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>