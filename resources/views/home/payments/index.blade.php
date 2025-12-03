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
            @if(Auth::user()->hasAnyRole(['Administrator',"Admin"]))
                <div class="card shadow-sm border-0 rounded-4 mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold mb-0">Revenue by Provider</h5>
                            <!-- Chart type selector -->
                            <select id="chartTypeSelector" class="form-select form-select-sm" style="width:auto;">
                                <option value="bar" selected>Bar</option>
                                <option value="pie">Pie</option>
                                <option value="doughnut">Doughnut</option>
                            </select>
                        </div>
                        <div style="height:300px;">
                            <canvas id="paymentChart"></canvas>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('paymentChart').getContext('2d');

                    // Gradient colors
                    const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient1.addColorStop(0, '#4e73df');
                    gradient1.addColorStop(1, '#1cc88a');

                    const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient2.addColorStop(0, '#36b9cc');
                    gradient2.addColorStop(1, '#17a2b8');

                    const gradient3 = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient3.addColorStop(0, '#f6c23e');
                    gradient3.addColorStop(1, '#fd7e14');

                    const gradient4 = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient4.addColorStop(0, '#e74a3b');
                    gradient4.addColorStop(1, '#c82333');

                    const chartData = {
                        labels: @json($paymentSums->pluck('paymentProvider')),
                        datasets: [{
                            label: 'Total Revenue',
                            data: @json($paymentSums->pluck('totalSum')),
                            backgroundColor: [gradient1, gradient2, gradient3, gradient4],
                            borderRadius: 10,
                            barThickness: 40
                        }]
                    };

                    const chartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: true },
                            tooltip: {
                                backgroundColor: '#111',
                                titleColor: '#fff',
                                bodyColor: '#fff',
                                callbacks: {
                                    label: function(context) {
                                        let value = context.raw.toLocaleString();
                                        return `₦ ${value}`;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { color: '#6c757d', font: { weight: 'bold' } }
                            },
                            y: {
                                beginAtZero: true,
                                grid: { color: '#f0f0f0' },
                                ticks: {
                                    color: '#6c757d',
                                    callback: function(value) {
                                        return '₦' + value.toLocaleString();
                                    }
                                }
                            }
                        }
                    };

                    // Initialize chart
                    let paymentChart = new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: chartOptions
                    });

                    // Handle chart type change
                    document.getElementById('chartTypeSelector').addEventListener('change', function(e) {
                        const newType = e.target.value;
                        paymentChart.destroy(); // destroy old chart
                        paymentChart = new Chart(ctx, {
                            type: newType,
                            data: chartData,
                            options: chartOptions
                        });
                    });
                </script>
            @endif
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