<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="shortcut icon" href="{{ asset('elsAdmin/images/els.png')}}" />
        <link href="{{ asset('elsAdmin/css/remi.css')}}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('elsAdmin/fonts/remix/remixicon.css')}}" />
        <link rel="stylesheet" href="{{ asset('elsAdmin/css/main.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('elsAdmin/vendor/overlay-scroll/OverlayScrollbars.min.css')}}" />
        <link rel="stylesheet" href="{{ asset('elsAdmin/vendor/daterange/daterange.css')}}" />

        {{-- <link rel="stylesheet" href="{{ asset('elsAdmin/vendor/datatables/dataTables.bs5.css')}}">
        <link rel="stylesheet" href="{{ asset('elsAdmin/vendor/datatables/dataTables.bs5-custom.css')}}">
        <link rel="stylesheet" href="{{ asset('elsAdmin/vendor/datatables/buttons/dataTables.bs5-custom.css')}}"> --}}

        <link href="{{ asset('elsAdmin/vendor/select2/select2.min.css')}}" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
   
    <div class="page-wrapper">

      <!-- Main container starts -->
      <div class="main-container">
        @include('layouts.navigation')
        <div class="app-container">
          <div class="app-header d-flex align-items-center">

            <!-- Toggle buttons starts -->
            <div class="d-flex align-items-center">
              <button type="button" class="toggle-sidebar" aria-label="Toggle sidebar menu">
                <i class="ri-menu-line lh-1"></i>
              </button>

              <div class="app-brand-sm d-flex align-items-center">
                <a href="index.html" class="d-lg-none d-md-block">
                  <img src="assets/images/logo.svg" class="logo" alt="Bootstrap Gallery" />
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
                    <span>{{ Auth::user()->first_name . ' '. Auth::user()->last_name}}</span>
                  </div>
                  <div class="avatar-box">{{ strtoupper(substr(Auth::user()->first_name, 0, 1) . substr(Auth::user()->last_name, 0, 1)) }}<span class="status busy"></span></div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md shadow-lg">
                  <div class="header-action-links mx-3 gap-2">
                    <a class="dropdown-item py-2" href="profile.html"><i
                        class="ri-user-line text-primary"></i>Profile</a>
                    <a class="dropdown-item py-2" href="settings.html"><i
                        class="ri-settings-3-line text-primary"></i>Settings</a>
                    <a class="dropdown-item py-2" href="widgets.html"><i
                        class="ri-apps-2-line text-primary"></i>Widgets</a>
                  </div>
                  <div class="mx-3 my-2 d-grid">
                    <a href="{{ route('signout')}}" class="btn btn-primary">Logout</a>
                  </div>
                </div>
              </div>
             
            </div>
           
          </div>
          <div class="app-body">
            {{ $slot }}
          </div>
      </div>

        <script src="{{ asset('elsAdmin/js/jquery.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/js/moment.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/daterange/daterange.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/daterange/custom-daterange.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/apex/apexcharts.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/apex/custom/overview/overview.js')}}"></script>
        {{-- <script src="{{ asset('elsAdmin/vendor/datatables/dataTables.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/datatables/custom/custom-datatables.js')}}"></script>

        <script src="{{ asset('elsAdmin/vendor/datatables/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/datatables/buttons/jszip.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/datatables/buttons/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/datatables/buttons/pdfmake.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/datatables/buttons/vfs_fonts.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/datatables/buttons/buttons.html5.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/datatables/buttons/buttons.print.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/datatables/buttons/buttons.colVis.min.js')}}"></script> --}}

        <script src="{{ asset('elsAdmin/vendor/select2/select2.min.js')}}"></script>
        <script src="{{ asset('elsAdmin/vendor/select2/select2-custom.js')}}"></script>

        <script src="{{ asset('elsAdmin/js/custom.js')}}"></script>

        <script src="{{ asset('elsAdmin/js/file-upload.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

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
              $('#basicExample-2').DataTable({
                  dom: 'Bfrtip',
                  buttons: [
                      'copy', 'csv', 'excel', 'pdf', 'print'
                  ]
              });
          });

          $(document).ready(function() {
            $('#basicExample').DataTable({
                lengthMenu: [10, 20, 30, 40, 50], // Sets the dropdown options
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
        </script>

    </body>
</html>
