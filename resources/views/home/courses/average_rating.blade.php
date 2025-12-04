<h4>Average Rating: 
    <span class="badge bg-primary">
        {{ number_format($ratings->avg('ratingScore'), 1) }}/10
    </span>
</h4>
<div>
    @for ($i = 1; $i <= 10; $i++)
        @if ($i <= round($ratings->avg('ratingScore')))
            <i class="fa fa-star text-warning"></i>
        @else
            <i class="fa fa-star text-secondary"></i>
        @endif
    @endfor
</div>