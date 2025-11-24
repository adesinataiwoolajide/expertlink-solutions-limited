<x-app-layout>
    
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title">{{ $note->topic }} - Assignments</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('mycourse.note.read', [$note->slug, $note->courseSlug]) }}" 
                    class="btn btn-sm btn-outline-primary">
                        Read Course Note
                    </a>

                    <a href="{{ route('mycourse.note.index', [$note->courseSlug]) }}" 
                    class="btn btn-sm btn-outline-info">
                        All Course Note
                    </a>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="tabs-with-badges" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active px-4 py-2 d-flex align-items-center" id="badge-tab-one"
                            data-bs-toggle="tab" data-bs-target="#badge-content-one" type="button" role="tab"
                            aria-controls="badge-content-one" aria-selected="true">
                            <i class="ri-task-line me-2"></i> Assignment
                            <span class="badge bg-danger ms-2 rounded-pill">!</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-four"
                            data-bs-toggle="tab" data-bs-target="#badge-content-four" type="button" role="tab"
                            aria-controls="badge-content-four" aria-selected="false">
                            <i class="ri-award-line me-2"></i> List of Assignments
                            <span class="badge bg-info ms-2 rounded-pill">{{ count($assignments) ?? 0 }}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-two"
                            data-bs-toggle="tab" data-bs-target="#badge-content-two" type="button" role="tab"
                            aria-controls="badge-content-two" aria-selected="false">
                            <i class="ri-bar-chart-line me-2"></i> Performance
                            <span class="badge bg-success ms-2 rounded-pill">{{ count($assignments) ?? 0 }}</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-three"
                            data-bs-toggle="tab" data-bs-target="#badge-content-three" type="button" role="tab"
                            aria-controls="badge-content-three" aria-selected="false">
                            <i class="ri-award-line me-2"></i> Results
                            <span class="badge bg-warning ms-2 rounded-pill">!</span>
                        </button>
                    </li>
                </ul>
                @include('layouts.alert')
                <div class="tab-content border border-danger rounded p-4" id="tabs-with-badges-content">
                    <div class="tab-pane fade show active" id="badge-content-one" role="tabpanel" aria-labelledby="badge-tab-one">
                        <div class="row gx-3">
                            @if(Auth::user()->hasAnyRole(['Administrator','Instructor']))
                                <form action="{{ route('store.course.assignments',$note->slug)}}" method="POST" enctype="multipart/form-data">@csrf

                                    <input type="hidden" name="courseSlug" value="{{ $note->courseSlug }}">
                                    <input type="hidden" name="noteSlug" value="{{ $note->slug }}">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Submission Due Date:</label>
                                            <input type="text" class="form-control datepicker-time" name="due_date" placeholder="Enter the Topic" value="{{ old('due_date') }}" required>
                                            <x-input-error :messages="$errors->get('due_date')" class="mt-2 text-danger" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label">Assignment Score:</label>
                                            <select data-placeholder="Select a score..." class="form-control select-icons" name="max_score" required>
                                                <option value="{{ old('max_score') }}"> {{ old('max_score') ?? ' -- Select a score --'}}</option>
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}"> {{ $i }} </option>
                                                @endfor
                                            </select>
                                            <x-input-error :messages="$errors->get('max_score')" class="mt-2 text-danger" />
                                        </div>
                                        <div class="mb-3 col-md-12">
                                            <label class="form-label">Question:</label>
                                            <textarea class="form-control summernote" name="description" id="content" required>{!! old('description') ?? "<p> Please enter the assignment contents here</p>" !!}</textarea>
                                            <x-input-error :messages="$errors->get('description')" class="mt-2 text-danger" />
                                        </div>
                                        <div class="col-12 text-end mt-4">
                                            <button type="submit" class="btn btn-primary">Save The Assignment</button>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="badge-content-four" role="tabpanel" aria-labelledby="badge-tab-four">
                        @if(count($assignments) > 0)
                            <div class="table-responsive">
                                <table id="basicExample" class="table custom-table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Question</th>
                                            <th>Due Date</th>
                                            <th>Total Grade</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($assignments as $index => $assignment)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td> <div class="text-dark">{!! $assignment->description !!}</div></td>
                                            
                                            <td>{{ $assignment->due_date }}</td>
                                            <td>{{ $assignment->max_score }}</td>
                                            <td>{{ $assignment->created_at }}
                                                <br> By: {{ $assignment->instructor ? $assignment->instructor->first_name . ' ' . $assignment->instructor->last_name : 'NIL' }}
                                            </td>
                                            <td>
                                            
                                                @if(Auth::user()->hasAnyRole(['Administrator','Instructor']))
                                                    <a href="" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#basicModal-{{ $assignment->slug }}">Edit</a>
                                                    @if($assignment->submissions->count() > 0)
                                                        <a href="" class="btn btn-outline-primary">Grade</a>
                                                    @endif
                                                    <div class="modal fade" id="basicModal-{{ $assignment->slug }}" tabindex="-1" aria-labelledby="basicModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="basicModalLabel">Edit Assignment {{ $assignment->slug }}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('update.course.assignments',$assignment->slug)}}" method="POST" enctype="multipart/form-data">@csrf
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="courseSlug" value="{{ $note->courseSlug }}">
                                                                        <input type="hidden" name="noteSlug" value="{{ $note->slug }}">
                                                                        <div class="row">
                                                                            <div class="mb-3 col-md-6">
                                                                                <label class="form-label">Submission Due Date:</label>
                                                                                <input type="text" class="form-control datepicker-time" name="due_date" placeholder="Enter the Topic" value="{{ old('due_date') ?? $assignment->due_date }}" required>
                                                                                <x-input-error :messages="$errors->get('due_date')" class="mt-2 text-danger" />
                                                                            </div>
                                                                            <div class="mb-3 col-md-6">
                                                                                <label class="form-label">Assignment Score:</label>
                                                                                <select data-placeholder="Select a score..." class="form-control select-icons" name="max_score" required>
                                                                                    <option value="{{ old('max_score') ?? $assignment->max_score  }}"> {{ old('max_score') ?? $assignment->max_score  }}</option>
                                                                                    @for ($i = 1; $i <= 10; $i++)
                                                                                        <option value="{{ $i }}"> {{ $i }} </option>
                                                                                    @endfor
                                                                                </select>
                                                                                <x-input-error :messages="$errors->get('max_score')" class="mt-2 text-danger" />
                                                                            </div>
                                                                            <div class="mb-3 col-md-12">
                                                                                <label class="form-label">Question:</label>
                                                                                <textarea class="form-control summernote" name="description" id="content" required>{!! old('description') ?? $assignment->description  !!}</textarea>
                                                                                <x-input-error :messages="$errors->get('description')" class="mt-2 text-danger" />
                                                                            </div>
                                                                        
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

                                                @if(Auth::user()->hasAnyRole(['Administrator','Student']))
                                                    <a href="" class="btn btn-outline-primary">Submit Answer</a>
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info text-center mt-4" role="alert">
                                <h5 class="fw-bold">No Assignments Available</h5>
                                <p class="mb-0">
                                    There are currently no assignments for this course. 
                                    <br>Please check back later or contact your instructor for updates.
                                   
                                </p>
                            </div>

                        @endif
                    </div>

                    <div class="tab-pane fade" id="badge-content-two" role="tabpanel" aria-labelledby="badge-tab-two">
                        <ul class="list-group">
                            @forelse($assignments as $assignment)
                                <li class="list-group-item">
                                    {{ $assignment->title }} - {{ $assignment->submission_status }}
                                </li>
                            @empty
                                <li class="list-group-item text-muted">No assignments submitted yet.</li>
                            @endforelse
                        </ul>
                        {{ $assignments->links() }}
                    </div>
                    <div class="tab-pane fade" id="badge-content-three" role="tabpanel" aria-labelledby="badge-tab-three">
                        <div class="row gx-3">
                            <div class="col-md-6 mb-3">
                                <div class="card border border-danger">
                                    <div class="card-body">
                                        <h6 class="card-title text-danger mb-3">Security Settings</h6>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="twoFactorAuth"
                                                checked>
                                            <label class="form-check-label" for="twoFactorAuth">Two-factor
                                                authentication</label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="loginAlerts"
                                                checked>
                                            <label class="form-check-label" for="loginAlerts">Login alerts</label>
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
    </div>
</x-app-layout>
