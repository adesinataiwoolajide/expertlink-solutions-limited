<div class="row">
    @forelse ($ratings as $rating)
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <!-- Header: Student + Rating -->
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="d-flex align-items-center flex-grow-1 overflow-hidden">
                            <!-- Avatar (first 2 letters of email) -->
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2"
                                 style="width:40px; height:40px; font-weight:bold;">
                                {{ strtoupper(substr($rating->student->email, 0, 2)) }}
                            </div>
                            <!-- Truncate long email -->
                            <h6 class="mb-0 text-truncate" style="max-width: 180px;" title="{{ $rating->student->email }}">
                                {{ $rating->student->email }}
                            </h6>
                        </div>
                        <div class="flex-shrink-0 text-nowrap">
                            <!-- Modern star rating -->
                            @for ($i = 1; $i <= 10; $i++)
                                <i class="fa fa-star {{ $i <= $rating->ratingScore ? 'text-warning' : 'text-muted' }}"></i>
                            @endfor
                            <span class="badge bg-light text-dark ms-2">{{ $rating->ratingScore }}/10</span>
                        </div>
                    </div>

                    <!-- Comment -->
                    @if($rating->ratingComment)
                        <p class="text-secondary fst-italic mb-2">“{{ $rating->ratingComment }}”</p>
                    @endif

                    <!-- Footer -->
                    <small class="text-muted">
                        <i class="fa fa-clock me-1"></i>
                        {{ $rating->created_at->format('d M Y, h:i A') }}
                    </small>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                <i class="fa fa-info-circle me-2"></i> No record found for this rating.
            </div>
        </div>
    @endforelse
</div>