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
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{ $program->program_name }}</h5>
            </div>
            <div class="card-body">
                <div class="row gx-3">
                    <div class="col-lg-3 col-md-12 mb-lg-0 mb-4">
                        <ul class="nav nav-pills flex-column vertical-form-wizard" id="verticalFormStepper"
                            role="tablist">
                            <li class="nav-item mb-3" role="presentation">
                                <button type="button" class="nav-link active w-100 text-start" id="vStep1-tab"
                                    data-bs-toggle="pill" data-bs-target="#vStep1" role="tab" aria-controls="vStep1"
                                    aria-selected="true">
                                    
                                    <div class="d-flex align-items-center">
                                        <span class="icon-box md bg-primary-8 text-primary rounded-5 me-2">📘</span>
                                        <div class="ms-2">
                                            <span class="step-title fw-semibold d-block">Program Info</span>
                                            <small>{{ $program->program_name }} details</small>
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
                                            <span class="step-title fw-semibold d-block">Available Course</span>
                                            <small>List of all Available Courses</small>
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
                                            <span class="step-title fw-semibold d-block">Completion</span>
                                            <small>Review and submit</small>
                                        </div>
                                    </div>
                                </button>
                            </li>
                        </ul>
                        <div class="mb-3 col-md-12">
                            <img src="{{ asset('program-banner/'. $program->banner )}}" class="img-fluid login-logo" style="width: auto; height: 200px;" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="tab-content border rounded-2" id="verticalFormStepperContent">
                            <!-- Step 1 Content -->
                            <div class="tab-pane fade show active" id="vStep1" role="tabpanel"
                            aria-labelledby="vStep1-tab">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="text-primary">{{ $program->program_name ?? '' }} Details</h6>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Program Name:</label>
                                        <p class="form-control-plaintext">{{ $program->program_name }}</p>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label fw-bold">Program Description:</label>
                                        <p class="form-control-plaintext">{!! $program->description ?? 'NULL' !!}</p>
                                    </div>  
                                    
                                </div>
                            </div>

                            <!-- Step 2 Content -->
                            <div class="tab-pane fade" id="vStep2" role="tabpanel" aria-labelledby="vStep2-tab">
                                @if(count($courses) > 10)
                                    
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

                            <!-- Step 3 Content -->
                            <div class="tab-pane fade" id="vStep3" role="tabpanel" aria-labelledby="vStep3-tab">
                                <div class="alert alert-primary d-flex align-items-center mb-4" role="alert">
                                    <span class="icon-box ms rounded-5 bg-primary me-3">
                                    <i class="ri-information-line fs-3"></i>
                                    </span>
                                    <div>
                                    <strong>Almost there!</strong> Please review your project details carefully before final
                                    submission.
                                    <span class="d-block mt-1 small">Note: You wont be able to make changes once
                                        submitted.</span>
                                    </div>
                                </div>
                                <div class="card mb-3 bg-light-subtle">
                                    <div class="card-body p-4">
                                    <h6 class="card-title fw-bold mb-3">Project Summary</h6>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-muted d-block mb-1 small">Project Name</label>
                                            <p class="fw-semibold mb-0" id="summaryProjectName">E-commerce Redesign</p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted d-block mb-1 small">Deadline</label>
                                            <p class="fw-semibold mb-0 d-flex align-items-center" id="summaryDeadline">
                                            <i class="ri-calendar-line me-2 text-primary"></i>Aug 15, 2025
                                            </p>
                                        </div>
                                        </div>
                                        <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="text-muted d-block mb-1 small">Team Lead</label>
                                            <p class="fw-semibold mb-0 d-flex align-items-center" id="summaryTeamLead">
                                            <i class="ri-user-star-line me-2 text-primary"></i>Sarah Johnson
                                            </p>
                                        </div>
                                        <div class="mb-3">
                                            <label class="text-muted d-block mb-1 small">Team Size</label>
                                            <p class="fw-semibold mb-0 d-flex align-items-center" id="summaryTeamSize">
                                            <i class="ri-group-line me-2 text-primary"></i>4 members
                                            </p>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="progress small mb-2">
                                        <div class="progress-bar bg-primary w-100" role="progressbar" aria-valuenow="100"
                                        aria-valuemin="0" aria-valuemax="100" aria-label="Project completion progress">
                                        </div>
                                    </div>
                                    <div class="badge bg-primary-subtle text-primary"><i class="ri-check-double-line"></i>
                                        All
                                        required information completed</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-4">
                                    <button type="button" class="btn btn-outline-secondary"
                                    onclick="document.getElementById('vStep2-tab').click()">Previous</button>
                                    <button type="submit" class="btn btn-primary">Create Project</button>
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