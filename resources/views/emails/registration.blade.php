<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
      body {
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        font-family: 'Roboto', Arial, sans-serif;
      }
      .email-container {
        max-width: 600px;
        margin: 40px auto;
        background-color: #ffffff;
        padding: 40px 30px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        color: #333333;
        text-align: left;
      }
      .logo {
        display: block;
        margin-bottom: 30px;
      }
      h2 {
        font-size: 26px;
        color: #2c3e50;
        margin-bottom: 20px;
      }
      .greeting {
        font-size: 18px;
        margin-bottom: 10px;
      }
      .message {
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 30px;
      }
      .cta-button {
        background-color: #007BFF;
        color: #ffffff;
        text-decoration: none;
        padding: 14px 28px;
        border-radius: 6px;
        font-weight: bold;
        display: inline-block;
        margin-top: 10px;
      }
      .support {
        font-size: 14px;
        margin-top: 30px;
      }
      .support a {
        color: #007BFF;
        text-decoration: none;
        font-weight: bold;
      }
      .social-icons {
        margin-top: 20px;
      }
      .social-icons img {
        width: 28px;
        margin: 0 8px;
        vertical-align: middle;
      }
      .footer {
        font-size: 12px;
        color: #999999;
        margin-top: 40px;
      }
      .footer a {
        color: #666666;
        font-weight: bold;
        text-decoration: none;
      }
    </style>
  </head>
  <body>

    <div style="display: none;">Invisible preheader text to improve open rates.</div>

    <div class="email-container">

      <a href="{{ route('login') }}">
        <img src="{{ asset('elsAdmin/images/els.png') }}" width="150" height="100" alt="Logo" class="logo">
      </a>

      <h2 style="text-align: center;">🎉 Welcome to {{ config('app.name') }} Portal</h2>

      <p class="greeting">Dear {{ $user->first_name }} {{ $user->last_name }},</p>

      <p class="message">
        We are excited to have you join us!<br>
        Your account has been successfully created as a <strong>{{ $user->role }}</strong>.<br>
        Your login username is: <strong>{{ $user->email }}</strong><br>
        To access your dashboard and begin your journey, click the button below to reset your password:
      </p>

        <div style="text-align: center;">
            <a href="{{ route('password.request') }}" target="_blank" class="cta-button">Password Reset</a>
        
            <div class="support">
                <p>
                Need help? Contact our support team at<br>
                <a href="mailto:info@expertlinksolutions.org">info@expertlinksolutions.org</a> or call <strong>+234 813 813 9333</strong>.
                </p>
            </div>

            <div class="social-icons">
                <a href="https://facebook.com">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook">
                </a>
                <a href="https://twitter.com">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter">
                </a>
                <a href="https://linkedin.com">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733561.png" alt="LinkedIn">
                </a>
                <a href="https://instagram.com">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram">
                </a>
            </div>
        </div>
        
        <div class="footer" style="text-align: center;">
            <hr style="border:none; height:1px; background:#dddddd; margin:30px 0;">
            &copy; {{ date('Y') }} <a href="{{ route('login') }}">{{ config('app.name') }}</a> — All Rights Reserved.
        </div>

    </div>