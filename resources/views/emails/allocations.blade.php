<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Course Allocation Notification</title>
</head>
<body style="margin:0; padding:0; width:100%; background-color:#f4f6f8; font-family: Arial, sans-serif;">

    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="background-color:#f4f6f8; padding:20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellspacing="0" cellpadding="0" border="0" role="presentation" style="background-color:#ffffff; border-radius:8px; overflow:hidden; box-shadow:0 2px 6px rgba(0,0,0,0.1);">

                    <!-- Header -->
                    <tr>
                        <td style="padding:20px; background-color:; color:#ffffff;">
                            <table width="100%">
                                <tr>
                                    <td align="left" style="vertical-align:middle;">
                                        <img src="{{ asset('elsAdmin/auth-access/els-logo.png')}}" alt="Company Logo" width="" height="80" style="display:block; border:0; outline:none; text-decoration:none;">
                                    </td>
                                    <td align="right" style="vertical-align:middle; text-align:right;">
                                        <h2 style="margin:0; font-size:18px; color:#ffffff;">Course Allocation</h2>
                                        <p style="margin:0; font-size:12px; color:#dbe5ea;">{{ now()->format('d M, Y') }}</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Greeting -->
                    <tr>
                        <td style="padding:20px; font-size:14px; color:#333;">
                            <p style="margin:0 0 15px;">Dear <strong>{{ $allocation->user?->first_name }} {{ $allocation->user?->last_name }}</strong>,</p>
                            <p style="margin:0 0 15px;">
                                We are pleased to inform you that a new course has been allocated to you. 
                                Below are the details of your allocation:
                            </p>
                        </td>
                    </tr>

                    <!-- Allocation Details -->
                    <tr>
                        <td style="padding:20px;">
                            <table width="100%" cellspacing="0" cellpadding="6" border="1" style="border-collapse:collapse; font-size:13px; border-color:#ddd;">
                                <tbody>
                                    <tr>
                                        <td style="font-weight:bold; width:30%;">Course Title:</td>
                                        <td>{{ $allocation->course?->course_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Program:</td>
                                        <td>{{ $allocation->program?->program_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Allocation Date:</td>
                                        <td>{{ $allocation->created_at->format('d M, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Total Students:</td>
                                        <td>{{ $allocation->course->total_student ?? 0 }}
                                            {{ ($allocation->course->total_student ?? 0) > 1 ? 'Students' : 'Student' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold;">Allocated By:</td>
                                        <td>Course Allocation Team</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding:20px; text-align:center;">
                            <a href="{{ route('login') }}" 
                            style="display:inline-block; background-color:#203864; color:#ffffff; 
                                    padding:12px 24px; font-size:14px; font-weight:bold; 
                                    text-decoration:none; border-radius:4px;">
                                Login to Your Account
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:20px; text-align:center; border-top:1px solid #ddd; font-size:12px; color:#555;">
                            <p style="margin:0; font-weight:bold;">Expert Link Solutions Limited</p>
                            <p style="margin:0;">123 Business Street, Lagos, Nigeria</p>
                            <p style="margin:0;">Phone: +234 8138 139 333 | Email: support@expertlinksolutions.org</p>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>
</html>