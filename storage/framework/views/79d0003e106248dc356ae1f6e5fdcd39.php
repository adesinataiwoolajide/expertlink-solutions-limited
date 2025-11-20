<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="shortcut icon" href="<?php echo e(asset('elsAdmin/images/els.png')); ?>" />
    <style>
      :root {
        --bg-light: #f8f9fa;
        --bg-dark: #212529;
        --card-light: #ffffff;
        --card-dark: #343a40;
        --text-light: #212529;
        --text-dark: #f8f9fa;
        --accent: #dc3545;
        --button-bg: #007bff;
        --button-hover: #0056b3;
        --dark-blue: #00008B;

      }

      body {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: var(--bg-light);
        color: var(--text-light);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        transition: background-color 0.3s, color 0.3s;
      }

      .container {
        text-align: center;
        max-width: 500px;
        padding: 40px 30px;
        background-color: var(--card-light);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        animation: fadeIn 0.8s ease-in-out;
        transition: background-color 0.3s;
      }

      .icon {
        margin-bottom: 20px;
      }

      h1 {
        font-size: 56px;
        margin-bottom: 10px;
        color: var(--accent);
      }

      h2 {
        font-size: 26px;
        margin-bottom: 20px;
      }

      p {
        font-size: 17px;
        margin-bottom: 20px;
        line-height: 1.6;
      }

      .countdown {
        font-size: 16px;
        margin-bottom: 30px;
        color: #6c757d;
      }

      a.button {
        display: inline-block;
        padding: 14px 28px;
        background-color: var(--button-bg);
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        border-radius: 8px;
        transition: background-color 0.3s ease;
      }

      a.button:hover {
        background-color: var(--button-hover);
      }

       a.buttonError {
        display: inline-block;
        padding: 14px 28px;
         background-color: var(--dark-blue);
        color: white;

        text-decoration: none;
        font-weight: 600;
        border-radius: 8px;
        transition: background-color 0.3s ease;
      }

      a.buttonError:hover {
        background-color: var(--button-hover);
      }

      .toggle {
        margin-top: 20px;
        font-size: 14px;
        cursor: pointer;
        color: #007bff;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(20px);
        }
        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      body.dark {
        background-color: var(--bg-dark);
        color: var(--text-dark);
      }

      body.dark .container {
        background-color: var(--card-dark);
      }

      body.dark .toggle {
        color: #66b2ff;
      }
    </style>
</head>
<body oncontextmenu="return false">
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
    <div class="container">
        
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <script>
      function toggleDarkMode() {
        document.body.classList.toggle('dark');
      }
  </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/layouts/errors.blade.php ENDPATH**/ ?>