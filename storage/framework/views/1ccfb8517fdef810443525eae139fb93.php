<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
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
    <link rel="shortcut icon" href="<?php echo e(asset('elsAdmin/images/els-inc.png')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('elsAdmin/auth-access/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('elsAdmin/auth-access/main.css')); ?>">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="login-bg font-sans text-gray-900 antialiased">
    
  
      

      
    
    <main>
        <?php echo e($slot); ?>

    </main>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/layouts/guest.blade.php ENDPATH**/ ?>