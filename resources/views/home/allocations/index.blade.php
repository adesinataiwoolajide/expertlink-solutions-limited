@php $title = "Course Allocations"; $segments = Request::segments(); $number=1;  @endphp
<x-app-layout>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
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
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">List of Course Allocations</h5>
            </div>
            <div class="card-body">
                <div class="row gx-3">
                    @if(Auth::user()->hasAnyRole(['Administrator',"Admin"]))
                        <div class="col-xxl-6 col-sm-12 col-12">
                            <div class="card shadow-sm border-0 rounded-4 mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="fw-bold mb-0">Allocations by Program</h5>
                                        <select id="allocationProgramChartType" class="form-select form-select-sm" style="width:auto;">
                                            <option value="bar" selected>Bar</option>
                                            <option value="polarArea">Polar Area</option>
                                            <option value="doughnut">Doughnut</option>
                                            <option value="pie">Pie</option>
                                            <option value="line">Line</option>
                                            <option value="radar">Radar</option>
                                        </select>
                                    </div>
                                    <div style="height:300px;">
                                        <canvas id="allocationProgramChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            const ctxAllocProgram = document.getElementById('allocationProgramChart').getContext('2d');

                            const allocProgramData = {
                                labels: @json($allocationByProgram->pluck('program')),
                                datasets: [{
                                    label: 'Allocations',
                                    data: @json($allocationByProgram->pluck('count')),
                                    backgroundColor: [
                                        '#4e73df','#1cc88a','#36b9cc','#f6c23e','#e74a3b','#858796'
                                    ],
                                    borderRadius: 6
                                }]
                            };

                            const allocProgramOptions = {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: true, position: 'right' },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                return context.raw + ' allocations';
                                            }
                                        }
                                    },
                                    datalabels: {
                                        color: '#fff',
                                        font: { weight: 'bold' },
                                        formatter: (value, context) => {
                                            const dataset = context.chart.data.datasets[0].data;
                                            const total = dataset.reduce((a, b) => a + b, 0);
                                            const percentage = ((value / total) * 100).toFixed(1);
                                            return percentage + '%';
                                        }
                                    }
                                },
                                scales: {
                                    y: { beginAtZero: true }
                                }
                            };

                            let allocProgramChart = new Chart(ctxAllocProgram, {
                                type: 'bar',
                                data: allocProgramData,
                                options: allocProgramOptions,
                                plugins: [ChartDataLabels]
                            });

                            document.getElementById('allocationProgramChartType').addEventListener('change', function(e) {
                                const newType = e.target.value;
                                allocProgramChart.destroy();
                                allocProgramChart = new Chart(ctxAllocProgram, {
                                    type: newType,
                                    data: allocProgramData,
                                    options: allocProgramOptions,
                                    plugins: [ChartDataLabels]
                                });
                            });
                        </script>
                        <div class="col-xxl-6 col-sm-12 col-12">
                            <div class="card shadow-sm border-0 rounded-4 mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="fw-bold mb-0">Allocations by Course</h5>
                                        <select id="allocationCourseChartType" class="form-select form-select-sm" style="width:auto;">
                                            <option value="radar" selected>Radar</option>
                                            <option value="bar">Bar</option>
                                            <option value="polarArea">Polar Area</option>
                                            <option value="doughnut">Doughnut</option>
                                            <option value="pie">Pie</option>
                                            <option value="line">Line</option>
                                        </select>
                                    </div>
                                    <div style="height:300px;">
                                        <canvas id="allocationCourseChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            const ctxAllocCourse = document.getElementById('allocationCourseChart').getContext('2d');

                            const allocCourseData = {
                                labels: @json($allocationByCourse->pluck('course')),
                                datasets: [{
                                    label: 'Allocations',
                                    data: @json($allocationByCourse->pluck('count')),
                                    backgroundColor: [
                                        '#4e73df','#1cc88a','#36b9cc','#f6c23e','#e74a3b','#858796'
                                    ],
                                    borderRadius: 6
                                }]
                            };

                            const allocCourseOptions = {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: true, position: 'right' },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                return context.raw + ' allocations';
                                            }
                                        }
                                    },
                                    datalabels: {
                                        color: '#fff',
                                        font: { weight: 'bold' },
                                        formatter: (value, context) => {
                                            const dataset = context.chart.data.datasets[0].data;
                                            const total = dataset.reduce((a, b) => a + b, 0);
                                            const percentage = ((value / total) * 100).toFixed(1);
                                            return percentage + '%';
                                        }
                                    }
                                },
                                scales: {
                                    y: { beginAtZero: true }
                                }
                            };

                            let allocCourseChart = new Chart(ctxAllocCourse, {
                                type: 'radar',
                                data: allocCourseData,
                                options: allocCourseOptions,
                                plugins: [ChartDataLabels]
                            });

                            document.getElementById('allocationCourseChartType').addEventListener('change', function(e) {
                                const newType = e.target.value;
                                allocCourseChart.destroy();
                                allocCourseChart = new Chart(ctxAllocCourse, {
                                    type: newType,
                                    data: allocCourseData,
                                    options: allocCourseOptions,
                                    plugins: [ChartDataLabels]
                                });
                            });
                        </script>

                        <div class="col-xxl-12 col-sm-12 col-12">
                            <div class="card shadow-sm border-0 rounded-4 mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="fw-bold mb-0">Allocations by Instructor</h5>
                                        <select id="allocationInstructorChartType" class="form-select form-select-sm" style="width:auto;">
                                            <option value="polarArea" selected>Polar Area</option>
                                            <option value="bar">Bar</option>
                                            
                                            <option value="doughnut">Doughnut</option>
                                            <option value="pie">Pie</option>
                                            <option value="line">Line</option>
                                            <option value="radar">Radar</option>
                                        </select>
                                    </div>
                                    <div style="height:300px;">
                                        <canvas id="allocationInstructorChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            const ctxAllocInstructor = document.getElementById('allocationInstructorChart').getContext('2d');

                            const allocInstructorData = {
                                labels: @json($allocationByInstructor->pluck('instructor')),
                                datasets: [{
                                    label: 'Allocations',
                                    data: @json($allocationByInstructor->pluck('count')),
                                    backgroundColor: [
                                        '#4e73df','#1cc88a','#36b9cc','#f6c23e','#e74a3b','#858796'
                                    ],
                                    borderRadius: 6
                                }]
                            };

                            const allocInstructorOptions = {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: true, position: 'right' },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                return context.raw + ' allocations';
                                            }
                                        }
                                    },
                                    datalabels: {
                                        color: '#fff',
                                        font: { weight: 'bold' },
                                        formatter: (value, context) => {
                                            const dataset = context.chart.data.datasets[0].data;
                                            const total = dataset.reduce((a, b) => a + b, 0);
                                            const percentage = ((value / total) * 100).toFixed(1);
                                            return percentage + '%';
                                        }
                                    }
                                },
                                scales: {
                                    y: { beginAtZero: true }
                                }
                            };

                            // ✅ Default chart type is Bar
                            let allocInstructorChart = new Chart(ctxAllocInstructor, {
                                type: 'polarArea',
                                data: allocInstructorData,
                                options: allocInstructorOptions,
                                plugins: [ChartDataLabels]
                            });

                            // Allow chart type switching
                            document.getElementById('allocationInstructorChartType').addEventListener('change', function(e) {
                                const newType = e.target.value;
                                allocInstructorChart.destroy();
                                allocInstructorChart = new Chart(ctxAllocInstructor, {
                                    type: newType,
                                    data: allocInstructorData,
                                    options: allocInstructorOptions,
                                    plugins: [ChartDataLabels]
                                });
                            });
                        </script>
                    @endif
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="basicExample" class="table custom-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Instructor Details</th>
                                <th>Course Name</th>
                                <th>Program Name</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($allocations as $index => $allocation)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $allocation->user->first_name ?? 'N/A' }}
                                        {{ $allocation->user->last_name ?? '' }}
                                        <br><small class="text-muted">{{ $allocation->user->email }}</small>
                                    </td>
                                    <td>
                                        {{ $allocation->course->course_name ?? 'N/A' }}
                                        <br> <a href="{{ route('course.show', $allocation->courseSlug) }}" class="btn btn-sm btn-primary text-white">View Course</a>
                                    </td>
                                    <td>
                                        {{ $allocation->program->program_namename ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $allocation->created_at ?? 'N/A' }}
                                        <br> <a href="{{ route('allocation.view', $allocation->slug) }}" class="btn btn-sm btn-info text-white">View Allocation</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No allocations found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

</x-app-layout>
