@php $title = "Create a user"; $segments = Request::segments();  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}" title="View all {{ $segments[1]}}">View all {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.create') }}" title="Create a {{ $segments[1]}}">Create a {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">View {{ ucwords($user->email) }} Profile</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')
    
</x-app-layout>