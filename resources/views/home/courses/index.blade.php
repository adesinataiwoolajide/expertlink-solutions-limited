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

    div class="col-sm-12 col-12 mt-2">
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
                                    <th>👤 Instructor</th>
                                    <th>🎓 Program</th>
                                    <th>💰 Price (₦)</th>
                                    <th>⚙️ Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @php $num =1; @endphp
                                @foreach($courses as $course)
                                    @php 
                                         if(!$course->program){
                                            $program_name= "NIL"; 
                                        }else{
                                            $program_name = $course->program->program_name;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $num++ }}</td>
                                        <td>{{ $course->course_name }}</td>
                                        <td>
                                            @if($course->user && isset($course->user->name))
                                                <span class="badge bg-success text-white">{{ $course->user->name }}</span>
                                            @else
                                                <span class="badge bg-danger text-white">Unassigned</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($course->program)
                                                <span class="badge bg-dark text-white">{{ $course->program->program_name }}</span>
                                            @else
                                                <span class="badge bg-warning text-white">{{ $course->programSlug }}</span>
                                            @endif
                                        </td>

                                        <td>{{ number_format($course->course_price) }}</td>
                                        <td>
                                            <a href="{{ route('course.show', $course->slug) }}" class="btn btn-sm btn-info text-white">View</a>
                                            <a href="{{ route('course.edit', $course->slug) }}" class="btn btn-sm btn-primary text-white">Edit</a>
                                        </td>
                                    </tr>
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