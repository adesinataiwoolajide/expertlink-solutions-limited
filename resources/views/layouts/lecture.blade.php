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

                    <!-- Dashboard -->
                    <div style="margin-bottom:12px;">
                        <a href="{{ route('dashboard') }}" target="_blank"
                        style="display:block; padding:12px; border-radius:8px; font-weight:600; font-size:1rem; color:#333; text-decoration:none; transition:all 0.3s;"
                        onmouseover="this.style.backgroundColor='#e6f0ff'; this.style.color='#1982c4';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#333';">
                            📊 Dashboard
                        </a>
                    </div>

                    <!-- My Courses -->
                    <div style="margin-bottom:12px;">
                        <a href="{{ route('myCourses') }}"
                        style="display:block; padding:12px; border-radius:8px; font-weight:600; font-size:1rem; color:#333; text-decoration:none; transition:all 0.3s;"
                        onmouseover="this.style.backgroundColor='#e6f0ff'; this.style.color='#1982c4';"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#333';">
                            🎓 My Courses
                        </a>
                    </div>

                    @if(Auth::user()->hasRole('Student'))
                        <!-- Program Name -->
                        <div style="margin-bottom:15px; padding:12px; border-radius:8px; background:linear-gradient(90deg,#dddad9 20%,#1982c4 80%); font-weight:600; font-size:1rem; color:#000;">
                            <span style="vertical-align:middle; margin-right:6px;">
                                <svg width="20" height="20">
                                    <use xlink:href="#icon__LockClock"></use>
                                </svg>
                            </span>
                            <a href="{{ route('startLearning',$course->slug) }}"
                            style="color:#000; text-decoration:none; transition:all 0.3s;"
                            onmouseover="this.style.textDecoration='underline';"
                            onmouseout="this.style.textDecoration='none';">
                                {{ $course->program->program_name }}
                            </a>
                        </div>

                        <!-- Notes Section -->
                        <div style="margin-bottom:12px; font-weight:600; font-size:1rem; color:#444;">
                            <span style="vertical-align:middle; margin-right:6px;">
                                <svg width="20" height="20">
                                    <use xlink:href="#icon__LockClock"></use>
                                </svg>
                            </span>
                            <i>
                                {!! wordwrap("List of Course Notes",43,"<br>\n". '<span style="padding-left: 30px;">') !!}
                            </i>
                        </div>

                        <!-- Notes List -->
                        <ul style="list-style:none; padding:0; margin:0;">
                            @foreach($course->notes as $note)
                                @php
                                    $isActive = request()->routeIs('note.viewLearning')  && request()->slug == $note->slug;
                                @endphp
                                <li style="margin-bottom:10px;">
                                    <a href="{{ route('note.viewLearning',[$note->slug,$note->courseSlug]) }}" class="{{ $isActive ? 'active-note' : '' }}"
                                    style="display:flex; align-items:center; padding:12px; border:1px solid #eee; border-radius:8px; background:#fafafa; text-decoration:none; color:#333; transition:all 0.3s;"
                                    onmouseover="this.style.backgroundColor='#f0f8ff'; this.style.boxShadow='0 3px 8px rgba(0,0,0,0.1)';"
                                    onmouseout="this.style.backgroundColor='{{ $isActive ? '#e6f7ff' : '#fafafa' }}'; this.style.boxShadow='none';">
                                        <span style="margin-right:10px; color:#1982c4;">
                                            <svg width="20" height="20">
                                                <use xlink:href="#icon__Subject"></use>
                                            </svg>
                                        </span>
                                        <span style="font-size:0.95rem; line-height:1.4;">
                                            {!! wordwrap($note->topic,34,"<br>\n". '<span style="padding-left: 25px;">') !!}
                                        </span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
            <div class="course-mainbar lecture-content full-width-content">
                @yield('content')
            </div>


        </section>
        
    </body>
</html>