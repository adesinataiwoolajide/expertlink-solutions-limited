<!DOCTYPE html>
<html>
  
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta http-content='IE=Edge' http-equiv='X-UA-Compatible'>
        <meta content='width=device-width,initial-scale=1.0,user-scalable=no' name='viewport'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="asset_host" content="">
        <title>{{ config('app.name', '') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" media="screen" href="{{ asset('lect-sidebar/bootstrap.css') }}" data-turbolinks-track="true" />
        <link href="{{ asset('lect-sidebar/basebbdc.css')}}" rel="stylesheet" data-turbolinks-track="true"></link>
        
        <style type="text/css">
            .video-container {
                max-width: 1300px;       /* limit width */
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
        
        <script src="{{ asset('lect-sidebar/student-globals.js') }}"></script>
        <script src="{{ asset('lect-sidebar/student-legacy.js') }}"></script>
        <script src="{{ asset('lect-sidebar/student.js') }}"></script>

    </head>
    <body data-no-turbolink="true" class="revamped_lecture_player">
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
        <header class='full-width half-height is-not-signed-in'>
            <div class='lecture-left'>
                <a class='nav-icon-back' aria-label='Back to course curriculum' data-no-turbolink="true" role='button' href='{{ route('dashboard') }}'>
                    <svg width="24" height="24" title="Back to course curriculum">
                        <use xlink:href="#icon__Home"></use>
                    </svg>
                </a>
            
                <a class="nav-icon-list show-xs hidden-sm hidden-md hidden-lg collapsed" aria-label='Course Sidebar' role="button" data-toggle="collapse" href="#courseSidebar" aria-expanded="false" aria-controls="courseSidebar">
                    <svg width="24" height="24" title="Course Sidebar">
                        <use xlink:href="#icon__FormatListBulleted"></use>
                    </svg>
                </a>
            </div>
        </header>
        <section class="lecture-page-layout">
            <div role="navigation" class='course-sidebar lecture-page navbar-collapse navbar-sidebar-collapse' id='courseSidebar'>
                
                <div style="width:100%; background:#fff; border:1px solid #ddd; border-radius:10px; padding:20px; box-shadow:0 4px 12px rgba(0,0,0,0.08);" class="lecture-sidebar">

                    <!-- Sidebar Header -->
                    <div style="margin-bottom:20px; text-align:center; border-bottom:1px solid #eee; padding-bottom:10px;">
                        <h3 style="font-size:1.2rem; font-weight:bold; color:#1982c4; margin:0;">📚 Course Navigation</h3>
                    </div>

                   
                    <div style="margin-bottom:15px; padding:12px; border-radius:8px; background:linear-gradient(90deg,#dddad9 20%,#1982c4 80%); font-weight:600; font-size:1rem; color:#000;">
                        
                        <a href="{{ route('dashboard') }}" style="color:#000; text-decoration:none; transition:all 0.3s;"
                            onmouseover="this.style.textDecoration='underline';"  onmouseout="this.style.textDecoration='none';">
                            📊 Dashboard
                        </a>
                    </div>


                    <div style="margin-bottom:15px; padding:12px; border-radius:8px; background:linear-gradient(90deg,#dddad9 20%,#1982c4 80%); font-weight:600; font-size:1rem; color:#000;">
                        
                        <a href="{{ route('myCourses') }}" style="color:#000; text-decoration:none; transition:all 0.3s;"
                            onmouseover="this.style.textDecoration='underline';"  onmouseout="this.style.textDecoration='none';">
                            🎓 My Courses
                        </a>
                    </div>

                    @if(Auth::user()->hasAnyRole(['Student', 'Administrator', 'Admin']))
                        
                        <div style="margin-bottom:15px; padding:12px; border-radius:8px; background:linear-gradient(90deg,#dddad9 20%,#1982c4 80%); font-weight:600; font-size:1rem; color:#000;">
                            <span style="vertical-align:middle; margin-right:6px;">
                                <svg width="20" height="20">
                                    <use xlink:href="#icon__Subject"></use>
                                </svg>
                            </span>
                            <a href="{{ route('startLearning',$course->slug) }}"
                            style="color:#000; text-decoration:none; transition:all 0.3s;"
                            onmouseover="this.style.textDecoration='underline';"
                            onmouseout="this.style.textDecoration='none';">
                                {{ $course->program->program_name }}
                            </a>
                        </div>

                        <ul style="list-style:none; padding:0; margin:0;">
                            @foreach($course->notes as $note)
                                @php
                                    $isActive = request()->routeIs('note.viewLearning')  && request()->route('slug') == $note->slug;
                                @endphp
                                <div style="margin-bottom:15px; padding:12px; border-radius:8px; background:linear-gradient(90deg,#dddad9 20%,#1982c4 80%); font-weight:600; font-size:1rem; color:#000;">
                                    <span style="vertical-align:middle; margin-right:6px;">
                                        <svg width="20" height="20">
                                            <use xlink:href="#icon__Subject"></use>
                                        </svg>
                                    </span>
                                    <a href="{{ route('note.viewLearning', [$note->slug, $note->courseSlug]) }}" style="color:#000; text-decoration:none; transition:all 0.3s;"
                                        onmouseover="this.style.textDecoration='underline';"  onmouseout="this.style.textDecoration='none';">
                                        {!! wordwrap($note->topic,34,"<br>\n". '<span style="padding-left: 25px;">') !!}
                                    </a>
                                </div>
                              
                            @endforeach
                        </ul>
                    @endif

                    <div style="margin-bottom:15px; padding:12px; border-radius:8px; background:linear-gradient(90deg,#dddad9 20%,#1982c4 80%); font-weight:600; font-size:1rem; color:#000;">
                        
                        <a href="{{ route('signout') }}" style="color:#000; text-decoration:none; transition:all 0.3s;"
                            onmouseover="this.style.textDecoration='underline';"  onmouseout="this.style.textDecoration='none';">
                            📊 Logout
                        </a>
                    </div>
                </div>
            </div>
            <div class="course-mainbar lecture-content full-width-content">
                @yield('content')
            </div>


        </section>
        
    </body>
</html>