<form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    {{-- Hidden Inputs --}}
    <input type="hidden" name="subscription_id" value="{{ $course->subscription_id }}">
    <input type="hidden" name="course_id" value="{{ $course->course_id }}">
    <input type="hidden" name="allocation_id" value="{{ $allo->allocation_id }}">
    <input type="hidden" name="title" value="TITLE HERE">

    <div class="row">
        {{-- Course Name --}}
        <div class="mb-3 col-md-4">
            <label class="form-label">Course Name:</label>
            <input type="text" class="form-control" value="{{ $course->course_name ?? '' }}" readonly>
        </div>

        {{-- Course Code --}}
        <div class="mb-3 col-md-4">
            <label class="form-label">Course Code:</label>
            <input type="text" class="form-control" value="{{ $course->course_code ?? '' }}" readonly>
        </div>

        {{-- Subscription --}}
        <div class="mb-3 col-md-4">
            <label class="form-label">Subscription:</label>
            <input type="text" class="form-control" value="{{ $course->subs->description ?? '' }}" readonly>
        </div>

        {{-- Topic --}}
        <div class="mb-3 col-md-6">
            <label class="form-label">Topic:</label>
            <input type="text" class="form-control" name="topic" placeholder="Enter the Topic" value="{{ old('topic') }}" required>
            <x-input-error :messages="$errors->get('topic')" class="mt-2 text-danger" />
        </div>

        {{-- Description --}}
        <div class="mb-3 col-md-12">
            <label class="form-label">Description:</label>
            <textarea class="form-control summernote" name="content" id="content">{{ old('content') }}</textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2 text-danger" />
        </div>

        {{-- Reference Materials --}}
        <div class="mb-3 col-md-12">
            <label class="form-label">Reference Materials:</label>
            <input type="file" class="form-control" name="material[]" multiple>
            <x-input-error :messages="$errors->get('material')" class="mt-2 text-danger" />
        </div>

        {{-- YouTube Links --}}
        @foreach (['link_one', 'link_two', 'link_three', 'link_four'] as $index => $link)
            <div class="mb-3 col-md-6">
                <label class="form-label">YouTube Link {{ $index + 1 }}:</label>
                <input type="text" class="form-control" name="{{ $link }}" value="{{ old($link) }}">
                <x-input-error :messages="$errors->get($link)" class="mt-2 text-danger" />
            </div>
        @endforeach

        {{-- Submit Button --}}
        <div class="col-12 text-end mt-4">
            <button type="submit" class="btn btn-primary">Save The Note</button>
        </div>
    </div>
</form>