@php $title = "Learning Cart"; $segments = Request::segments();  @endphp
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
        
    <div class="container py-5">
        <h3 class="mb-4 fw-bold text-primary">Your Cart</h3>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if(count($cart) > 0)
            <div class="row g-4">
                @foreach($cart as $id => $item)
                    <div class="col-md-4">
                        <div class="card h-100 shadow-sm border-0 rounded-4">
                            <img src="{{ asset('course-banner/' . $item['banner']) }}"
                                class="card-img-top img-fluid"
                                style="height:180px; object-fit:cover;"
                                alt="{{ $item['course_name'] }}">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold">{{ $item['course_name'] }}</h5>
                                <p class="text-muted">₦{{ number_format($item['price']) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('course.viewLearning', [$item['slug'], 'program-slug']) }}"
                                    class="btn btn-sm btn-outline-primary">
                                        View Course
                                    </a>
                                    <a href="{{ route('cart.remove', $id) }}"
                                    class="btn btn-sm btn-danger">
                                        <i class="ri-delete-bin-6-line me-1"></i> Remove
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center">
                <i class="ri-shopping-cart-line fs-4 me-2"></i> Your cart is currently empty.
            </div>
        @endif
    </div>

</x-app-layout>