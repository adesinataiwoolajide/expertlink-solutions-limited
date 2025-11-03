@php $title = "Create a course"; $segments = Request::segments();  @endphp
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
                <h5 class="card-title">Please fill the below form to Create a Course</h5>
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
                        </ul>
                        <div class="mt-5 col-md-12">
                            <img src="{{ asset('course-banner/' . $course->banner) }}" class="img-fluid" style="max-height: 500px;" alt="Course Banner">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="tab-content border rounded-2" id="verticalFormStepperContent">
                            <!-- Step 1 Content -->
                            <div class="tab-pane fade show active" id="vStep1" role="tabpanel"
                            aria-labelledby="vStep1-tab">
                               
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h2 class="text-primary">Course Details</h2>
                                    <a href="{{ route('course.edit', $course->slug) }}" class="btn btn-primary">
                                        <i class="bi bi-pencil-square me-1"></i> Edit Details
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label class="form-label fw-bold">Course Name:</label>
                                        <p class="form-control-plaintext">{{ $course->course_name }}</p>
                                    </div>

                                    <div class="mb-3 col-md-5">
                                        <label class="form-label fw-bold">Program:</label>
                                        <p class="form-control-plaintext">{{ $program_name }}</p>
                                    </div>

                                    <div class="mb-3 col-md-3">
                                        <label class="form-label fw-bold">Course Price (₦):</label>
                                        <p class="form-control-plaintext">{{ number_format($course->course_price) }}</p>
                                    </div>

                                    <div class="mb-4 col-md-12">
                                        <label class="form-label fw-bold text-primary">Training Type:</label>
                                        <p class="form-control-plaintext">
                                            @foreach(explode(',', $course->training_type) as $type)
                                                <span class="badge bg-info text-white me-1">{{ ucfirst(trim($type)) }}</span>
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

                                                        @if(count($allocations) == 0)
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
                                                        @else
                                                            @foreach ($allocations as $allocation) 
                                                                @php $use = $allocation->user; @endphp 
                                                                <div class="mb-3 col-md-12">
                                                                    <label for="userSlug" class="form-label">Allocated To:</label>
                                                                    <select name="userSlug" id="userSlug" class="form-select select2" required>
                                                                    <option value="{{ $use->slug }}">{{ $use->first_name. ' '. $use->last_name.' => '. $use->email }}</option>
                                                                    <option value="">-- Select an Instructor --</option>
                                                                        @foreach($users as $user)
                                                                            <option value="{{ $user->slug }}">{{ $user->first_name. ' '. $user->last_name.' => '. $user->email }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <x-input-error :messages="$errors->get('userSlug')" class="mt-2 text-danger" />
                                                                </div>
                                                            @endforeach

                                                        @endif

                                                    </div>

                                                    <button type="submit" class="btn btn-primary mt-3">
                                                        <i class="bi bi-check-circle me-1"></i> Allocate Course
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>