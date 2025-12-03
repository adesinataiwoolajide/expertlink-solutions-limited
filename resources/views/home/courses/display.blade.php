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
    
    <div class="card-body mt-3" style="background-color:#f8f9fa;">
        <div class="d-flex justify-content-between align-items-center mb-4 mt-3">
            <h4 style="font-weight:600;">Lets start learning</h4>
            <a href="{{ route('myCourses') }}" style="text-decoration:none; color:#007bff; font-weight:500;">My learning</a>
        </div>

        <div class="row">
            @foreach ($program as $k => $view)
                <div class="col-md-3 mb-4">
                    @if(count($view->courses) > 0)
                        <a href="{{ route('course.learning',$view->slug) }}" style="text-decoration: none;">
                    @else
                        <div style="pointer-events: none; opacity: 0.6; text-decoration: none;">
                    @endif

                        <div class="card shadow-sm" style="border-radius:12px;">
                            <div class="card-body d-flex flex-column" style="padding:1.25rem;">
                                <div class="d-flex align-items-center mb-3">
                                    <div style="width:40px; height:40px; background-color:#007bff; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                                        <i class="ri-play-fill text-white fs-5"></i>
                                    </div>
                                    <h6 class="ms-3 mb-0" style="font-weight:600; color:#333;">
                                        {{ $view->program_name }}<br>
                                        <small style="color:#666;">({{ count($view->courses) }} Courses)</small>
                                    </h6>
                                </div>

                                <!-- Ratings -->
                                <div class="mt-auto">
                                    <div class="d-flex align-items-center">
                                        @php
                                            $rating = 4.5;
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="ri-star-fill" style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }}; font-size:16px;"></i>
                                        @endfor
                                        <span class="ms-2" style="font-size:0.9rem; color:#555;">{{ number_format($rating, 1) }}/5</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @if(count($view->courses) > 0)
                        </a>
                    @else
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>


</x-app-layout>
