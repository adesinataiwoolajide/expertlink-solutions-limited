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
                            <span class="badge bg-success ms-2 rounded-pill">{{ $submitted->count() }}</span>
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
                        <h5 class="fw-bold mb-4 text-primary">Assignment Submission</h5>
                        @php $index = 1; @endphp
                        @forelse($submitted as $submission)
                            <div class="card shadow-sm mb-4 border-0">
                                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                    <span class="fw-semibold text-dark">
                                        {{ $index }}. Submitted on {{ \Carbon\Carbon::parse($submission->created_at)->format('D, M j, Y g:i A') }} by {{ $submission->student->email }}
                                    </span>
                                    <span class="badge 
                                        @if($submission->submission_status === 'submitted') bg-warning text-white 
                                        @elseif($submission->submission_status === 'graded') bg-success 
                                        @else bg-danger @endif">
                                        {{ ucfirst($submission->submission_status) }}
                                    </span>
                                </div>

                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <strong>Assignment Score:</strong>
                                            <span class="badge 
                                                @if(is_null($submission->student_score))
                                                    bg-secondary-subtle text-white
                                                @elseif($submission->student_score >= 7)
                                                    bg-success
                                                @elseif($submission->student_score >= 5)
                                                    bg-warning text-white
                                                @else
                                                    bg-danger
                                                @endif">
                                                {{ $submission->student_score ?? 'Not graded yet' }}
                                            </span>
                                        </div>

                                        <div class="col-md-6">
                                            <strong>Remark:</strong>
                                            <span class="text-muted">{{ $submission->submission_remark ?? '—' }}</span>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <strong>Answer:</strong>
                                        <div class="mt-2">
                                            {!! $submission->answer_text !!}
                                        </div>
                                    </div>
                                    @if($isOverdue == false)
                                        @if(Auth::user()->hasAnyRole(['Administrator', 'Instructor']))
                                            <hr>

                                            <div class="d-flex gap-2">
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal-{{ $submission->slug  }}">Grade Assignment</button>
                                            </div>
                                            <div class="modal fade" id="basicModal-{{ $submission->slug  }}" tabindex="-1" aria-labelledby="basicModalLabel"
                                            aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="basicModalLabel">Grade Student Assignment</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('submission.grade.store',$submission->slug)}}" method="POST" enctype="multipart/form-data">@csrf
                                                            <div class="modal-body">
                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Assignment Score:</label>
                                                                    <input type="number" class="form-control" placeholder="0" name="student_score" value="{{ $submission->assignment->max_score }}" readonly>
                                                                    <x-input-error :messages="$errors->get('student_score')" class="mt-2 text-danger" max="10" />
                                                                </div>
                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Student Score:</label>
                                                                    <select data-placeholder="Select a score..." class="form-control select-icons" name="max_score" required>
                                                                        <option value="{{ old('assignment_score') ?? $submission->student_score}}"> {{ old('assignment_score') ?? $submission->student_score }}</option>
                                                                        <option value=""></option>
                                                                        @for ($i = $submission->assignment->max_score; $i >= 0; $i--)
                                                                            <option value="{{ $i }}"> {{ $i }} </option>
                                                                        @endfor
                                                                    </select>
                                                                    <x-input-error :messages="$errors->get('assignment_score')" class="mt-2 text-danger" max="10" />
                                                                </div>
                                                                <div class="mb-3 col-md-12">
                                                                    <label class="form-label">Submission Remarks:</label>
                                                                    <textarea class="form-control" placeholder="Assignment Remarks" name="assignment_remark" required>{{ old('assignment_remark') ?? $submission->submission_remark }}</textarea>
                                                                    <x-input-error :messages="$errors->get('assignment_remark')" class="mt-2 text-danger" />
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-warning">
                                You haven’t submitted anything for this assignment yet.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
