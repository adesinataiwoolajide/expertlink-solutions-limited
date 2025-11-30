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
                        <i class="ri-eye-line me-1"></i> View Note
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
                            <span class="badge bg-success ms-2 rounded-pill">12</span>
                        </button>
                    </li>
                    
                </ul>
                <div class="tab-content border border-primary rounded p-4" id="tabs-with-badges-content">
                    <div class="tab-pane fade show active" id="badge-content-one" role="tabpanel" aria-labelledby="badge-tab-one">
                        <div class="card shadow-sm mb-3 border-0">
                            
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
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user()->hasAnyRole(['Administrator','Student']))
                                @if(count($submitted) == 0)
                                    @if($isOverdue == false)
                                        <form action="{{ route('submission.course.store',$assignment->slug) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="courseSlug" value="{{ $assignment->courseSlug }}">
                                            <input type="hidden" name="noteSlug" value="{{ $assignment->noteSlug }}">
                                            <input type="hidden" name="instructorSlug" value="{{ $assignment->instructorSlug }}">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label fw-bold text-dark">Assignment Answer:</label>
                                                    <textarea class="form-control summernote" name="answer_text" required>{!! old('answer_text') ?? 'Enter your answer here...' !!}</textarea>
                                                    <x-input-error :messages="$errors->get('answer_text')" class="mt-2 text-danger" />
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit Assignment</button>
                                        </form>
                                    @endif
                                @else
                                    @php $subs = $submitted->first(); @endphp
                                    @if(optional($subs)->status != 'Graded')
                                        
                                        <form action="{{ route('submission.course.update',$subs->slug) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="courseSlug" value="{{ $subs->courseSlug }}">
                                            <input type="hidden" name="noteSlug" value="{{ $subs->noteSlug }}">
                                            <input type="hidden" name="instructorSlug" value="{{ $subs->instructorSlug }}">
                                            <div class="row">
                                                <div class="mb-3 col-md-12">
                                                    <label class="form-label fw-bold text-dark">Assignment Answer:</label>
                                                    <textarea class="form-control summernote" name="answer_text" required>{!! old('answer_text') ?? optional($subs)->answer_text !!}</textarea>
                                                    <x-input-error :messages="$errors->get('answer_text')" class="mt-2 text-danger" />
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Assignment</button>
                                        </form>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade" id="badge-content-two" role="tabpanel" aria-labelledby="badge-tab-two">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <img src="assets/images/user1.png" class="img-3x rounded-circle" alt="User">
                            <div>
                            <h6 class="mb-1">Emily Davis</h6>
                            <p class="mb-0 small">When will the project documents be ready for review?
                            </p>
                            <span class="small text-muted">Just now</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <img src="assets/images/user3.png" class="img-3x rounded-circle" alt="User">
                            <div>
                            <h6 class="mb-1">Jason Taylor</h6>
                            <p class="mb-0 small">The client approved our proposal! We can start next
                                week.</p>
                            <span class="small text-muted">30 minutes ago</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-start gap-3">
                            <img src="assets/images/user5.png" class="img-3x rounded-circle" alt="User">
                            <div>
                            <h6 class="mb-1">Sandra Chen</h6>
                            <p class="mb-0 small">Please review the updated marketing materials ASAP.</p>
                            <span class="small text-muted">2 hours ago</span>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
