@php $title = "Create a course"; $segments = Request::segments();  @endphp
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
    @include('layouts.alert')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Please fill the below form to Create a Course</h5>
            </div>
            <div class="card-body">
                <div class="row gx-3">

                    <div class="col-lg-12 col-md-12">
                        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Name:</label>
                                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Intro to Web Development" value="{{ old('course_name') }}" required>
                                    <x-input-error :messages="$errors->get('course_name')" class="mt-2 text-danger" />
                                    <div id="course-name-feedback" class="mt-2 text-danger"></div>
                                </div>
                               
                                <div class="mb-3 col-md-5">
                                    <label class="form-label">Select Program:</label>
                                    <select name="program_name" class="form-control select2" id="searchableSelect" required>
                                        <option value="{{  old('program_name') }}">{{ old('program_name')  ?? "-- Choose a Program --"}}</option>
                                        @foreach ($programs as $program)
                                            <option value="{{ $program->slug }}" {{ old('program_name') == $program->program_name ? 'selected' : '' }}>
                                                {{ $program->program_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('program_name')" class="mt-2 text-danger" />
                                </div>
                                <div class="mb-3 col-md-3">
                                    <label class="form-label">Course Price (₦):</label>
                                    <input type="number" class="form-control" placeholder="50000" name="course_price" value="{{ old('course_price') }}" required>
                                    <x-input-error :messages="$errors->get('course_price')" class="mt-2 text-danger" />
                                </div>
                                @php
                                    $trainingTypes = getTrainings();
                                    $selectedTypes = old('training_type', []);
                                @endphp
                                <input type="hidden" class="form-control" id="ratings" name="ratings" value="5">
                                <div class="mb-3 col-md-3">
                                    <label for="rangeWithValue" class="form-label">Course Discount(%): <span id="rangeValue">0</span></label>
                                    <input type="range" class="form-range" id="rangeWithValue" min="0" max="50" value="{{ old('course_discount') ?? 0 }}" oninput="document.getElementById('rangeValue').textContent = this.value"
                                    name="course_discount"> <x-input-error :messages="$errors->get('course_discount')" class="mt-2 text-danger" />
                                </div>
                               
                                <div class="mb-4 col-md-9">
                                    <label for="multiSelect" class="form-label fw-bold text-primary">
                                        <i class="bi bi-journal-text me-1"></i> Training Type
                                    </label>
                                    <select name="training_type[]" id="multiSelect" class="form-select select2-multi border-primary shadow-sm" multiple required>
                                        
                                        @foreach ($trainingTypes as $type)
                                            <option value="{{ $type }}" {{ in_array($type, $selectedTypes) ? 'selected' : '' }}>
                                                {{ ucfirst($type) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('training_type')" class="mt-2 text-danger small" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Basic Requirements:</label>
                                    <textarea class="form-control summernote" name="basic_requirements" required>{{ old('basic_requirements') ?? 'Enter basic requirements here...' }}</textarea>
                                    <x-input-error :messages="$errors->get('basic_requirements')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Outline:</label>
                                    <textarea class="form-control summernote" name="course_outline" required>{{ old('course_outline') ?? 'Provide a detailed course outline...' }}</textarea>
                                    <x-input-error :messages="$errors->get('course_outline')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Learning Module:</label>
                                    <textarea class="form-control summernote" name="learning_module" required>{{ old('learning_module') ?? 'Describe the learning modules...' }}</textarea>
                                    <x-input-error :messages="$errors->get('learning_module')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Schedule:</label>
                                    <textarea class="form-control summernote" name="course_schedule" required>{{ old('course_schedule') ?? 'Outline the course schedule...' }}</textarea>
                                    <x-input-error :messages="$errors->get('course_schedule')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Overview:</label>
                                    <textarea class="form-control summernote" name="course_overview" required>{{ old('course_overview') ?? 'Summarize the course overview...' }}</textarea>
                                    <x-input-error :messages="$errors->get('course_overview')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Benefits:</label>
                                    <textarea class="form-control summernote" name="benefits" required>{{ old('benefits') ?? 'List the benefits of this course...' }}</textarea>
                                    <x-input-error :messages="$errors->get('benefits')" class="mt-2 text-danger" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="imageUpload">Course Banner:</label>
                                    <input type="file" class="form-control" name="banner" id="imageUpload" name="banner" accept=".png,.jpg,.jpeg,.svg" required>
                                    <x-input-error :messages="$errors->get('banner')" class="mt-2 text-danger" />
                                    <div id="banner-feedback" class="mt-2 text-danger"></div>
                                    <div id="imagePreview" class="mt-3 border rounded p-3 bg-light text-center d-none" style="min-height: 220px;">
                                        <small class="text-muted">Image preview will appear here</small>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="videoUpload">Course Introduction Video:</label>
                                    <input type="file" class="form-control" name="course_introduction" id="course_introduction" accept="video/mp4,video/webm,video/ogg" required>
                                    <x-input-error :messages="$errors->get('course_introduction')" class="mt-2 text-danger" />

                                    <button type="button" id="deleteVideoBtn" class="btn btn-sm btn-danger mt-2" style="display: none;">Delete Video</button>

                                    <!-- Video Preview -->
                                    <video id="videoPreview" width="100%" height="auto" controls style="margin-top: 1rem; display: none;"></video>

                                </div>


                            </div>
                            <button type="submit" class="btn btn-primary">Create Course</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const courseInput = document.getElementById('course_name');
        const feedback = document.getElementById('course-name-feedback');

        courseInput.addEventListener('blur', function () {
            const name = this.value.trim();

            feedback.textContent = '';
            feedback.classList.remove('text-success', 'text-danger');

            if (name === '') {
                feedback.textContent = 'Course name is required.';
                feedback.classList.add('text-danger');
                return;
            }

            fetch("{{ route('check.course.name') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ course_name: name })
            })
            .then(response => {
                if (!response.ok) return response.json().then(err => Promise.reject(err));
                return response.json();
            })
            .then(data => {
                feedback.textContent = 'Course name is available.';
                feedback.classList.add('text-success');
            })
            .catch(error => {
                if (error.errors && error.errors.course_name) {
                    feedback.textContent = error.errors.course_name[0];
                    feedback.classList.add('text-danger');
                } else {
                    feedback.textContent = 'Validation failed. Please try again.';
                    feedback.classList.add('text-danger');
                }
            });
        });

      
    document.getElementById('course_introduction').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('videoPreview');
        const deleteBtn = document.getElementById('deleteVideoBtn');

        if (file && file.type.startsWith('video/')) {
            const url = URL.createObjectURL(file);
            preview.src = url;
            preview.style.display = 'block';
            deleteBtn.style.display = 'inline-block';
        } else {
            preview.src = '';
            preview.style.display = 'none';
            deleteBtn.style.display = 'none';
        }
    });

    document.getElementById('deleteVideoBtn').addEventListener('click', function () {
        const confirmDelete = confirm("Are you sure you want to remove this video?");
        if (confirmDelete) {
            const input = document.getElementById('course_introduction');
            const preview = document.getElementById('videoPreview');
            const deleteBtn = document.getElementById('deleteVideoBtn');

            input.value = '';
            preview.src = '';
            preview.style.display = 'none';
            deleteBtn.style.display = 'none';
        }
    });
</script>
</script>

</x-app-layout>