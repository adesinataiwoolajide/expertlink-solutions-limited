@php $title = "View all courses"; $segments = Request::segments();  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('course.create') }}" title="Create {{ $segments[1]}}">Create a {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">View All {{ $segments[1]}}</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')

    <div class="col-sm-12 col-12 mt-2">
        @if(count($courses) > 0)
        
            <div class="card mb-3">
                
                <div class="card-body">
                    <!-- Table start -->
                    <div class="table-responsive">
                        <table id="basicExample" class="table custom-table">

                            <thead>
                               <tr>
                                    <th>#</th>
                                    <th>📘 Course Name</th>
                                    <th>👤 Created By</th>
                                    <th>👤 Instructor Name</th>
                                    <th>🎓 Program Name</th>
                                    <th class="text-center">💰 Course Price (₦)</th>
                                    <th class="text-center">📘 Course Notes</th>
                                    <th>⚙️ Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @php $num =1; @endphp
                                @foreach($courses as $course)
    @php 
        $program_name = $course->program->program_name ?? $course->programSlug ?? "NIL";
        $noteCount = $course->notes_count ?? $course->notes()->count(); // prefer withCount in controller
    @endphp

    {{-- Show row if allocated to current instructor OR user is Admin --}}
    @if(
        ($course->allocation && $course->allocation->user->slug == Auth::user()->slug) 
        || Auth::user()->hasAnyRole(['Administrator','Admin'])
    )
        <tr>
            <td>{{ $num++ }}</td>
            <td>{{ $course->course_name }}</td>

            {{-- Course owner email --}}
            <td>
                <span class="badge {{ $course->user && $course->user->email ? 'bg-success' : 'bg-info' }}">
                    {{ $course->user->email ?? 'NULL' }}
                </span>
            </td>

            {{-- Allocation --}}
            <td>
                @if($course->allocation)
                    <span class="badge bg-primary text-white">
                        Allocated To:<br>
                        {{ optional($course->allocation->user)->first_name }} {{ optional($course->allocation->user)->last_name }}
                    </span>
                @else
                    <span class="badge bg-danger text-white">Pending Allocation</span>
                @endif
            </td>

            {{-- Program --}}
            <td>
                <span class="badge bg-dark text-white">{{ $program_name }}</span>
            </td>

            {{-- Price --}}
            <td class="text-center">
                <span class="badge bg-secondary">{{ number_format($course->course_price,2) }}</span>
            </td>

            {{-- Notes --}}
            <td class="text-center">
                @if($noteCount > 0)
                    <a href="{{ route('course.note.index', ['courseSlug' => $course->slug]) }}">
                        <span class="badge bg-primary">View {{ $noteCount }} Course Notes</span>
                    </a>
                    @if(Auth::user()->hasAnyRole(['Administrator','Instructor']))
                        <br>
                        <a href="{{ route('note.create', [$course->slug, optional($course->allocation)->slug]) }}">
                            <span class="badge bg-success">Create a Note</span>
                        </a>
                    @endif
                @else
                    @if($course->allocation && Auth::user()->hasAnyRole(['Administrator','Instructor']))
                        <a href="{{ route('note.create', [$course->slug, $course->allocation->slug]) }}">
                            <span class="badge bg-success">Create a Note</span>
                        </a>
                    @else
                        <span class="badge bg-warning">No Notes Found</span>
                    @endif
                @endif
            </td>

            {{-- Actions --}}
            <td>
                <a href="{{ route('course.show', $course->slug) }}" class="btn btn-sm btn-info text-white">View</a>
                @if(Auth::user()->hasAnyRole(['Administrator','Admin']))
                    <a href="{{ route('course.edit', $course->slug) }}" class="btn btn-sm btn-primary text-white">Edit</a>
                @endif
            </td>
        </tr>
    @endif
@endforeach
                            </tbody>
                        </table>
                
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center">
                No course records found.
            </div>

        @endif
    </div>

</x-app-layout>