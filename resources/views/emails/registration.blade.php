<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
      body {
        margin: 0;
        padding: 0;
        background: #f9fafb;
        font-family: 'Inter', Arial, sans-serif;
        color: #374151;
      }
      .email-container {
        max-width: 640px;
        margin: 40px auto;
        background: #ffffff;
        padding: 48px 36px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
      }
      .logo {
        display: block;
        margin: 0 auto 32px;
      }
      h2 {
        font-size: 28px;
        font-weight: 700;
        color: #111827;
        text-align: center;
        margin-bottom: 24px;
      }
      .greeting {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 12px;
      }
      .message {
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 32px;
      }
      .cta-button {
        background: linear-gradient(90deg, #2563eb, #1d4ed8);
        color: #ffffff;
        text-decoration: none;
        padding: 14px 32px;
        border-radius: 8px;
        font-weight: 600;
        display: inline-block;
        transition: background 0.3s ease;
      }
      .cta-button:hover {
        background: linear-gradient(90deg, #1d4ed8, #1e40af);
      }
      .support {
        font-size: 14px;
        margin-top: 28px;
        color: #6b7280;
      }
      .support a {
        color: #2563eb;
        text-decoration: none;
        font-weight: 600;
      }
      .social-icons {
        margin-top: 24px;
        text-align: center;
      }
      .social-icons a {
        display: inline-block;
        margin: 0 6px;
      }
      .social-icons img {
        width: 28px;
        height: 28px;
        filter: grayscale(100%);
        transition: filter 0.3s ease;
      }
      .social-icons img:hover {
        filter: none;
      }
      .footer {
        font-size: 13px;
        color: #9ca3af;
        margin-top: 40px;
        text-align: center;
      }
      .footer a {
        color: #374151;
        font-weight: 600;
        text-decoration: none;
      }
      hr {
        border: none;
        height: 1px;
        background: #e5e7eb;
        margin: 32px 0;
      }

      /* 🌙 Dark Mode Support */
      @media (prefers-color-scheme: dark) {
        body {
          background: #111827;
          color: #e5e7eb;
        }
        .email-container {
          background: #1f2937;
          box-shadow: 0 8px 24px rgba(0,0,0,0.6);
        }
        h2 {
          color: #f9fafb;
        }
        .greeting {
          color: #f3f4f6;
        }
        .message {
          color: #d1d5db;
        }
        .cta-button {
          background: linear-gradient(90deg, #3b82f6, #2563eb);
        }
        .cta-button:hover {
          background: linear-gradient(90deg, #2563eb, #1d4ed8);
        }
        .support {
          color: #9ca3af;
        }
        .support a {
          color: #3b82f6;
        }
        .footer {
          color: #6b7280;
        }
        .footer a {
          color: #f9fafb;
        }
        hr {
          background: #374151;
        }
      }
    </style>
  </head>
  <body>

    <div style="display: none;">Welcome to {{ config('app.name') }} — your account is ready!</div>

    <div class="email-container">

      <a href="{{ route('login') }}">
        <img src="{{ asset('elsAdmin/auth-access/els-logo.png')}}" height="80" alt="Logo" class="logo">
      </a>

      <h2>🎉 Welcome to {{ config('app.name') }} Portal</h2>

      <p class="greeting">Hi {{ $user->first_name }} {{ $user->last_name }},</p>

      <p class="message">
        We’re thrilled to have you on board!<br>
        Your account has been created as a <strong>{{ $user->role }}</strong>.<br>
        Login username: <strong>{{ $user->email }}</strong><br><br>
        To get started, please reset your password using the button below:
      </p>

      <div style="text-align: center;">
        <a href="{{ route('password.request') }}" target="_blank" class="cta-button">Reset Password</a>
      </div>

      <div class="support">
        <p>
          Need help? Reach out to our support team:<br>
          <a href="mailto:info@expertlinksolutions.org">info@expertlinksolutions.org</a> or call <strong>+234 813 813 9333</strong>.
        </p>
      </div>

      <div class="social-icons">
        <a href="https://facebook.com"><img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook"></a>
        <a href="https://twitter.com"><img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter"></a>
        <a href="https://linkedin.com"><img src="https://cdn-icons-png.flaticon.com/512/733/733561.png" alt="LinkedIn"></a>
        <a href="https://instagram.com"><img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram"></a>
      </div>

      <div class="footer">
        <hr>
        &copy; {{ date('Y') }} <a href="{{ route('website') }}">{{ config('app.name') }}</a> — All Rights Reserved.
      </div>

    </div>
  </body>
</html>