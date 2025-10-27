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
                                    <input type="text" class="form-control" placeholder="Intro to Web Development" name="course_name" value="{{ old('course_name') }}" required>
                                    <x-input-error :messages="$errors->get('course_name')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Price (₦):</label>
                                    <input type="number" class="form-control" placeholder="50000" name="course_price" value="{{ old('course_price') }}" required>
                                    <x-input-error :messages="$errors->get('course_price')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Banner:</label>
                                    <input type="file" class="form-control" name="banner" accept="image/*" required>
                                    <x-input-error :messages="$errors->get('banner')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Basic Requirements:</label>
                                    <textarea class="form-control summernote" name="basic_requirements" required>{{ old('basic_requirements') }}</textarea>
                                    <x-input-error :messages="$errors->get('basic_requirements')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Outline:</label>
                                    <textarea class="form-control summernote" name="course_outline" required>{{ old('course_outline') }}</textarea>
                                    <x-input-error :messages="$errors->get('course_outline')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Learning Module:</label>
                                    <textarea class="form-control summernote" name="learning_module" required>{{ old('learning_module') }}</textarea>
                                    <x-input-error :messages="$errors->get('learning_module')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Schedule:</label>
                                    <textarea class="form-control summernote" name="course_schedule" required>{{ old('course_schedule') }}</textarea>
                                    <x-input-error :messages="$errors->get('course_schedule')" class="mt-2 text-danger" />
                                </div>

                                {{-- <div class="mb-3 col-md-4">
                                    <label class="form-label">Training Type:</label>
                                    <textarea class="form-control summernote" name="training_type" required>{{ old('training_type') }}</textarea>
                                    <x-input-error :messages="$errors->get('training_type')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Payment Structure:</label>
                                    <textarea class="form-control summernote" name="payment_structure" required>{{ old('payment_structure') }}</textarea>
                                    <x-input-error :messages="$errors->get('payment_structure')" class="mt-2 text-danger" />
                                </div> --}}

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Overview:</label>
                                    <textarea class="form-control summernote" name="course_overview" required>{{ old('course_overview') }}</textarea>
                                    <x-input-error :messages="$errors->get('course_overview')" class="mt-2 text-danger" />
                                </div>

                                {{-- <div class="mb-3 col-md-4">
                                    <label class="form-label">Course Technologies:</label>
                                    <textarea class="form-control summernote" name="course_technologies" required>{{ old('course_technologies') }}</textarea>
                                    <x-input-error :messages="$errors->get('course_technologies')" class="mt-2 text-danger" />
                                </div>

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Packages Included:</label>
                                    <textarea class="form-control summernote" name="packages_included" required>{{ old('packages_included') }}</textarea>
                                    <x-input-error :messages="$errors->get('packages_included')" class="mt-2 text-danger" />
                                </div> --}}

                                <div class="mb-3 col-md-4">
                                    <label class="form-label">Benefits:</label>
                                    <textarea class="form-control summernote" name="benefits" required>{{ old('benefits') }}</textarea>
                                    <x-input-error :messages="$errors->get('benefits')" class="mt-2 text-danger" />
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Create Course</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>