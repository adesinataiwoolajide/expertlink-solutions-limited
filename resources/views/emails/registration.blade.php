<!doctype html>
<html lang="en"
      xmlns="http://www.w3.org/1999/xhtml"
      xmlns:v="urn:schemas-microsoft-com:vml"
      xmlns:o="urn:schemas-microsoft-com:office:office">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <title>{{ config('app.name') }}</title>
  </head>
  <body style="margin:0; padding:0; background:#eeeeee;">

    <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      Invisable preheader text the text you put here helps towards an opened email.
    </div>

    <div style="display: none; font-size: 1px; line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
	    &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>

    <center>

    <div style="width:100%; max-width:600px; background:#ffffff; padding:30px 20px; text-align:left; font-family: 'Arial', sans-serif;">

      <a href="{{ route('login') }}">
        <img src="{{ asset('elsAdmin/images/els.png')}}" width="100" height="100" style="display:block; margin-bottom:30px;">
      </a>
      <img src="{{ asset('elsAdmin/images/els.png')}}" width="100" height="1" style="display:block; margin-bottom:30px;">

      <h2>Registration Notification</h2>
      <p style="font-size:16px; line-height:24px; color:#666666; margin-bottom:30px;">
          <h1 style="font-size:16px; line-height:22px; font-weight:normal; color:#333333;">
          Dear {{ $user->first_name }} {{ $user->last_name }},<br>
        </h1>
        Welcome aboard!
        Your account on {{ config('app.name') }} has been successfully set up as a <b>{{ $user->role }}</b>. 🎉 <br>
        Your login username is: <b>{{$user->email}}</b>
        To access your dashboard and get started, please click the link below:
      </p>

      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td>
            <table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td bgcolor="#556270"
                    style="padding: 12px 26px 12px 26px; border-radius:4px"
                    align="center">
                    <a href="{{ route('login') }}"
                       target="_blank"
                       style="font-family: 'Arial', sans-serif; font-size: 16px; font-weight: bold; color: #ffffff; text-decoration: none; display: inline-block;">
                         Click Here to Login
                    </a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td width="100%" height="30">&nbsp;</td>
        </tr>
      </table>

      <hr style="border:none; height:1px; color:#dddddd; background:#dddddd; width:100%; margin-bottom:20px;">

      <p style="font-size:12px; line-height:18px; color:#999999; margin-bottom:10px;">
        &copy; Copyright {{ date('Y') }}<br>
        <a href="{{ route('login') }}"
           style="font-size:12px; line-height:18px; color:#666666; font-weight:bold;">
           {{ config('app.name') }}</a>, <br>All Rights Reserved.
      </p>
    </div>

    </center>

  </body>
</html>
