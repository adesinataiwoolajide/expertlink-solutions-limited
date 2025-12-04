<div class="card shadow-sm border-0 mb-4">
    <div class="card-body text-center">
        <!-- Title -->
        <h5 class="text-uppercase text-muted mb-3">
            Average Rating
        </h5>

        <!-- Numeric Score -->
        <div class="display-4 fw-bold text-primary mb-2">
            {{ number_format($ratings->avg('ratingScore'), 1) }}
            <small class="text-muted">/10</small>
        </div>

        <!-- Star Rating -->
        <div class="mb-3">
            @for ($i = 1; $i <= 10; $i++)
                @if ($i <= round($ratings->avg('ratingScore')))
                    <i class="fa fa-star text-warning fa-lg"></i>
                @else
                    <i class="fa fa-star text-secondary fa-lg"></i>
                @endif
            @endfor
        </div>

        <!-- Badge -->
        <span class="badge bg-gradient bg-primary px-3 py-2">
            {{ $ratings->count() }} ratings submitted
        </span>
    </div>
</div>