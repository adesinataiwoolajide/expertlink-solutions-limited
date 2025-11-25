<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
</head>
<body style="margin:0; padding:0; width:100%; background-color:#f4f6f8; font-family: Arial, sans-serif;">

    <!-- Invoice Container -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="background-color:#f4f6f8; padding:20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellspacing="0" cellpadding="0" border="0" role="presentation" style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.1);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="padding:20px; background-color:#203864; color:#ffffff;">
                            <table width="100%">
                                <tr>
                                    <td align="left" style="vertical-align:middle;">
                                        <img src="{{ asset('elsAdmin/images/els.png')}}" alt="Company Logo" width="80" height="80" style="display:block; border:0; outline:none; text-decoration:none;">
                                    </td>
                                    <td align="right" style="vertical-align:middle; text-align:right;">
                                        <h2 style="margin:0; font-size:18px; color:#ffffff;">Invoice #{{ $payment->paymentReference }}</h2>
                                        <p style="margin:0; font-size:12px; color:#dbe5ea;">Issued on {{ $payment->created_at->format('d M, Y') }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Payment & User Details -->
                    <tr>
                        <td style="padding:20px;">
                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                <tr>
                                    <!-- Payment Details -->
                                    <td width="50%" style="vertical-align:top; padding-right:10px;">
                                        <h3 style="margin:0 0 10px; font-size:14px; border-bottom:1px solid #ddd; padding-bottom:5px;">Payment Details</h3>
                                        <p style="margin:4px 0; font-size:13px;"><strong>Total Amount:</strong> {{ $payment->currencyCode }} {{ number_format($payment->totalAmount, 2) }}</p>
                                        {{-- <p style="margin:4px 0; font-size:13px;"><strong>Description:</strong> {{ $payment->paymentDescription }}</p> --}}
                                        <p style="margin:4px 0; font-size:13px;"><strong>Transaction Ref:</strong> {{ $payment->transactionReference }}</p>
                                        <p style="margin:4px 0; font-size:13px;"><strong>Method:</strong> {{ $payment->paymentMethod }}</p>
                                        <p style="margin:4px 0; font-size:13px;"><strong>Provider:</strong> {{ $payment->paymentProvider }}</p>
                                        <p style="margin:4px 0; font-size:13px;"><strong>Status:</strong> {{ ucfirst($payment->paymentStatus) }}</p>
                                    </td>

                                    <!-- User Details -->
                                    <td width="50%" style="vertical-align:top; padding-left:10px;">
                                        <h3 style="margin:0 0 10px; font-size:14px; border-bottom:1px solid #ddd; padding-bottom:5px;">User Details</h3>
                                        <p style="margin:4px 0; font-size:13px;"><strong>Name:</strong> {{ $payment->user?->first_name }} {{ $payment->user?->last_name }}</p>
                                        <p style="margin:4px 0; font-size:13px;"><strong>Email:</strong> {{ $payment->user?->email }}</p>
                                        <p style="margin:4px 0; font-size:13px;"><strong>Phone:</strong> {{ $payment->user?->phone_number }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Course Subscriptions -->
                    <tr>
                        <td style="padding:20px;">
                            <h3 style="margin:0 0 10px; font-size:14px; border-bottom:1px solid #ddd; padding-bottom:5px;">Course Subscriptions</h3>
                            <table width="100%" cellspacing="0" cellpadding="6" border="1" style="border-collapse:collapse; font-size:13px; border-color:#ddd;">
                                <thead style="background-color:#f4f6f8;">
                                    <tr>
                                        <th align="left">S/N</th>
                                        <th align="left">Course Title</th>
                                        <th align="left">Program</th>
                                        <th align="left">Amount</th>
                                        <th align="left">Subscription Date</th>
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
                                            <td colspan="5" align="center" style="color:#999;">No subscriptions linked to this payment.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <!-- Summary -->
                    <tr>
                        <td style="padding:20px;">
                            <table width="100%">
                                <tr>
                                    <td align="left" style="font-size:13px; font-weight:bold;">Total Courses: {{ $payment->courseSubscriptions->count() }}</td>
                                    <td align="right" style="font-size:13px; font-weight:bold;">Grand Total: {{ $payment->currencyCode }} {{ number_format($payment->totalAmount, 2) }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px; text-align:center; border-top:1px solid #ddd; font-size:12px; color:#555;">
                            <p style="margin:0; font-weight:bold;">Expert Link Solutions Limited</p>
                            <p style="margin:0;">123 Business Street, Lagos, Nigeria</p>
                            <p style="margin:0;">Phone: +234 8138 139 333 | Email: support@expertlinksolutions.com</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>