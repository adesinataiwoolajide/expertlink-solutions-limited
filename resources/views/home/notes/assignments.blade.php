<x-app-layout>
    <div class="card">
        <div class="card-body bg-light">
            <h4>{{ $note->topic }} - Your Assignments</h4>
            <ul class="list-group">
                @forelse($assignments as $assignment)
                    <li class="list-group-item">
                        {{ $assignment->title }} - {{ $assignment->status }}
                    </li>
                @empty
                    <li class="list-group-item text-muted">No assignments submitted yet.</li>
                @endforelse
            </ul>
            {{ $assignments->links() }}
        </div>
    </div>
</x-app-layout>
