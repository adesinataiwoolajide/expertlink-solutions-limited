<x-app-layout>
    <div class="col-sm-12">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title">{{ $note->topic }} - Tasks</h5>
                <div class="d-flex gap-2">
                    <a href="{{ route('mycourse.note.read', [$note->slug, $note->courseSlug]) }}" 
                    class="btn btn-sm btn-outline-primary">
                        Read Course Note
                    </a>

                    <a href="{{ route('mycourse.note.index', [$note->courseSlug]) }}" class="btn btn-sm btn-outline-info">
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
                            <i class="ri-task-line me-2"></i> Tasks
                            <span class="badge bg-danger ms-2 rounded-pill">5</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-two"
                            data-bs-toggle="tab" data-bs-target="#badge-content-two" type="button" role="tab"
                            aria-controls="badge-content-two" aria-selected="false">
                            <i class="ri-bar-chart-line me-2"></i> Performance
                            <span class="badge bg-success ms-2 rounded-pill">{{ count($tasks) ?? 0 }}</span>
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
                <div class="tab-content border border-danger rounded p-4" id="tabs-with-badges-content">
                    <div class="tab-pane fade show active" id="badge-content-one" role="tabpanel" aria-labelledby="badge-tab-one">
                        <div class="row gx-3">
                            <form action="" method="POST" enctype="multipart/form-data">@csrf

                                <input type="hidden" name="courseSlug" value="{{ $note->courseSlug }}">
                                <input type="hidden" name="noteSlug" value="{{ $note->slug }}">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Submission Due Date:</label>
                                        <input type="text" class="form-control datepicker-time" name="due_date" placeholder="Enter the Topic" value="{{ old('due_date') }}" required>
                                        <x-input-error :messages="$errors->get('due_date')" class="mt-2 text-danger" />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">Task Score:</label>
                                        <select data-placeholder="Select a score..." class="form-control select-icons" name="score" required>
                                            <option value="{{ old('score') }}"> {{ old('score') ?? ' -- Select a score --'}}</option>
                                            @for ($i = 1; $i <= 10; $i++)
                                                <option value="{{ $i }}"> {{ $i }} </option>
                                            @endfor
                                        </select>
                                        <x-input-error :messages="$errors->get('score')" class="mt-2 text-danger" />
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Question:</label>
                                        <textarea class="form-control summernote" name="description" id="content" required>{!! old('description') ?? "<p> Please enter the assignment contents here</p>" !!}</textarea>
                                        <x-input-error :messages="$errors->get('description')" class="mt-2 text-danger" />
                                    </div>
                                    <div class="col-12 text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Save The Task</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="badge-content-two" role="tabpanel" aria-labelledby="badge-tab-two">
                        <ul class="list-group">
                           @forelse($tasks as $task)
                                <li class="list-group-item">
                                    {{ $task->title }} - {{ $task->status }}
                                </li>
                            @empty
                                <li class="list-group-item text-muted">No tasks completed yet.</li>
                            @endforelse
                        </ul>
                        {{ $tasks->links() }}
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
