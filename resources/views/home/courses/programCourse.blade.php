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
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">{{ $program->program_name }}</h5>

                <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('course.index') }}" class="btn btn-primary">
                        View Courses
                    </a>

                    @php
                        $cartCount = count(session()->get('cart', []));
                    @endphp
                    @if($cartCount > 0)
                        <a href="{{ route('cart.view') }}" class="btn btn-outline-secondary position-relative">
                            <i class="ri-shopping-cart-2-line fs-5"></i>
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    @endif
                </div>
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
                            
                        </ul>
                        <div class="mb-3 col-md-12">
                            <img src="{{ asset('program-banner/'. $program->banner )}}" class="img-fluid login-logo" style="width: auto; height: 200px;" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="tab-content border rounded-2" id="verticalFormStepperContent">
                            <!-- Step 1 Content -->
                            <div class="tab-pane fade show active" id="vStep1" role="tabpanel" aria-labelledby="vStep1-tab">
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

                            <div class="tab-pane fade" id="vStep2" role="tabpanel" aria-labelledby="vStep2-tab">
                                <style>
                                    .double-strike {
                                        position: relative;
                                        display: inline-block;
                                        color: black; /* Bootstrap's text-danger */
                                    }
                                    .double-strike::before,
                                    .double-strike::after {
                                        content: "";
                                        position: absolute;
                                        left: 0;
                                        right: 0;
                                        height: 1px;
                                        background-color: currentColor;
                                    }
                                    .double-strike::before {
                                        top: 40%;
                                    }
                                    .double-strike::after {
                                        top: 60%;
                                    }
                                </style>
                                @if(count($courses) > 0)
                                    <div class="container py-5">
                                        <h4 class="mb-4 fw-bold text-primary text-center">Recommended Courses</h4>
                                        <div class="row g-4">
                                            @foreach ($courses as $course)
                                                @php
                                                    $originalPrice = $course->course_price;
                                                    $rating = $course->ratings ?? 4.5;
                                                    $subStatus = getDoubleInformation('course_subscriptions', 'courseSlug', $course->slug, 'userSlug', Auth::user()->slug, 'count');
                                                    $cart = session()->get('cart', []);
                                                    $inCart = collect($cart)->contains(function ($item) use ($course) {
                                                        return $item['slug'] === $course->slug;
                                                    });
                                                @endphp
                                                <div class="col-md-4">
                                                    <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden">
                                                        <img src="{{ asset('course-banner/' . $course->banner) }}"
                                                            alt="{{ $course->course_name }}"
                                                            class="img-fluid"
                                                            style="height: 180px; object-fit: cover;">
                                                        <div class="card-body">
                                                            <h5 class="fw-semibold text-dark mb-2">
                                                                <a href="{{ route('course.viewLearning', [$course->slug, $program->slug]) }}"
                                                                class="text-decoration-none text-dark">
                                                                    {{ Str::limit($course->course_name, 60) }}
                                                                </a>
                                                            </h5>
                                                            <p class="mb-1 text-muted">
                                                                <strong>Instructor:</strong>
                                                                {{ $course->allocation ? $course->allocation->user->first_name . ' ' . $course->allocation->user->last_name : 'ELS Tutor' }}
                                                            </p>

                                                            <div class="d-flex align-items-center mb-2">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    <i class="ri-star-fill"
                                                                    style="color:{{ $i <= $rating ? '#ffc107' : '#e4e5e9' }}; font-size:16px;"></i>
                                                                @endfor
                                                                <span class="ms-2 text-muted small">
                                                                    {{ number_format($rating, 1) }} ({{ $course->reviews }} reviews)
                                                                </span>
                                                            </div>

                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex flex-wrap justify-content-left gap-2">
                                                                    <span class="badge bg-success text-white fw-bold px-3 py-2">
                                                                        ₦{{ number_format(getDiscountedPrice($course->course_price, $course->course_discount),2) }}
                                                                    </span>
                                                                    <span class="badge bg-danger text-white double-strike fw-bold px-3 py-2 ms-2">
                                                                        ₦{{ number_format($originalPrice) }}
                                                                    </span>
                                                                </div>
                                                               
                                                                @if($subStatus == 0)

                                                                    @if(!$inCart)
                                                                        <a href="{{ route('cart.add', [$course->slug]) }}"
                                                                        class="btn btn-sm btn-outline-primary fw-semibold">
                                                                            <i class="ri-shopping-cart-2-line me-1"></i> Add to Cart
                                                                        </a>
                                                                    @else
                                                                        <a href="" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $course->slug }}">
                                                                            <i class="ri-delete-bin-line me-1"></i> Remove Item
                                                                        </a>
                                                                        <div class="modal fade" id="deleteModal-{{ $course->slug}}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $course->slug }}" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header bg-danger">
                                                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $course->slug }}">Confirm Cart Removal</h5>
                                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        Are you sure you want to remove <strong>{{ $course->course_name }} </strong>? This action cannot be undone.
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                                        <a href="{{ route('cart.remove', $course->slug) }}" class="btn btn-danger">Yes, Remove from the Cart</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <a href="{{ route('mycourse.note.index', [$course->slug]) }}">
                                                                         <span class="badge bg-primary text-white fw-bold px-3 py-2">
                                                                            View Notes
                                                                        </span>
                                                                    </a>
                                                                @endif

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="ht-pagination mt-5 pagination justify-content-center">
                                            <div class="pagination-wrapper">
                                                {{ $courses->links() }}
                                            </div>
                                        </div>
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
                                            submitted.
                                        </span>
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