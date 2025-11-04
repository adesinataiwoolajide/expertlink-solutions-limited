@php $title = "Course Allocations"; $segments = Request::segments(); $number=1;  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">View All {{ $segments[1]}}</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">List of Course Allocations</h5>
            </div>
            <div class="card-body">
                <div class="row gx-3">
                    <div class="table-responsive">
                        <table id="basicExample" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Instructor Details</th>
                                    <th>Course Name</th>
                                    <th>Program Name</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($allocations as $index => $allocation)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            {{ $allocation->user->first_name ?? 'N/A' }}
                                            {{ $allocation->user->last_name ?? '' }}
                                            <br><small class="text-muted">{{ $allocation->user->email }}</small>
                                        </td>
                                        <td>
                                            {{ $allocation->course->course_name ?? 'N/A' }}
                                            <br> <a href="{{ route('course.show', $allocation->courseSlug) }}" class="btn btn-sm btn-primary text-white">View Course</a>
                                        </td>
                                        <td>
                                            {{ $allocation->program->program_namename ?? 'N/A' }}
                                        </td>
                                        <td>
                                            {{ $allocation->created_at ?? 'N/A' }}
                                            <br> <a href="{{ route('allocation.view', $allocation->slug) }}" class="btn btn-sm btn-info text-white">View Allocation</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No allocations found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
