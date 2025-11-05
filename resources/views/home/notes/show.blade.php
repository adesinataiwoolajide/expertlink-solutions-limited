@php $title =  "View Course Note"; $segments = Request::segments(); $number=1;  @endphp
<x-app-layout>
    <div class="app-hero-header d-flex align-items-center m-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                    <a href="{{route('dashboard') }}" title="Home">
                        <i class="ri-home-4-line me-1"></i> <span class="visually-hidden">Home</span>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('course.note.index',$notes->courseSlug) }}" title="View all {{ $segments[1]}}">View all {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('note.create',[$notes->courseSlug, $allocation->slug]) }}" title="Create {{ $segments[1]}}">Create New {{ $segments[1]}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">View {{ $segments[1]}}</li>
            </ol>
        </nav>
        
    </div>
    @include('layouts.alert')
     <div class="col-md-12 mt-3">
        <div class="card">
            <div class="col-sm-12">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">{{ $notes->topic }}</h5>
                        <a href="{{ route('course.note.edit', ['slug' => $notes->slug]) }}" class="btn btn-sm btn-outline-primary">
                            Edit Course Note
                        </a>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="tabs-with-badges" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active px-4 py-2 d-flex align-items-center" id="badge-tab-one"
                                    data-bs-toggle="tab" data-bs-target="#badge-content-one" type="button" role="tab" aria-controls="badge-content-one" aria-selected="true">
                                    <i class="ri-book-open-line me-2"></i> Preview Course Note
                                    <span class="badge bg-danger ms-2 rounded-pill">!!!</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-two"
                                    data-bs-toggle="tab" data-bs-target="#badge-content-two" type="button" role="tab" aria-controls="badge-content-two" aria-selected="false">
                                    <i class="ri-book-line me-2"></i> Course Materials
                                    <span class="badge bg-success ms-2 rounded-pill">{{ count($materials) }}</span>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link px-4 py-2 d-flex align-items-center" id="badge-tab-three"
                                data-bs-toggle="tab" data-bs-target="#badge-content-three" type="button" role="tab" aria-controls="badge-content-three" aria-selected="false">
                                <i class="ri-settings-3-line me-2"></i> Course Videos
                                <span class="badge bg-warning ms-2 rounded-pill">4</span>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content border border-primary rounded p-4" id="tabs-with-badges-content">
                            <div class="tab-pane fade show active" id="badge-content-one" role="tabpanel" aria-labelledby="badge-tab-one" style="position: relative; padding: 20px;">
                                <div class="course-header" style="margin-bottom: 15px;">
                                    <h4 class="text-primary"><strong></strong>Course Name:</strong> {{ $course->course_name }}</h4>
                                    <h5 class="text-primary"><strong>Topic:</strong> {{ $notes->topic }}</h5>
                                </div>
                                <div class="course-note-description">
                                    {!! $notes->content !!}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="badge-content-two" role="tabpanel" aria-labelledby="badge-tab-two">
                                @php
                                    $iconMap = getIcons();
                                    $extensionColorMap = getFileColer();
                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'svg'];
                                    $pdfExtensions = ['pdf'];
                                    $materials = collect($materials)->sortBy(function ($material) use ($imageExtensions, $pdfExtensions) {
                                        $extension = pathinfo(strtolower($material->course_file), PATHINFO_EXTENSION);
                                        if (in_array($extension, $imageExtensions)) {
                                            return 0;
                                        } elseif (in_array($extension, $pdfExtensions)) {
                                            return 1;
                                        } else {
                                            return 2;
                                        }
                                    });
                                @endphp

                                <div class="row">
                                    @foreach ($materials as $material)
                                        @php
                                            $extension = pathinfo(strtolower($material->course_file), PATHINFO_EXTENSION);
                                            $iconClass = $iconMap[$extension] ?? $iconMap['default'];
                                            $color = $extensionColorMap[$extension] ?? $extensionColorMap['default'];
                                            $fileUrl = asset('storage/course-material/' . $material->course_file);
                                        @endphp

                                        @if (in_array($extension, $imageExtensions))
                                            
                                            <div class="col-md-12 mb-6">
                                                <div class="list-group-item">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <div class="icon-box sm bg-{{ $color }}-subtle text-{{ $color }} rounded-circle me-3">
                                                            <i class="{{ $iconClass }}"></i>
                                                        </div>
                                                        <div>{{ $material->course_file }}</div>
                                                    </div>
                                                   <div style="display: flex; justify-content: center;">
                                                        <img src="{{ $fileUrl }}" alt="Image Preview"
                                                            style="width: 100%; height: 50%; object-fit: cover; border-radius: 6px; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">
                                                    </div>

                                                </div>
                                            </div>

                                        @else
                                            
                                            <div class="col-12 mb-4">
                                                <div class="list-group-item">
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <div class="d-flex align-items-center">
                                                            <div class="icon-box sm bg-{{ $color }}-subtle text-{{ $color }} rounded-circle me-3">
                                                                <i class="{{ $iconClass }}"></i>
                                                            </div>
                                                            <div>{{ $material->course_file }}</div>
                                                        </div>
                                                        <div class="d-flex align-items-center">
                                                            <i class="ri-arrow-down-s-line text-muted me-2"></i>
                                                            <a href="{{ route('material.delete', $material->slug) }}"
                                                            onclick="return confirm('Are you sure you want to delete this file?')"
                                                            class="text-danger">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="mt-3">
                                                        @if ($extension === 'pdf')
                                                            <iframe src="{{ $fileUrl }}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="800" style="border: none;"></iframe>
                                                        @elseif ($extension === 'pptx')
                                                            @php
                                                                $encodedUrl = urlencode($fileUrl);
                                                                $pptxViewerUrl = "https://view.officeapps.live.com/op/view.aspx?src={$encodedUrl}&wdOrigin=BROWSELINK";
                                                            @endphp
                                                            <iframe src="{{ $pptxViewerUrl }}" width="100%" height="800" frameborder="0"></iframe>
                                                        @else
                                                            <div class="text-muted">Preview not available for .{{ $extension }} files.</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="badge-content-three" role="tabpanel" aria-labelledby="badge-tab-three">
                                <div class="row gx-3">
                                    @php
                                        $colors = ['primary', 'info', 'success', 'danger'];
                                    @endphp

                                    @foreach (['link_one', 'link_two', 'link_three', 'link_four'] as $index => $link)
                                        @php
                                            $color = $colors[$index % count($colors)]; $youtubeLink = $notes->$link ?? '';
                                        @endphp

                                        @if (str_contains($youtubeLink, 'youtube'))
                                            @if(strtolower($youtubeLink) != 'https://www.youtube.com/watch?v=' && !empty($youtubeLink))
                                                <div class="col-md-3 mb-3">
                                                    <div class="card border border-{{ $color }}">
                                                        <div class="card-body">
                                                            <h6 class="card-title text-{{ $color }} mb-3">Video Link {{ $index + 1 }}:</h6>
                                                            <a href="{{ $youtubeLink }}" target="_blank" class="d-flex align-items-center text-decoration-none mb-3">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor"
                                                                    class="bi bi-youtube me-2 text-{{ $color }}" viewBox="0 0 16 16">
                                                                    <path d="M8.051 1.999h-.102C3.837 1.999 1.999 3.837 1.999 8s1.838 6.001 6.001 6.001h.102c4.213 0 6.051-1.838 6.051-6.001s-1.838-6.001-6.051-6.001zM6.5 10.5V5.5l4 2.5-4 2.5z"/>
                                                                </svg>
                                                                <span class="text-{{ $color }}">Watch {{ $youtubeLink }}</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @else
                                            <div class="col-md-12 mb-3">
                                                <iframe width="100%" height="500" src="{{ $youtubeLink ?? '' }}" frameborder="1" scrolling="auto"></iframe>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>