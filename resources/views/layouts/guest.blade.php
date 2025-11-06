<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta name="author" content="Glorious Empire Technologies">
    <link rel="canonical" href="https://gloriousempiretech.com/">
    <meta property="og:url" content="https://gloriousempiretech.com/">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Glorious Empire Technologies">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Glorious Empire Technologies">
    <link rel="shortcut icon" href="{{ asset('elsAdmin/auth-access/favicon.svg')}}">
    <link rel="stylesheet" href="{{ asset('elsAdmin/auth-access/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('elsAdmin/auth-access/main.css')}}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="login-bg font-sans text-gray-900 antialiased" oncontextmenu="return false">
    
      <div id="rightClickError" class="alert alert-danger text-center" style="display:none; position:fixed; top:20px; left:50%; transform:translateX(-50%); z-index:9999;">
        ⚠️ Right-click is disabled on this site.
      </div>

      <script>
        document.addEventListener('contextmenu', function (e) {
          e.preventDefault();
          const errorBox = document.getElementById('rightClickError');
          errorBox.style.display = 'block';
          setTimeout(() => {
            errorBox.style.display = 'none';
          }, 3000); // hides after 3 seconds
        });
      </script>
    
    <main>
        {{ $slot }}
    </main>
</body>
</html>
