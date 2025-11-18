@php $title = "My Courses"; $segments = Request::segments(); @endphp

<x-app-layout>
<div class="container-fluid py-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-4 col-lg-3 mb-4">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-primary text-white fw-bold">
                    Chapters & Progress
                </div>

                <div class="d-flex justify-content-between align-items-center p-3">
                    <small class="text-muted">Progress</small>
                    <button class="btn btn-sm btn-outline-danger" id="reset-progress">Reset</button>
                </div>

                <div class="p-3">
                    <div class="progress mb-3" style="height: 20px;">
                        <div class="progress-bar bg-success" role="progressbar" id="progress-bar" style="width: 0%;">
                            0%
                        </div>
                    </div>
                    <small class="text-muted" id="progress-text">0 of {{ $course->notes->count() }} chapters completed</small>
                </div>

                <div class="list-group list-group-flush">
                    @foreach($course->notes as $note)
                        <a href="#note-{{ $note->slug }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <span>{{ $note->chapter }}. {{ $note->title }}</span>
                            <span id="badge-{{ $note->slug }}">
                                @if($note->readStatus === 'completed')
                                    <span class="badge bg-success">✓</span>
                                @endif
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-8 col-lg-9">
            <div class="mb-4">
                <h2 class="fw-bold">{{ $course->course_name }}</h2>
                <p class="text-muted">{{ $course->program->program_name ?? 'Uncategorized' }}</p>
            </div>
            
            @foreach($course->notes as $note)
                <div class="card mb-4 shadow-sm" id="note-{{ $note->slug }}">
                    <div class="card-body">
                        <h5 class="fw-bold">Topic: {{ $note->topic }}</h5>
                        <p class="text-muted">Chapter: {{  $note->chapter }}</p>
                        <div class="note-content">
                            {!! $note->content !!}
                        </div>


                        @foreach(['link_one', 'link_two', 'link_three', 'link_four'] as $link)
                            @if($note->$link)
                                <a href="{{ $note->$link }}" target="_blank" class="btn btn-sm btn-outline-info me-2 mb-2">
                                    View Resource
                                </a>
                            @endif
                        @endforeach

                        @foreach($note->materials as $material)
                            @php $ext = pathinfo($material->course_file, PATHINFO_EXTENSION); @endphp
                            <div class="mb-3">
                                @if(in_array($ext, ['mp4', 'webm']))
                                    <video controls class="w-100" style="max-height: 400px;">
                                        <source src="{{ asset('course-materials/' . $material->course_file) }}" type="video/{{ $ext }}">
                                        Your browser does not support the video tag.
                                    </video>
                                @else
                                    <a href="{{ asset('course-materials/' . $material->course_file) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                        📄 Download File
                                    </a>
                                @endif
                            </div>
                        @endforeach

                        <!-- Completion Toggle -->
                        <button class="btn btn-sm toggle-completion {{ $note->readStatus === 'completed' ? 'btn-success' : 'btn-outline-success' }}"
                                data-note="{{ $note->slug }}" id="btn-{{ $note->slug }}">
                            {{ $note->readStatus === 'completed' ? 'Completed' : 'Mark as Completed' }}
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- AJAX Completion + Reset Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const totalNotes = {{ $course->notes->count() }};
    let completedNotes = {{ $course->notes->where('readStatus', 'completed')->count() }};

    function updateProgressBar() {
        const percent = Math.round((completedNotes / totalNotes) * 100);
        document.getElementById('progress-bar').style.width = percent + '%';
        document.getElementById('progress-bar').textContent = percent + '%';
        document.getElementById('progress-text').textContent = `${completedNotes} of ${totalNotes} chapters completed`;
    }

    updateProgressBar();

    document.querySelectorAll('.toggle-completion').forEach(button => {
        button.addEventListener('click', function () {
            const noteSlug = this.getAttribute('data-note');
            const btn = this;

            fetch(`{{ route('note.complete', ':slug') }}`.replace(':slug', noteSlug), {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'completed') {
                    btn.classList.remove('btn-outline-success');
                    btn.classList.add('btn-success');
                    btn.textContent = 'Completed';

                    const badge = document.getElementById('badge-' + noteSlug);
                    if (badge) {
                        badge.innerHTML = '<span class="badge bg-success">✓</span>';
                    }

                    completedNotes++;
                    updateProgressBar();
                }
            });
        });
    });

    document.getElementById('reset-progress').addEventListener('click', function () {
        if (!confirm('Are you sure you want to reset your progress?')) return;

        fetch(`{{ route('course.resetProgress', $course->slug) }}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'reset') {
                document.querySelectorAll('.toggle-completion').forEach(btn => {
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-outline-success');
                    btn.textContent = 'Mark as Completed';
                });

                document.querySelectorAll('[id^="badge-"]').forEach(badge => {
                    badge.innerHTML = '';
                });

                completedNotes = 0;
                updateProgressBar();
            }
        });
    });
});
</script>
</x-app-layout>