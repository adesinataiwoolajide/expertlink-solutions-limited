@php $title = "Edit a course"; $segments = Request::segments();  @endphp
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
                <li class="breadcrumb-item"><a href="{{ route('course.create') }}" title="Create a {{ $segments[1]}}">Create a {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit a {{ $segments[1]}}</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Please fill the below form to Create Update a Course details</h5>
            </div>
            <div class="card-body">
                <div class="row gx-3">

                    <div class="col-lg-12 col-md-12">
                        <form action="{{ route('course.update',$course->slug) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Name:</label>
                                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Intro to Web Development" value="{{ old('course_name') ?? $course->course_name }}" required>
                                    <input type="hidden" name="previous_name" value="{{ $course->course_name }}">
                                    <x-input-error :messages="$errors->get('course_name')" class="mt-2 text-danger" />
                                    <div id="course-name-feedback" class="mt-2 text-danger"></div>
                                </div>
                               
                                
                                <div class="mb-3 col-md-5">
                                    <label class="form-label">Select Program:</label>
                                    <select name="program_name" class="form-control select2" id="searchableSelect" required>
                                        <option value="{{  old('program_name') ?? $program_name }}" selected>{{ old('program_name')  ?? $program_name}}</option>
                                        <option value=""></option>
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
                                    <input type="number" class="form-control" placeholder="50000" name="course_price" value="{{ old('course_price') ?? $course->course_price  }}" required>
                                    <x-input-error :messages="$errors->get('course_price')" class="mt-2 text-danger" />
                                </div>
                                @php
                                    $trainingTypes = getTrainings();
                                    $selectedTypes = old('training_type', []);
                                    $fromDB = $course->training_type;
                                @endphp

                                <div class="mb-4 col-md-12">
                                    <label for="multiSelect" class="form-label fw-bold text-primary">
                                        <i class="bi bi-journal-text me-1"></i> Training Type
                                    </label>
                                    <select name="training_type[]" id="multiSelect" class="form-select select2-multi border-primary shadow-sm" multiple required>

                                        @if($selectedType == null)
                                            <option value="{{ $course->training_type }}" selected>{{ $course->training_type }}</option>
                                        @else
                                            @foreach ($selectedType as $type)
                                                <option value="{{ $type }}" {{ in_array($type, $selectedType) ? 'selected' : '' }}>
                                                    {{ ucfirst($type) }}
                                                </option>
                                            @endforeach

                                        @endif
                                        <option value=""></option>
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
                                    <textarea class="form-control summernote" name="basic_requirements" required>{{ old('basic_requirements') ??  $course->basic_requirements }}</textarea>
                                    <x-input-error :messages="$errors->get('basic_requirements')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Outline:</label>
                                    <textarea class="form-control summernote" name="course_outline" required>{{ old('course_outline') ?? $course->course_outline }}</textarea>
                                    <x-input-error :messages="$errors->get('course_outline')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Learning Module:</label>
                                    <textarea class="form-control summernote" name="learning_module" required>{{ old('learning_module') ?? $course->learning_module }}</textarea>
                                    <x-input-error :messages="$errors->get('learning_module')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Schedule:</label>
                                    <textarea class="form-control summernote" name="course_schedule" required>{{ old('course_schedule') ??  $course->course_schedule }}</textarea>
                                    <x-input-error :messages="$errors->get('course_schedule')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Overview:</label>
                                    <textarea class="form-control summernote" name="course_overview" required>{{ old('course_overview') ??  $course->course_overview }}</textarea>
                                    <x-input-error :messages="$errors->get('course_overview')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Benefits:</label>
                                    <textarea class="form-control summernote" name="benefits" required>{{ old('benefits') ??  $course->benefits}}</textarea>
                                    <x-input-error :messages="$errors->get('benefits')" class="mt-2 text-danger" />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="imageUpload">Course Banner:</label>
                                    <input type="file" class="form-control" name="banner" id="imageUpload" name="banner" accept=".png,.jpg,.jpeg,.svg">
                                    <x-input-error :messages="$errors->get('banner')" class="mt-2 text-danger" />
                                    <div id="banner-feedback" class="mt-2 text-danger"></div>
                                    <div id="imagePreview" class="mt-3 border rounded p-3 bg-light text-center d-none" style="min-height: 220px;">
                                        <small class="text-muted">Image preview will appear here</small>
                                    </div>
                                    <img src="{{ asset('course-banner/'. $course->banner )}}" class="img-fluid login-logo" style="width: auto; height: 300px;" alt="" />

                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Course Details</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</x-app-layout>