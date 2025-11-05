@php $title =  "Create Course Note"; $segments = Request::segments(); $number=1;  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('course.note.index',$courseSlug) }}" title="View all {{ $segments[1]}}">View all {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create {{ $segments[1]}}</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Please fill the below form to Create a Course Note for {{ $course->course_name ?? '' }}</h5>
            </div>
            <div class="card-body">
                <div class="row gx-3">
                    <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">@csrf

                        <input type="hidden" name="programSlug" value="{{ $course->programSlug }}">
                        <input type="hidden" name="courseSlug" value="{{ $courseSlug }}">
                        <input type="hidden" name="allocationSlug" value="{{ $allocationSlug }}">
                        
                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Course Name:</label>
                                <input type="text" class="form-control" value="{{ $course->course_name ?? '' }}" readonly>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Topic:</label>
                                <input type="text" class="form-control" name="topic" placeholder="Enter the Topic" value="{{ old('topic') }}" required>
                                <x-input-error :messages="$errors->get('topic')" class="mt-2 text-danger" />
                            </div>

                             @foreach (['link_one', 'link_two', 'link_three', 'link_four'] as $index => $link)
                                <div class="mb-3 col-md-4">
                                    <label class="form-label">YouTube Link {{ $index + 1 }}:</label>
                                    <input type="text" class="form-control" name="{{ $link }}" value="{{ old($link) ?? "https://www.youtube.com/watch?v" }}">
                                    <x-input-error :messages="$errors->get($link)" class="mt-2 text-danger" />
                                </div>
                            @endforeach
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Course Note Content:</label>
                                <textarea class="form-control summernote" name="content" id="content" required>{{ old('content') ?? "<p>Please enter the course contents here</p>" }}</textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2 text-danger" />
                                
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label font-bold">Reference Materials:</label>
                                <div class="container mt-4">
                                    <div id="dropZone" class="border border-primary border-dashed rounded p-4 text-center mb-4"
                                        ondragover="event.preventDefault()" ondrop="handleDrop(event)">
                                        <p class="mb-0 text-muted">Drag & drop files here or click to upload</p>
                                        <input type="file" id="materialInput" name="material[]" accept=".pdf,.jpg,.jpeg,.png,.ppt,.pptx" multiple hidden />
                                        <button class="btn btn-primary mt-2" onclick="document.getElementById('materialInput').click()">Browse Files</button>
                                    </div>
                                    <div class="row" id="filePreview"></div>
                                    <x-input-error :messages="$errors->get('material')" class="mt-2 text-danger" />
                                </div>
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="postNote">Choose when to post the note:</label>
                                <select id="postNote" name="postNote" id="postNote" class="form-control" required>
                                    <option value=""></option>
                                    <option value="now">Post Note Now</option>
                                    <option value="later">Post Note Later</option>
                                </select>
                            </div>
                           
                            <div class="col-12 text-end mt-4">
                                <button type="submit" class="btn btn-primary">Save The Note</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<!-- Script -->
<script>
    const postNoteSelect = document.getElementById('postNote');
    const submitBtn = document.getElementById('submitBtn');

    postNoteSelect.addEventListener('change', function () {
        submitBtn.disabled = this.value === '';
    });

    const input = document.getElementById('materialInput');
    const preview = document.getElementById('filePreview');
    let selectedFiles = [];
    const MAX_SIZE_MB = 2;
    input.addEventListener('change', (e) => {
        const newFiles = Array.from(e.target.files).filter(file => {
            if (file.size > MAX_SIZE_MB * 1024 * 1024) {
                alert(`"${file.name}" is too large. Max size is ${MAX_SIZE_MB}MB.`);
                return false;
            }
            return true;
        });
        selectedFiles = selectedFiles.concat(newFiles);
        renderPreview();
    });

    function handleDrop(e) {
        e.preventDefault();
        const droppedFiles = Array.from(e.dataTransfer.files).filter(file => {
            if (file.size > MAX_SIZE_MB * 1024 * 1024) {
                alert(`"${file.name}" is too large. Max size is ${MAX_SIZE_MB}MB.`);
                return false;
            }
            return true;
        });
        selectedFiles = selectedFiles.concat(droppedFiles);
        renderPreview();
    }

    function renderPreview() {
        preview.innerHTML = '';
        selectedFiles.forEach((file, index) => {
        const fileSize = (file.size / 1024).toFixed(2); // KB
        const fileCard = document.createElement('div');
        fileCard.className = 'col-md-4 mb-4';

        fileCard.innerHTML = `
            <div class="bg-white border border-gray-200 p-3 rounded shadow-sm h-100 d-flex flex-column justify-content-between">
                <div class="d-flex align-items-center mb-2">
                    <div class="d-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded me-2" style="width: 24px; height: 24px;">
                        <i class="fas fa-file-alt"></i>
                    </div>
                    <div class="flex-grow-1">
                        <p class="mb-0 fw-medium small" style="word-break: break-word;">${file.name}</p>
                        <p class="mb-0 text-muted small">${fileSize} KB</p>
                    </div>
                </div>
                <div class="mt-auto text-end">
                    <button type="button" onclick="removeFile(${index})" class="btn btn-sm btn-outline-danger">
                        <i class="fas fa-trash-alt"></i> Remove
                    </button>
                </div>
            </div>
        `;

        preview.appendChild(fileCard);
        });

        // Sync input files
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        input.files = dataTransfer.files;
    }

    function removeFile(index) {
        selectedFiles.splice(index, 1);
        renderPreview();
    }
</script>
</x-app-layout>