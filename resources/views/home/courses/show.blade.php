@php $title = "Create a course"; $segments = Request::segments(); $number=1;  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('course.index') }}" title="View all {{ $segments[1]}}">View all {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create a {{ $segments[1]}}</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{$course->course_name}} Details</h5>
                
            </div>
            <div class="card-body">
                <div class="row gx-3">
                    <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
                        <ul class="nav nav-pills flex-column vertical-form-wizard" id="verticalFormStepper" role="tablist">
                            <li class="nav-item mb-3" role="presentation">
                                <button type="button" class="nav-link active w-100 text-start" id="vStep1-tab"
                                    data-bs-toggle="pill" data-bs-target="#vStep1" role="tab" aria-controls="vStep1"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">📘</span>
                                        <div class="ms-2">
                                            <span class="step-title fw-semibold d-block">Course Info</span>
                                            <small>Course details</small>
                                        </div>
                                    </div>
                                </button>
                            </li>
                            @if (Auth::user()->hasAnyRole(['Administrator', 'Admin']))

                            <li class="nav-item mb-3" role="presentation">
                                <button type="button" class="nav-link w-100 text-start" id="vStep2-tab"
                                    data-bs-toggle="pill" data-bs-target="#vStep2" role="tab" aria-controls="vStep2"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">🧑‍🎓</span>
                                        <div class="ms-2">
                                            <span class="step-title fw-semibold d-block">Our Students</span>
                                            <small>List of Students</small>
                                        </div>
                                    </div>
                                </button>
                            </li>
                            
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link w-100 text-start" id="vStep3-tab"
                                    data-bs-toggle="pill" data-bs-target="#vStep3" role="tab" aria-controls="vStep3"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">📋</span>
                                        <div class="ms-2">
                                            <span class="step-title fw-semibold d-block">Course Allocation</span>
                                            <small>Allocate course to an instructor</small>
                                        </div>
                                    </div>
                                </button>
                            </li>
                            @endif
                            <li class="nav-item" role="presentation">
                                <button type="button" class="nav-link w-100 text-start" id="vStep4-tab"
                                    data-bs-toggle="pill" data-bs-target="#vStep4" role="tab" aria-controls="vStep4"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">📚</span>
                                        <div class="ms-2">
                                            <span class="step-title fw-semibold d-block">Course Allocation History</span>
                                            <small>Course Allocation Histories</small>
                                        </div>
                                    </div>
                                </button>
                            </li>

                            @if (Auth::user()->hasAnyRole(['Administrator', 'Admin', "Instructor"]))
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link w-100 text-start" id="vStep5-tab"
                                        data-bs-toggle="pill" data-bs-target="#vStep5" role="tab" aria-controls="vStep5"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">📝</span>
                                            <div class="ms-2">
                                                <span class="step-title fw-semibold d-block">Course Notes</span>
                                                <small>View Course Notes</small>
                                            </div>
                                        </div>
                                    </button>
                                </li>
                            @endif

                            <li class="nav-item mb-3" role="presentation">
                                <button type="button" class="nav-link w-100 text-start" id="vStepA1-tab"
                                    data-bs-toggle="pill" data-bs-target="#vStepA1" role="tab" aria-controls="vStepA1"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">📘</span>
                                        <div class="ms-2">
                                            <span class="step-title fw-semibold d-block">Program Info</span>
                                            <small>View Program details</small>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        </ul>
                        <div class="mt-5 col-md-12">
                            <img src="{{ asset('course-banner/' . $course->banner) }}" class="img-fluid" style="max-height: 500px;" alt="Course Banner">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="tab-content border rounded-2" id="verticalFormStepperContent">
                            <!-- Step 1 Content -->
                            <div class="tab-pane fade" id="vStepA1" role="tabpanel" aria-labelledby="vStepA1-tab">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="text-primary">{{ $program_name ?? '' }} Details</h6>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Program Name:</label>
                                        <p class="form-control-plaintext">{{ $program_name }}</p>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Program Description:</label>
                                        <p class="form-control-plaintext">{!! $course->program->description ?? 'NULL' !!}</p>
                                    </div>  
                                    <div class="mb-3 col-md-12">
                                        {{-- <img src="{{ asset('program-banner/' . $course->program->banner) }}" class="img-fluid" style="max-height: 500px;" alt="Program Banner"> --}}
                                    </div>  
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="vStep1" role="tabpanel" aria-labelledby="vStep1-tab">
                               
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="text-primary">Course Details</h4>
                                    @if (Auth::user()->hasAnyRole(['Administrator', 'Admin']))
                                        <a href="{{ route('course.edit', $course->slug) }}" class="btn btn-primary">
                                            <i class="bi bi-pencil-square me-1"></i> Edit Details
                                        </a>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Course Name:</label>
                                        <p class="form-control-plaintext">{{ $course->course_name }}</p>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Program Name:</label>
                                        <p class="form-control-plaintext">{{ $program_name }}</p>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Course Original Price (₦):</label>
                                        <span class="badge rounded-pill bg-success text-white" style="font-weight:700; font-size:1rem;">
                                            ₦{{ number_format($course->course_price,2) }}
                                        </span>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Course Discounted Price (₦):</label>
                                        <span class="badge rounded-pill bg-danger text-white" style="font-weight:700; font-size:1rem;">
                                            ₦{{ number_format(getDiscountedPrice($course->course_price, $course->course_discount),2) }}
                                        </span>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        
                                        <div class="d-flex align-items-center mt-2 mb-2">
                                           <label class="form-label fw-bold">Course Ratings: </label>
                                            @php $rating = $course->ratings; @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="ri-star-fill" style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }}; font-size:16px;"></i>
                                            @endfor
                                            <span class="ms-2" style="font-size:0.9rem; color:#555;">
                                                {{ number_format($rating, 1) }} ({{ $course->reviews }} reviews)
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label fw-bold">Course Duration: {{ $course->duration }}</label>
                                    </div>


                                    <div class="mb-4 col-md-6">
                                        <label class="form-label fw-bold text-dark">Training Type:</label>
                                        <p class="form-control-plaintext">
                                            @foreach(explode(',', $course->training_type) as $type)
                                                <span class="badge bg-info text-white me-1">{{ ucfirst(trim($type)) }}</span>
                                            @endforeach
                                        </p>
                                    </div>

                                    <div class="mb-4 col-md-6">
                                        <label class="form-label fw-bold text-dark">Course Technologies:</label>
                                        <p class="form-control-plaintext">
                                            @foreach(explode(',', $course->course_technologies) as $types)
                                                <span class="badge bg-dark text-white me-1">{{ ucfirst(trim($types)) }}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                   
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Basic Requirements:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->basic_requirements !!}</div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Course Outline:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->course_outline !!}</div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Learning Module:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->learning_module !!}</div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Course Schedule:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->course_schedule !!}</div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Course Overview:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->course_overview !!}</div>
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Benefits:</label>
                                        <div class="border p-2 rounded bg-light">{!! $course->benefits !!}</div>
                                    </div>
                                </div>
                               
                            </div>

                            <!-- Step 2 Content -->
                            <div class="tab-pane fade" id="vStep2" role="tabpanel" aria-labelledby="vStep2-tab">
                                <form>
                                    <div class="mb-3">
                                    <label for="teamLead" class="form-label">Team Lead</label>
                                    <select class="form-select" id="teamLead">
                                        <option selected disabled>Select team lead</option>
                                        <option>John Smith</option>
                                        <option>Sarah Johnson</option>
                                        <option>Michael Brown</option>
                                    </select>
                                    </div>
                                    <div class="mb-3">
                                    <label class="form-label">Team Members</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="member1">
                                        <label class="form-check-label" for="member1">
                                        David Wilson (UX Designer)
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="member2">
                                        <label class="form-check-label" for="member2">
                                        Emily Davis (Developer)
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="member3">
                                        <label class="form-check-label" for="member3">
                                        James Martin (QA Engineer)
                                        </label>
                                    </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary"
                                        onclick="document.getElementById('vStep1-tab').click()">Previous</button>
                                    <button type="button" class="btn btn-primary"
                                        onclick="document.getElementById('vStep3-tab').click()">Next Step</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Step 3 Content -->
                            <div class="tab-pane fade" id="vStep3" role="tabpanel" aria-labelledby="vStep3-tab">
                                @if (Auth::user()->hasAnyRole(['Administrator', 'Admin']))
                                    <div class="alert alert-primary d-flex align-items-center mb-4" role="alert">
                                        <span class="icon-box ms rounded-5 bg-primary me-3">
                                            <i class="ri-information-line fs-3"></i>
                                        </span>
                                        <div>
                                            <strong>You are nearly done!</strong> Kindly complete the form below to assign this course to an instructor.
                                            <span class="d-block mt-1 small text-muted">Note: Each course can be allocated to only one instructor at a time.</span>
                                        </div>
                                    </div>
                                    <div class="card mb-3 bg-light-subtle">
                                        <div class="card-body p-4">
                                            <h6 class="card-title fw-bold text-primary mb-3">Course Allocation Form</h6>
                                            <div class="row mb-3">
                                                @if(count($allocations) == 0)
                                                    <form action="{{ route('allocation.store') }}" method="POST">
                                                        @csrf
                                                        <div class="container">
                                                            
                                                            <div class="row">

                                                                <!-- Select Course -->
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="courseSlug" class="form-label">Course Name:</label>
                                                                    <select name="courseSlug" id="courseSlug" class="form-select select2" required>
                                                                    <option value="{{ $course->slug }}" selected>{{ $course->course_name }}</option>
                                                                    </select>
                                                                    <x-input-error :messages="$errors->get('courseSlug')" class="mt-2 text-danger" />
                                                                </div>

                                                                <!-- Program -->
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="program_id" class="form-label">Program Name:</label>
                                                                    <select name="programSlug" id="programSlug" class="form-select select2" required>
                                                                        <option value="{{ $course->programSlug }}" selected>{{ $program_name }}</option>
                                                                    </select>
                                                                    <x-input-error :messages="$errors->get('programSlug')" class="mt-2 text-danger" />
                                                                </div>
                                                                <div class="mb-3 col-md-12">
                                                                    <label for="userSlug" class="form-label">Allocate To:</label>
                                                                    <select name="userSlug" id="userSlug" class="form-select select2" required>
                                                                        <option value="">-- Select an Instructor --</option>
                                                                        @foreach($users as $user)
                                                                            <option value="{{ $user->slug }}">{{ $user->first_name. ' '. $user->last_name.' => '. $user->email }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <x-input-error :messages="$errors->get('userSlug')" class="mt-2 text-danger" />
                                                                </div>
                                                            </div>

                                                            <button type="submit" class="btn btn-primary mt-3">
                                                                <i class="bi bi-check-circle me-1"></i> Allocate the Course
                                                            </button>
                                                        </div>
                                                    </form>
                                                @else
                                                    @foreach ($allocations as $allocation) 
                                                        @php $use = $allocation->user; @endphp 
                                                        <form action="{{ route('allocation.update',$allocation->slug) }}" method="POST">
                                                            @csrf
                                                            <div class="container">
                                                                
                                                                <div class="row">

                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="courseSlug" class="form-label">Course Name:</label>
                                                                        <select name="courseSlug" id="courseSlug" class="form-select" required>
                                                                            <option value="{{ $course->slug }}" selected>{{ $course->course_name }}</option>
                                                                        </select>
                                                                        <x-input-error :messages="$errors->get('courseSlug')" class="mt-2 text-danger" />
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="program_id" class="form-label">Program Name:</label>
                                                                        <select name="programSlug" id="programSlug" class="form-select" required>
                                                                            <option value="{{ $course->programSlug }}" selected>{{ $program_name }}</option>
                                                                        </select>
                                                                        <x-input-error :messages="$errors->get('programSlug')" class="mt-2 text-danger" />
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="oldUserSlug" class="form-label text-danger">Current Instructor:</label>
                                                                        <select name="oldUserSlug" id="oldUserSlug" class="form-select" required>
                                                                            <option value="{{ $use->slug }}" selected>{{ $use->email }}</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="userSlug" class="form-label text-success">Re-Allocated To:</label>
                                                                        <select name="userSlug" id="userSlug" class="form-select select2" required>
                                                                            <option value="">-- Select New Instructor --</option>
                                                                            @foreach($users as $user)
                                                                                @if($use->slug != $user->slug)
                                                                                    <option value="{{ $user->slug }}">{{ $user->first_name. ' '. $user->last_name.' => '. $user->email }}</option>
                                                                                @endif
                                                                            @endforeach
                                                                        </select>
                                                                        <x-input-error :messages="$errors->get('userSlug')" class="mt-2 text-danger" />
                                                                    </div>
                                                                    
                                                                </div>

                                                                <button type="submit" class="btn btn-info mt-3 text-white">
                                                                    <i class="bi bi-check-circle me-1"></i> Re-Allocate Course
                                                                </button>
                                                            </div>
                                                        </form>
                                                    @endforeach
                                                @endif
                                            </div>
                                            
                                        </div>
                                    
                                    </div>
                                @endif
                                
                            </div>
                            <div class="tab-pane fade" id="vStep4" role="tabpanel" aria-labelledby="vStep4-tab">
                                @if(count($allocationHistories) > 0)
                                    <div class="card mb-3 bg-light-subtle">
                                        <div class="card-body p-4">
                                            <h6 class="card-title fw-bold text-primary mb-3">List Course Allocation Histories</h6>
                                            <div class="table-responsive">
                                                <table id="basicExample" class="table custom-table">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Previous Instructor</th>
                                                            <th>New Instructor</th>
                                                            <th>Added By</th>
                                                            <th>Created On</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($allocationHistories as $history)
                                                            <tr>
                                                                <td>{{ $number++ }}</td>
                                                                <td>{{ $history->previousUser->first_name ?? 'N/A' }} {{ $history->previousUser->last_name ?? '' }}</td>
                                                                <td>{{ $history->newUser->first_name ?? 'N/A' }} {{ $history->newUser->last_name ?? '' }}</td>
                                                                <td>{{ $history->addedBy->first_name ?? 'N/A' }} {{ $history->addedBy->last_name ?? '' }}</td>
                                                                <td>{{ $history->created_at }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-12">
                                        <div class="card border-danger text-center">
                                            <div class="card-body">
                                                <i class="ri-error-warning-fill fs-3 text-danger mb-2"></i>
                                                <h5 class="card-title text-danger">No Allocations Histories Found</h5>
                                                <p class="card-text text-muted">There are currently no course allocations available for this view.</p>
                                            </div>
                                        </div>
                                    </div>

                                @endif
                            </div>
                            <div class="tab-pane fade" id="vStep5" role="tabpanel" aria-labelledby="vStep5-tab">

                                @if(count($notes) > 0)
                                    <div class="row g-4">
                                        @foreach ($notes as $voll)
                                            <div class="col-md-6">
                                                <div class="card shadow-sm h-100">
                                                    <div class="card-header bg-primary text-white">
                                                        <h6 class="mb-0">{{ $voll->topic }}</h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <ul class="list-group list-group-flush mb-3">
                                                            <li class="list-group-item"><strong>Instructor Name: </strong> {{ $voll->instructor->first_name . ' '. $voll->instructor->last_name ?: "NULL"}}</li>
                                                            <li class="list-group-item"><strong>Course Materials:</strong> {{ $voll->materials->count() ?? '0' }}</li>
                                                            <li class="list-group-item"><strong>Created On:</strong> {{ $voll->created_at->format('d M Y') }}</li>
                                                        </ul>
                                                        <a href="{{ route('course.note.show', $voll->slug) }}" class="btn btn-outline-primary w-100">
                                                            View Note Details
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if (Auth::user()->hasAnyRole(['Administrator', 'Admin', 'Instructor']))
                                            <div class="col-md-12">
                                                <a href="{{ route('course.note.index', $course->slug) }}" class="btn btn-info text-white">
                                                    <i class="bi bi-pencil-square me-1"></i> View All Course Notes
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                @else

                                    <div class="col-12">
                                        <div class="card border-danger text-center">
                                            <div class="card-body">
                                                <i class="ri-error-warning-fill fs-3 text-danger mb-2"></i>
                                                <h5 class="card-title text-danger">No course note was Found</h5>
                                                <p class="card-text text-muted">There are currently no course anotes available for this view.</p>
                                                @if($course->allocation)
                                                    @if (Auth::user()->hasAnyRole(['Administrator', 'Instructor']))
                                                        <a href="{{ route('course.note.index', [$course->slug, $course->allocation->slug]) }}" class="btn btn-primary">
                                                            <i class="bi bi-pencil-square me-1"></i> Create New Course Note
                                                        </a>
                                                    @endif
                                                @endif
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
    </div>

</x-app-layout>