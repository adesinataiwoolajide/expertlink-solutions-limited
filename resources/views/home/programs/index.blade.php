@php $title = "View all Programms"; $segments = Request::segments();  @endphp
<x-app-layout>
    {{-- @include('layouts.tables') --}}
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">View All {{ $segments[1]}}</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')
    <div class="row gx-3 mt-4">
        <div class="col-lg-12 col-ms-12">
            <!-- Basic Input Fields Column -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title text-dark">Create new system user</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Program Name:</label>
                                <input type="text" class="form-control" id="program_name" name="program_name" value="{{ old('program_name') }}" required>
                                <x-input-error :messages="$errors->get('program_name')" class="mt-2 text-danger" />
                                <div id="program-name-feedback" class="mt-2 text-danger"></div>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="form-label">Program Banner:</label>
                                <input type="file" class="form-control" id="imageUpload" name="banner" accept=".png,.jpg,.jpeg,.svg" required>
                                <x-input-error :messages="$errors->get('banner')" class="mt-2 text-danger" />
                                <div id="banner-feedback" class="mt-2 text-danger"></div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary" id="submit-btn" disabled>Create a Program</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-3 mt-4">
         <ul class="nav nav-tabs" id="bordered-tabs" role="tablist">
            <li class="nav-item ms-3" role="presentation">
                <button class="nav-link active px-4 py-2" id="tab-one-tab" data-bs-toggle="tab"
                    data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one"
                    aria-selected="true">
                    View All Progamms 
                    <span class="badge bg-success ms-2 rounded-pill">{{count($programs)}}</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link px-4 py-2" id="tab-two-tab" data-bs-toggle="tab"
                    data-bs-target="#tab-two" type="button" role="tab" aria-controls="tab-two"
                    aria-selected="false">
                    View Deleted Programs
                    <span class="badge bg-danger ms-2 rounded-pill">{{count($trashedPrograms)}}</span>
                </button>
            </li>
            
        </ul>
        <div class="tab-content border border-primary rounded p-4" id="bordered-tabs-content">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one-tab">
                <div class="col-sm-12 col-12 mt-2">
                    @if(count($programs) > 0)
                    
                        <div class="card mb-3">
                            
                            <div class="card-body">
                                <!-- Table start -->
                                <div class="table-responsive">
                                    <table id="basicExample" class="table custom-table">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Program Name</th>
                                                <th  class="text-center"> Total Courses</th>
                                                <th  class="text-center">Total Students</th>
                                                <th>Date Created</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $num =1; @endphp
                                            @foreach($programs as $program)
                                                <tr>
                                                    <td>{{ $num }}</td>
                                                    <td>{{ $program->program_name }}</td>
                                                    <td class="text-center">0</td>
                                                    <td  class="text-center">
                                                        0
                                                    </td>
                                                    <td><span class="badge bg-success">{{ $program->created_at }}</span></td>
                                                    <td>
                                                        <a href="" data-bs-toggle="modal" data-bs-target="#basicModal-{{ $program->slug }}"><span class="badge bg-primary">Edit </span></a>
                                                        <a href="" data-bs-toggle="modal"data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $program->slug }}">
                                                            <span class="badge bg-danger"> Delete </span> 
                                                        </a>

                                                    </td>
                                                    <div class="modal fade" id="basicModal-{{ $program->slug }}" tabindex="-1" aria-labelledby="basicModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="basicModalLabel">Edit {{ $program->program_name }} Details</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('program.update',$program->slug) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="mb-3 col-md-12">
                                                                                <label class="form-label">Program Name:</label>
                                                                                <input type="text" class="form-control" id="program_name" name="program_name" value="{{ old('program_name') ?? $program->program_name }}" required>
                                                                                <input type="hidden" name="previous_name" value="{{ $program->program_name }}">
                                                                                <x-input-error :messages="$errors->get('program_name')" class="mt-2 text-danger" />
                                                                                <div id="program-name-feedback" class="mt-2 text-danger"></div>
                                                                            </div>

                                                                            <div class="mb-3 col-md-12">
                                                                                <img src="{{ asset('program-banner/'. $program->banner )}}" class="img-fluid login-logo" style="width: 400px; height: 200px;" alt="" />
                                                                            </div>

                                                                            <div class="mb-3 col-md-12">
                                                                                <label class="form-label">Change Program Banner:</label>
                                                                                <input type="file" class="form-control" id="imageUpload" name="banner" accept=".png,.jpg,.jpeg,.svg">
                                                                                <x-input-error :messages="$errors->get('banner')" class="mt-2 text-danger" />
                                                                                <div id="banner-feedback" class="mt-2 text-danger"></div>
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

                                                    <div class="modal fade" id="deleteModal-{{ $program->slug }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $program->slug }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-warning">
                                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $program->slug }}">Confirm Deletion</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to delete <strong>{{ $program->program_name }}</strong>? This action cannot be undone.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <a href="{{ route('program.delete', $program->slug) }}" class="btn btn-danger">Yes, Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </tr>
                                                @php $num++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                            
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="alert alert-warning text-center">
                            No program records found.
                        </div>

                    @endif
                </div>
            </div>
            <div class="tab-pane fade" id="tab-two" role="tabpanel" aria-labelledby="tab-two-tab">
                <div class="col-sm-12 col-12">
                    @if(count($trashedPrograms) > 0)
                        <div class="card mb-3">
                            <div class="card-body">
                            
                                <div class="table-responsive">
                                    <table id="basicExample" class="table custom-table">

                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Program Name</th>
                                                <th  class="text-center"> Total Courses</th>
                                                <th  class="text-center">Total Students</th>
                                                <th>Date Deleted</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $nums =1; @endphp
                                            @foreach($trashedPrograms as $trashed)
                                                <tr>
                                                    <td>{{ $nums }}</td>
                                                    <td>{{ $trashed->program_name }}</td>
                                                    <td class="text-center">0</td>
                                                    <td  class="text-center">
                                                        0
                                                    </td>
                                                    <td><span class="badge bg-success">{{ $trashed->deleted_at }}</span></td>
                                                    <td>
                                                    
                                                        <a href="" data-bs-toggle="modal"data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $trashed->slug }}">
                                                            <span class="badge bg-success"> Restore Record </span> 
                                                        </a>

                                                    </td>
                                                    
                                                    <div class="modal fade" id="deleteModal-{{ $trashed->slug }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $trashed->slug }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-success">
                                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $trashed->slug }}">Confirm Deletion</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Are you sure you want to restore <strong>{{ $trashed->program_name }}</strong>? This action cannot be undone.
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                    <a href="{{ route('program.restore', $trashed->slug) }}" class="btn btn-success">Yes, Restore</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </tr>
                                                @php $num++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                            
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning text-center">
                            No deleted program records found.
                        </div>

                    @endif

                </div>
            </div>
            
        </div>
       
    </div>
   <script>
        const programInput = document.getElementById('program_name');
        const feedback = document.getElementById('program-name-feedback');
        const submitBtn = document.getElementById('submit-btn');

        programInput.addEventListener('blur', function () {
            const name = this.value.trim();

            submitBtn.disabled = true;
            feedback.textContent = '';
            feedback.classList.remove('text-success', 'text-danger');

            if (name === '') {
                feedback.textContent = 'Program name is required.';
                feedback.classList.add('text-danger');
                return;
            }

            fetch("{{ route('check.program.name') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ program_name: name })
            })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    feedback.textContent = 'This program name already exists.';
                    feedback.classList.add('text-danger');
                    submitBtn.disabled = true;
                } else {
                    feedback.textContent = 'Program name is available.';
                    feedback.classList.add('text-success');
                    submitBtn.disabled = false;
                }
            })
            .catch(() => {
                feedback.textContent = 'Unable to validate program name.';
                feedback.classList.add('text-danger');
                submitBtn.disabled = true;
            });
        });
    </script>
</x-app-layout>
