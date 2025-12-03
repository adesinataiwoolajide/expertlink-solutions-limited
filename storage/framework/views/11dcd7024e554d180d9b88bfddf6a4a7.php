<?php ini_set('max_execution_time', 12000); ?>
<?php
    $cartCount = count(session()->get('cart', []));
    $user = Auth::user();
?>
<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', '')); ?></title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="shortcut icon" href="<?php echo e(asset('elsAdmin/images/els-inc.png')); ?>" />
        <link href="<?php echo e(asset('elsAdmin/css/remi.css')); ?>" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('elsAdmin/fonts/remix/remixicon.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('elsAdmin/css/main.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('elsAdmin/vendor/overlay-scroll/OverlayScrollbars.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('elsAdmin/vendor/daterange/daterange.css')); ?>" />

        <link href="<?php echo e(asset('elsAdmin/vendor/select2/select2.min.css')); ?>" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <style type="text/css">
            .video-container {
                max-width: auto;       /* limit width */
                margin: 20px auto;      /* center horizontally */
                border-radius: 12px;    /* rounded corners */
                overflow: hidden;       /* ensures corners apply to iframe */
                box-shadow: 0 6px 18px rgba(0,0,0,0.25); /* soft shadow */
            }
            .video-container iframe {
                width: 100%;
                height: 450px;          /* adjust height as needed */
                border: none;           /* remove default border */
                display: block;
            }

            .pdf-container {
                max-width: 1300px;       /* limit width */
                margin: 20px auto;      /* center horizontally */
                border-radius: 12px;    /* rounded corners */
                overflow: hidden;       /* ensures corners apply to iframe */
                box-shadow: 0 6px 18px rgba(0,0,0,0.25); /* soft shadow */
            }
            .pdf-container iframe {
                width: 100%;
                height: 500px;          /* adjust height as needed */
                border: none;           /* remove default border */
                display: block;
            }
            .maliver, .btn:hover {
                background-color: #666;
                color: white;
            }
            .active-note {
                background-color: #e6f7ff !important;
                box-shadow: 0 3px 8px rgba(0,0,0,0.1);
                border-color: #1982c4;
                color: #1982c4;
            }

        </style>

        <link href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" rel="stylesheet">

        <script>
          // Set timeout to 2 minutes (120,000 ms)
          const inactivityTimeout = 60 * 60 * 1000; 
          const warningTime = 30 * 1000; // Show warning 30 seconds before redirect

          let timeoutId;
          let warningId;

          function redirectToLockScreen() {
              window.location.href = '/lock-screen';
          }

          function resetTimer() {
              clearTimeout(timeoutId);
              clearTimeout(warningId);
              timeoutId = setTimeout(redirectToLockScreen, inactivityTimeout);
          }

          // Reset timer on user activity
          ['mousemove', 'keydown', 'click', 'scroll', 'touchstart', 'touchmove', 'resize'].forEach(event => {
              window.addEventListener(event, resetTimer);
          });

          // Start timer immediately
          resetTimer();
        </script>

    </head>
    <body <?php echo e(Auth::user()->email == 'tolajide74@gmail.com' ? '' : 'oncontextmenu="return false"'); ?>>
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
          }, 5000); // hides after 3 seconds
        });

        document.addEventListener("DOMContentLoaded", function () {
          var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
          var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
              return new bootstrap.Tooltip(tooltipTriggerEl)
          })
      });
      </script> 
    <div class="page-wrapper">

      <!-- Main container starts -->
      <div class="main-container">
        <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <div class="app-container">
          <div class="app-header d-flex align-items-center">

            <!-- Toggle buttons starts -->
            <div class="d-flex align-items-center">
              <button type="button" class="toggle-sidebar" aria-label="Toggle sidebar menu">
                <i class="ri-menu-line lh-1"></i>
              </button>

              <div class="app-brand-sm d-flex align-items-center">
                <a href="index.html" class="d-lg-none d-md-block">
                  <img src="<?php echo e(asset('elsAdmin/auth-access/els-logo.png')); ?>" class="logo" alt="" style="width: 150px; height: 100px;" />
                </a>
              </div>
             
            </div>
            
            <div class="last-login d-lg-flex d-none">
              <i class="ri-time-line me-2 text-danger fs-5"></i> Last login at 2 hours ago.
            </div>

           
            <div class="header-actions">
              <div class="search-container d-lg-block d-none mx-3">
                <input id="globalSearch" type="text" class="form-control" placeholder="Search">
                <i class="ri-search-line"></i>
              </div>
              
              <div class="dropdown ms-3">
                <a id="userSettings" class="dropdown-toggle d-flex py-2 align-items-center" href="#!" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="me-2 d-lg-block d-none">
                    <span><?php echo e(Auth::user()->first_name . ' '. Auth::user()->last_name); ?></span>
                  </div>
                  <div class="avatar-box"><?php echo e(strtoupper(substr(Auth::user()->first_name, 0, 1) . substr(Auth::user()->last_name, 0, 1))); ?><span class="status busy"></span></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md shadow-lg">
                  <div class="header-action-links mx-3 gap-2">
                    
                    <?php if($cartCount > 0): ?>
                      <a class="dropdown-item py-2 position-relative" href="<?php echo e(route('cart.view')); ?>">
                        <i class="ri-shopping-cart-2-line text-primary"></i>My Cart
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php echo e($cartCount); ?>

                        </span>
                    </a>
                    <?php else: ?>
                      <a class="dropdown-item py-2" href="widgets.html"><i class="ri-shopping-cart-2-line text-primary"></i>Cart</a>
                    <?php endif; ?>
                    <a class="dropdown-item py-2" href="<?php echo e(route('user.show', Auth::user()->slug)); ?>"><i class="ri-user-line text-primary"></i>Profile</a>
                    
                    <?php if($user->hasAnyRole(['Administrator', 'Admin', 'Instructor'])): ?>
                        <a class="dropdown-item py-2" href="<?php echo e(route('course.index')); ?>">
                            <i class="ri-book-2-line text-primary"></i>
                            <span>Courses</span>
                        </a>
                    <?php elseif($user->hasRole('Student')): ?>
                        <a class="dropdown-item py-2" href="<?php echo e(route('myCourses')); ?>">
                            <i class="ri-graduation-cap-line text-primary"></i>
                            <span>My Courses</span>
                        </a>
                    <?php endif; ?>

                  </div>
                  <div class="mx-3 my-2 d-grid">
                    <a href="<?php echo e(route('signout')); ?>" class="btn btn-primary">Logout</a>
                  </div>
                </div>
              </div>
             
            </div>
           
          </div>
          <div class="app-body">
            <?php echo e($slot); ?>

          </div>
      </div>

        <script src="<?php echo e(asset('elsAdmin/js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elsAdmin/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elsAdmin/js/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elsAdmin/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')); ?>"></script>
        <script src="<?php echo e(asset('elsAdmin/vendor/overlay-scroll/custom-scrollbar.js')); ?>"></script>
        <script src="<?php echo e(asset('elsAdmin/vendor/daterange/daterange.js')); ?>"></script>
        <script src="<?php echo e(asset('elsAdmin/vendor/daterange/custom-daterange.js')); ?>"></script>
       
        

        <script src="<?php echo e(asset('elsAdmin/js/custom.js')); ?>"></script>

        <script src="<?php echo e(asset('elsAdmin/js/file-upload.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <!-- Buttons Extension -->
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>

        <!-- JSZip and pdfmake for export -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

        <!-- Initialize Select2 -->
        <script>
            $(document).ready(function() {
                $('#multiSelect').select2({
                    placeholder: "Select an option",
                    tags: true,
                    width: '100%'
                });
            });

             $(document).ready(function() {
                $('#courseTechSelect').select2({
                    placeholder: "Select an option",
                    tags: true,
                    width: '100%'
                });
            });
       
          $(document).ready(function() {
              $('#basicExample-2').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              });
          });

          $(document).ready(function() {
            $('#basicExample').DataTable({
                lengthMenu: [10, 20, 30, 40, 50, 100], // Sets the dropdown options
                pageLength: 10, // Default number of rows per page
                dom: 'lfrtip' // Removes export buttons, keeps length filter, search, pagination
            });
          });

         
          $(document).ready(function() {
            $('.summernote').summernote({
              placeholder: 'Start typing the contents here...',
              tabsize: 2,
              height: 200
            });
          });

           $(document).ready(function() {
            $('.summernote2').summernote({
              placeholder: 'Start typing the contents here...',
              tabsize: 2,
              height: 400
            });
          });
        </script>

    </body>
</html>
<?php /**PATH C:\xampp\htdocs\expertlink_solutions\resources\views/layouts/app.blade.php ENDPATH**/ ?>