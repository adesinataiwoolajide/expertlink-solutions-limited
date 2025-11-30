<x-app-layout>
     <div class="col-sm-12">
        <div class="card mb-3">
            @include('layouts.alert')
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                
                <h5 class="card-title mb-0 fw-bold text-primary">
                    {{ $assignment->note->topic ?? 'No Topic' }}
                </h5>

                <!-- Actions -->
                <div class="btn-group" role="group">
                    <a href="{{ route('mycourse.note.read', [$assignment->noteSlug, $assignment->courseSlug]) }}" 
                    class="btn btn-sm btn-outline-primary">
                        <i class="ri-eye-line me-1"></i> Read Note
                    </a>
                    <a href="{{ route('mycourse.note.index', [$assignment->courseSlug]) }}" 
                    class="btn btn-sm btn-outline-info">
                        <i class="ri-book-line me-1"></i> All Notes
                    </a>
                    <a href="{{ route('note.course.assignments', [$assignment->noteSlug]) }}" 
                    class="btn btn-sm btn-outline-danger">
                        <i class="ri-book-line me-1"></i> All Assignments
                    </a>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs" id="tabs-with-badges" role="tablist">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active px-4 py-2 d-flex align-items-center" id="badge-tab-one"
                        data-bs-toggle="tab" data-bs-target="#badge-content-one" type="button" role="tab"
                        aria-controls="badge-content-one" aria-selected="true">
                        <i class="ri-notification-2-line me-2"></i> Assignment
                    </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-two"
                            data-bs-toggle="tab" data-bs-target="#badge-content-two" type="button" role="tab"
                            aria-controls="badge-content-two" aria-selected="false">
                            <i class="ri-message-3-line me-2"></i> Submission
                            <span class="badge bg-success ms-2 rounded-pill">{{ $allSubmissions->total() }}</span>
                        </button>
                    </li>
                    
                </ul>
                <div class="tab-content border border-primary rounded p-4" id="tabs-with-badges-content">
                    <div class="tab-pane fade show active" id="badge-content-one" role="tabpanel" aria-labelledby="badge-tab-one">
                        
                        <div class="card shadow-sm mb-3 border-0">
                            <div class="card-body d-flex align-items-start gap-3">
                                <div class="icon-box sm bg-danger-subtle rounded-circle d-flex align-items-center justify-content-center"
                                    style="width:45px; height:45px;" aria-hidden="true">
                                    <i class="ri-notification-2-line text-danger fs-5"></i>
                                </div>

                                <div class="flex-grow-1">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0 fw-bold text-dark">
                                            Due: <span class="{{ $isOverdue ? 'text-danger' : 'text-success' }}">{{ $dueLabel }}</span>
                                        </h6>

                                        <div class="d-flex gap-2 align-items-center">
                                            <span class="badge {{ $isOverdue ? 'bg-danger-subtle text-danger' : 'bg-success-subtle text-success' }}">
                                                {{ $isOverdue ? 'Overdue' : 'Upcoming' }}
                                            </span>
                                            <span class="badge bg-secondary-subtle text-secondary">
                                                Max Score: {{ $maxScore }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Short preview + collapsible full content (choose one based on trust level) --}}
                                    @if(Str::length(strip_tags($rawHtmlDescription)) > 180)
                                        <p class="mb-2 small text-secondary">
                                            {{ $plainDescription }}
                                            <a class="text-primary text-decoration-none" data-bs-toggle="collapse"
                                            href="#desc-{{ $assignment->slug }}" role="button" aria-expanded="false"
                                            aria-controls="desc-{{ $assignment->slug }}">
                                                Show more
                                            </a>
                                        </p>
                                        <div class="collapse" id="desc-{{ $assignment->slug }}">
                                            <div class="small text-secondary">
                                                {!! $rawHtmlDescription !!}
                                            </div>
                                        </div>
                                    @else
                                        <div class="small text-secondary">
                                            {!! $rawHtmlDescription !!}
                                        </div>
                                    @endif

                                    {{-- Optional actions (adjust routes as needed) --}}
                                    <div class="mt-3 d-flex flex-wrap gap-2">
                                        <a href="" class="btn btn-sm btn-primary">
                                            Submit
                                        </a>
                                        <a href=""
                                        class="btn btn-sm btn-outline-secondary">
                                            View details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="badge-content-two" role="tabpanel" aria-labelledby="badge-tab-two">
                        <div class="card shadow-sm mb-3 border-0">
                            <div class="card-body">
                                <h5 class="fw-bold mb-3">Submissions ({{ $allSubmissions->total() }})</h5>

                                @forelse($allSubmissions as $submission)
                                    <div class="border-bottom py-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <strong>Student:</strong> {{ $submission->student->email ?? 'Unknown' }} <br>
                                                <small class="text-muted">
                                                    Submitted: {{ $submission->created_at->format('D, M j, Y g:i A') }}
                                                </small>
                                            </div>
                                            <span class="badge {{ $submission->submission_status === 'approved' ? 'bg-success' : 'bg-warning' }}">
                                                {{ ucfirst($submission->submission_status) }}
                                            </span>
                                        </div>

                                        <p class="mt-2 mb-1">
                                            <strong>Answer:</strong> {{ Str::limit($submission->answer_text, 150) }}
                                        </p>

                                        <div class="mt-2">
                                            <small class="text-secondary">
                                                Instructor: {{ $submission->instructor->email ?? 'N/A' }} |
                                                Course: {{ $submission->course->title ?? 'N/A' }} |
                                                Note: {{ $submission->note->title ?? 'N/A' }}
                                            </small>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-danger">No submissions yet.</p>
                                @endforelse

                                <div class="mt-3">
                                    {{ $allSubmissions->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</x-app-layout>