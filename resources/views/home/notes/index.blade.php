@php $title =  "View Course Note"; $segments = Request::segments(); $number=1;  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                {{-- <li class="breadcrumb-item"><a href="{{ route('note.create',[$notes->courseSlug, $allocation->slug]) }}" title="Create {{ $segments[1]}}">Create New {{ $segments[1]}}</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">View {{ $segments[1]}} </li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')

    <div class="card mt-3">
        <div class="card-body bg-light">
            {{-- Header --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-primary fw-bold mb-0">
                    {{ $course->course_name }} Notes
                </h4>
                <a href="{{ route('myCourses') }}" class="btn btn-outline-primary rounded-pill px-4">
                    <i class="bi bi-pencil-square me-2"></i> My Learning
                </a>
            </div>

            {{-- Notes Grid --}}
            <div class="row">
                @foreach ($notes as $note)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden note-card">
                            <div class="card-body d-flex flex-column p-4">

                                {{-- Topic + Icon --}}
                                <a href="{{ route('note.viewLearning', [$note->slug, $note->courseSlug]) }}" class="text-decoration-none">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="rounded-circle bg-danger d-flex align-items-center justify-content-center flex-shrink-0" style="width:52px; height:52px;">
                                            <i class="ri-play-fill text-white fs-4"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="fw-semibold text-dark mb-1">{{ $note->topic }}</h6>
                                            <small class="text-muted">
                                                {{ $note->materials->count() ?? 0 }} Reference Materials
                                            </small>
                                        </div>
                                    </div>
                                </a>

                                {{-- Author --}}
                                <p class="mb-3 text-muted small">
                                    <strong>Author:</strong>
                                    @if($note->allocation)
                                        {{ $note->allocation->user->first_name . ' ' . $note->allocation->user->last_name ?? 'ELS-ADMIN' }}
                                    @else
                                        ELS Tutor
                                    @endif
                                </p>

                                {{-- Assignments & Tasks --}}
                                <div class="mt-auto d-flex flex-wrap gap-2">
                                    <span class="badge bg-info text-white px-3 py-2 rounded-pill shadow-sm">
                                        📝 5 Assignments
                                    </span>
                                    <span class="badge bg-success text-white px-3 py-2 rounded-pill shadow-sm">
                                        ✅ 10 Tasks
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>