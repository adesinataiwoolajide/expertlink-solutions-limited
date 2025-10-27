@php $title = "View all Programms"; $segments = Request::segments();  @endphp
<x-app-layout>
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
                                <input type="file" class="form-control" id="banner" name="banner" accept=".png,.jpg,.jpeg,.svg" required>
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
   <script>
        const programInput = document.getElementById('program_name');
        const feedback = document.getElementById('program-name-feedback');
        const submitBtn = document.getElementById('submit-btn');

        programInput.addEventListener('blur', function () {
            const name = this.value.trim();

            // Reset button and feedback
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
