<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Notification</title>
</head>
<body style="margin:0; padding:0; width:100%; background-color:#f4f6f8; font-family: 'Segoe UI', Arial, sans-serif;">

    <!-- Header -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="background-color:#f4f6f8; padding:30px 0;">
        <tr>
            <td align="center">
                <table width="600" cellspacing="0" cellpadding="0" border="0" role="presentation" style="background-color:#ffffff; border-radius:8px 8px 0 0; padding:20px;">
                    <tr>
                        <td align="center">
                            <img src="{{ asset('elsAdmin/auth-access/els-logo.png')}}" width="150" alt="ELS Logo" style="display:block; border:0; outline:none; text-decoration:none; height:auto;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <!-- Content -->
    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="background-color:#f4f6f8;">
        <tr>
            <td align="center">
                <table width="600" cellspacing="0" cellpadding="0" border="0" role="presentation" style="background-color:#ffffff; border-radius:0 0 8px 8px; padding:30px;">
                    <tr>
                        <td style="color:#333333; font-size:14px; line-height:22px;">
                            <p style="margin:0 0 15px; font-size:16px; color:#203864;">
                                Dear <strong>Admin</strong>,
                            </p>

                            <p style="margin:0 0 15px; font-size:14px; color:#203864;">
                                You have received a new message from the website. <br><br>
                                <strong>Full Name:</strong> {{ $details['full_name'] ?? '' }} <br>
                                <strong>Email Address:</strong> {{ $details['email'] ?? '' }} <br>
                                <strong>Phone Number:</strong> {{ $details['phone_number'] ?? '' }} <br>
                                <strong>Subject:</strong> {{ $details['subject'] ?? '' }}
                            </p>

                            <p style="margin:0 0 20px; font-size:14px; color:#203864; line-height:22px;">
                                {{ $details['message'] ?? '' }}
                            </p>

                            <p style="margin:0; font-size:13px; color:#555555;">
                                Best Regards, <br>
                                <strong>Expert Link Solutions</strong><br>
                                <span style="color:#203864;">Phone:</span> +234 906 279 9872 | +234 803 583 5382 | +234 912 369 2756 <br>
                                <span style="color:#203864;">Email:</span> 
                                <a href="mailto:support@expertlinksolutions.org" style="color:#2F5496; text-decoration:none;">
                                    support@expertlinksolutions.org
                                </a>
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>
</html>