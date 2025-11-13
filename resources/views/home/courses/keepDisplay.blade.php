@php $title = "View Courses"; $segments = Request::segments();  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('course.index') }}" title="View all Courses">View all Courses</a></li>
            </ol>
        </nav>
    </div>
    @include('layouts.alert')
    
    <div class="card-body" style="background-color:#f8f9fa;">
        <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
            <h4 style="font-weight:600;">Lets start learning</h4>
            <a href="#" style="text-decoration:none; color:#007bff; font-weight:500;">My learning</a>
        </div>

        <div class="row">
            @foreach ($program as $k => $view)
                
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm" style="border-radius:12px;">
                            <div class="card-body d-flex flex-column" style="padding:1.25rem;">
                                <div class="d-flex align-items-center mb-3">
                                    <div style="width:40px; height:40px; background-color:#007bff; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                                        <i class="ri-play-fill text-white fs-5"></i>
                                    </div>
                                    <h6 class="ms-3 mb-0" style="font-weight:600;">{{ $view->program_name }}</h6>
                                </div>
                                @foreach ($view->courses as $k => $vew)
                                <p style="margin-bottom:4px; font-size:0.95rem; color:#555;">
                                    {{ $vew->course_name }}
                                </p>
                                <small style="color:#888;">Duration: {{ $vew->duration ?? 'N/A' }}</small>
                                <small style="color:#888;">Course Price: {{ number_format($vew->course_price,2) ?? 'N/A' }}</small>
                                @endforeach
                            </div>
                        </div>
                    </div>
                
            @endforeach
        </div>
    </div>


</x-app-layout>
