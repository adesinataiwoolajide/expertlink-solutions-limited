@php $title = "View Programm Details"; $segments = Request::segments();  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('program.index',) }}" title="View All Programs">View All Programs</a></li>
                <li class="breadcrumb-item"><a href="{{ route('program.courses',$slug) }}" title="View {{$program->program_name}} Courses">View Courses</a></li>
                <li class="breadcrumb-item active" aria-current="page">View Program Details</li>
            </ol>
        </nav>
    </div>
    @include('layouts.alert')   
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">{{$program->program_name}}</h5>
        </div>
        <div class="card-body">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">
                    <ul class="nav nav-pills flex-column vertical-form-wizard" id="verticalFormStepper"
                        role="tablist">
                        <li class="nav-item mb-3" role="presentation">
                            <button type="button" class="nav-link active w-100 text-start" id="vStep1-tab"
                                data-bs-toggle="pill" data-bs-target="#vStep1" role="tab" aria-controls="vStep1" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">1</span>
                                    <div class="ms-2">
                                        <span class="step-title fw-semibold d-block">Program Info</span>
                                        <small>Program details</small>
                                    </div>
                                </div>
                            </button>
                        </li>
                        <li class="nav-item mb-3" role="presentation">
                            <button type="button" class="nav-link w-100 text-start" id="vStep2-tab"
                                data-bs-toggle="pill" data-bs-target="#vStep2" role="tab" aria-controls="vStep2"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">2</span>
                                    <div class="ms-2">
                                        <span class="step-title fw-semibold d-block">Program Courses</span>
                                        <small>{{ $program->program_name }} coursess</small>
                                    </div>
                                </div>
                            </button>
                        </li>
                       
                    </ul>
                    <div class="mb-3 col-md-12">
                        <img src="{{ asset('program-banner/'. $program->banner )}}" class="img-fluid login-logo" style="width: auto; height: 200px;" alt="" />
                        @if (Auth::user()->hasAnyRole(['Administrator', 'Admin']))
                            <a href="" data-bs-toggle="modal"data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $program->slug }}">
                                <span class="badge bg-danger"> Delete </span> 
                            </a>
                       
                            <div class="modal fade" id="deleteModal-{{ $program->slug }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $program->slug }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-danger">
                                            <h5 class="modal-title" id="deleteModalLabel-{{ $program->slug }}">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete <strong>{{ $program->program_name }}</strong>? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="{{ route('program.delete', $program->slug) }}" class="btn btn-danger">Yes, Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                        @endif
                    </div>

                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="tab-content border rounded-2" id="verticalFormStepperContent">
                        
                        <div class="tab-pane fade show active" id="vStep1" role="tabpanel" aria-labelledby="vStep1-tab">
                            <form action="{{ route('program.update',$program->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Program Name:</label>
                                    <input type="text" class="form-control" id="program_name" name="program_name" value="{{ old('program_name') ?? $program->program_name }}" required>
                                    <input type="hidden" name="previous_name" value="{{ $program->program_name }}">
                                    <x-input-error :messages="$errors->get('program_name')" class="mt-2 text-danger" />
                                    <div id="program-name-feedback" class="mt-2 text-danger"></div>
                                </div>
                               
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Change Program Banner:</label>
                                    <input type="file" class="form-control" id="imageUpload" name="banner" accept=".png,.jpg,.jpeg,.svg">
                                    <x-input-error :messages="$errors->get('banner')" class="mt-2 text-danger" />
                                    <div id="banner-feedback" class="mt-2 text-danger"></div>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Program Description:</label>
                                    <textarea class="form-control summernote" name="description" required>{!!  old('description') ?? $program->description  !!}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2 text-danger" />
                                </div>
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="vStep2" role="tabpanel" aria-labelledby="vStep2-tab">
                            @if(count($courses) > 0)
                                <div class="table-responsive">
                                    <table id="basicExample" class="table custom-table">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>📘 Course Name</th>
                                                <th>👤 Instructor Name</th>
                                                <th class="text-center">💰 Course Price (₦)</th>
                                                <th class="text-center">⚙️ Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @php $num =1; @endphp
                                            @foreach($courses as $course)
                                                @php 
                                                    $program_name = $course->program ? $course->program->program_name : "NIL";

                                                @endphp
                                                <tr>
                                                    <td>{{ $num++ }}</td>
                                                    <td>{{ $course->course_name }}</td>
                                                    
                                                    <td>
                                                        @if($course->allocation)
                                                            <span class="badge bg-indigo text-white">Allocated To: <br>
                                                                {{ $course->allocation->user->first_name . ' '. $course->allocation->user->last_name }}
                                                            </span>
                                                        @else
                                                            <span class="badge bg-danger text-white">Pending <br> Allocation</span>
                                                        @endif
                                                    </td>
                                                    
                                                    <td class="text-center"><span class="badge bg-secondary text-white">{{ number_format($course->course_price,2) }}</span></td>
                                                    
                                                    <td class="text-center">
                                                        <a href="{{ route('course.show', $course->slug) }}" class="btn btn-sm btn-info text-white">View</a>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                    
                                </div>
                            @else
                                <div class="col-12">
                                    <div class="card border-danger text-center">
                                        <div class="card-body">
                                            <i class="ri-error-warning-fill fs-3 text-danger mb-2"></i>
                                            <h5 class="card-title text-danger">No Course was Found</h5>
                                            <p class="card-text text-muted">There are currently no course available for this program.</p>
                                            
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>