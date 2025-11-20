<x-app-layout>
    <div class="card">
        <div class="card-body bg-light">
            <h4>{{ $note->topic }} - Your Progress</h4>

            <p>Assignments Progress: {{ $assignmentProgress }}%</p>
            <div class="progress mb-3">
                <div class="progress-bar bg-info" style="width: {{ $assignmentProgress }}%"></div>
            </div>

            <p>Tasks Progress: {{ $taskProgress }}%</p>
            <div class="progress mb-3">
                <div class="progress-bar bg-success" style="width: {{ $taskProgress }}%"></div>
            </div>

            <p>Overall Progress: {{ $overallProgress }}%</p>
            <div class="progress">
                <div class="progress-bar bg-primary" style="width: {{ $overallProgress }}%"></div>
            </div>
        </div>
    </div>
</x-app-layout>
