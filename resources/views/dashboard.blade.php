<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .icon-box-lg {
            width: 55px;
            height: 55px;
        }
        .hover-card {
            transition: all 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .bg-gradient-primary { background: linear-gradient(45deg, #4e73df, #1cc88a); }
        .bg-gradient-success { background: linear-gradient(45deg, #1cc88a, #20c997); }
        .bg-gradient-warning { background: linear-gradient(45deg, #f6c23e, #fd7e14); }
        .bg-gradient-danger { background: linear-gradient(45deg, #e74a3b, #c82333); }
        .bg-gradient-info { background: linear-gradient(45deg, #36b9cc, #17a2b8); }
        .bg-gradient-secondary { background: linear-gradient(45deg, #858796, #6c757d); }
    </style>
    @if(Auth::user()->hasAnyRole(['Administrator',"Admin", "Instructor"]))
        <div class="row g-4">

            @if(Auth::user()->hasAnyRole(['Administrator',"Admin"]))
                <!-- Total Users -->
                <div class="col-xxl-2 col-sm-4 col-12">
                    <div class="card shadow-sm border-0 rounded-4 h-100 hover-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box-lg bg-gradient-info text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                                <i class="ri-account-pin-circle-fill fs-3"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0 counter">{{ number_format($totalUsers) }}</h3>
                                <p class="text-secondary small mb-0">Total Users</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-2 col-sm-4 col-12">
                    <div class="card shadow-sm border-0 rounded-4 h-100 hover-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box-lg bg-gradient-info text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                               <i class="ri-wallet-3-fill fs-3"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0 counter">{{ number_format($totalPayment) }}</h3>
                                <p class="text-secondary small mb-0">Total Revenue</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Total Programs -->
            <div class="col-xxl-2 col-sm-4 col-12">
                <div class="card shadow-sm border-0 rounded-4 h-100 hover-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-box-lg bg-gradient-primary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i class="ri-dashboard-2-fill fs-3"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0 counter">{{ number_format($totalPrograms) }}</h3>
                            <p class="text-secondary small mb-0">Total Programs</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Courses -->
            <div class="col-xxl-2 col-sm-4 col-12">
                <div class="card shadow-sm border-0 rounded-4 h-100 hover-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-box-lg bg-gradient-success text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i class="ri-eye-fill fs-3"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0 counter">{{ number_format($totalCourses) }}</h3>
                            <p class="text-secondary small mb-0">Total Courses</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Allocation -->
            <div class="col-xxl-2 col-sm-4 col-12">
                <div class="card shadow-sm border-0 rounded-4 h-100 hover-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-box-lg bg-gradient-warning text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i class="ri-handbag-fill fs-3"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0 counter">{{ number_format($totalAllocations) }}</h3>
                            <p class="text-secondary small mb-0">Total Allocation</p>
                        </div>
                    </div>
                </div>
            </div>

           
            <!-- Instructors -->
            <div class="col-xxl-2 col-sm-4 col-12">
                <div class="card shadow-sm border-0 rounded-4 h-100 hover-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="icon-box-lg bg-gradient-secondary text-white rounded-3 me-3 d-flex align-items-center justify-content-center">
                            <i class="ri-honor-of-kings-fill fs-3"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-0 counter">{{ number_format($totalInstructors) }}</h3>
                            <p class="text-secondary small mb-0">Total Instructors</p>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->hasAnyRole(['Administrator',"Admin"]))
                <div class="col-xxl-6 col-sm-12 col-12">

                    <div class="card shadow-sm border-0 rounded-4 mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold mb-0">Revenue by Provider</h5>
                                <!-- Chart type selector -->
                                <select id="chartTypeSelector" class="form-select form-select-sm" style="width:auto;">
                                    <option value="bar" selected>Bar</option>
                                    <option value="pie">Pie</option>
                                    <option value="doughnut">Doughnut</option>
                                </select>
                            </div>
                            <div style="height:300px;">
                                <canvas id="paymentChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    const ctx = document.getElementById('paymentChart').getContext('2d');

                    // Gradient colors
                    const gradient1 = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient1.addColorStop(0, '#4e73df');
                    gradient1.addColorStop(1, '#1cc88a');

                    const gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient2.addColorStop(0, '#36b9cc');
                    gradient2.addColorStop(1, '#17a2b8');

                    const gradient3 = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient3.addColorStop(0, '#f6c23e');
                    gradient3.addColorStop(1, '#fd7e14');

                    const gradient4 = ctx.createLinearGradient(0, 0, 0, 400);
                    gradient4.addColorStop(0, '#e74a3b');
                    gradient4.addColorStop(1, '#c82333');

                    const chartData = {
                        labels: @json($paymentSums->pluck('paymentProvider')),
                        datasets: [{
                            label: 'Total Revenue',
                            data: @json($paymentSums->pluck('totalSum')),
                            backgroundColor: [gradient1, gradient2, gradient3, gradient4],
                            borderRadius: 10,
                            barThickness: 40
                        }]
                    };

                    const chartOptions = {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: true },
                            tooltip: {
                                backgroundColor: '#111',
                                titleColor: '#fff',
                                bodyColor: '#fff',
                                callbacks: {
                                    label: function(context) {
                                        let value = context.raw.toLocaleString();
                                        return `₦ ${value}`;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: { display: false },
                                ticks: { color: '#6c757d', font: { weight: 'bold' } }
                            },
                            y: {
                                beginAtZero: true,
                                grid: { color: '#f0f0f0' },
                                ticks: {
                                    color: '#6c757d',
                                    callback: function(value) {
                                        return '₦' + value.toLocaleString();
                                    }
                                }
                            }
                        }
                    };

                    // Initialize chart
                    let paymentChart = new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: chartOptions
                    });

                    // Handle chart type change
                    document.getElementById('chartTypeSelector').addEventListener('change', function(e) {
                        const newType = e.target.value;
                        paymentChart.destroy(); // destroy old chart
                        paymentChart = new Chart(ctx, {
                            type: newType,
                            data: chartData,
                            options: chartOptions
                        });
                    });
                </script>
                <div class="col-xxl-6 col-sm-12 col-12">
                    <div class="card shadow-sm border-0 rounded-4 mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold mb-0">Revenue by Program</h5>
                                <!-- Chart type selector -->
                                <select id="programChartType" class="form-select form-select-sm" style="width:auto;">
                                    <option value="pie" selected>Pie</option>
                                    <option value="bar">Bar</option>
                                    <option value="doughnut">Doughnut</option>
                                </select>
                            </div>
                            <div style="height:300px;">
                                <canvas id="programChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <script>
                        const ctxProgram = document.getElementById('programChart').getContext('2d');

                        const programData = {
                            // ✅ use program name if available, fallback to slug
                            labels: @json($programRevenue->map(fn($p) => $p->program->program_name ?? $p->programSlug)),
                            datasets: [{
                                label: 'Revenue',
                                data: @json($programRevenue->pluck('totalSum')),
                                backgroundColor: [
                                    '#4e73df',
                                    '#1cc88a',
                                    '#36b9cc',
                                    '#f6c23e',
                                    '#e74a3b',
                                    '#858796'
                                ],
                                borderWidth: 2
                            }]
                        };

                        const programOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: true, position: 'right' },
                                tooltip: {
                                    backgroundColor: '#111',
                                    titleColor: '#fff',
                                    bodyColor: '#fff',
                                    callbacks: {
                                        label: function(context) {
                                            let value = context.raw.toLocaleString();
                                            return `₦ ${value}`;
                                        }
                                    }
                                }
                            }
                        };

                        // ✅ Default chart type is pie
                        let programChart = new Chart(ctxProgram, {
                            type: 'pie',
                            data: programData,
                            options: programOptions
                        });

                        // Allow chart type switching
                        document.getElementById('programChartType').addEventListener('change', function(e) {
                            const newType = e.target.value;
                            programChart.destroy();
                            programChart = new Chart(ctxProgram, {
                                type: newType,
                                data: programData,
                                options: programOptions
                            });
                        });
                    </script>
                </div>

                <div class="col-xxl-12 col-sm-12 col-12">
                    <div class="card shadow-sm border-0 rounded-4 mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold mb-0">Revenue by Course</h5>
                                <!-- Chart type selector -->
                                <select id="courseChartType" class="form-select form-select-sm" style="width:auto;">
                                    <option value="doughnut" selected>Doughnut</option>
                                    <option value="pie">Pie</option>
                                    <option value="bar">Bar</option>
                                    <option value="line">Line</option>
                                    <option value="radar">Radar</option>
                                    <option value="polarArea">Polar Area</option>
                                </select>
                            </div>
                            <div style="height:300px;">
                                <canvas id="courseChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <script>
                        const ctxCourse = document.getElementById('courseChart').getContext('2d');

                        const courseData = {
                            // ✅ use course name if available, fallback to slug
                            labels: @json($courseRevenue->map(fn($c) => $c->course->course_name ?? $c->courseSlug)),
                            datasets: [{
                                label: 'Revenue',
                                data: @json($courseRevenue->pluck('totalSum')),
                                backgroundColor: [
                                    '#4e73df',
                                    '#1cc88a',
                                    '#36b9cc',
                                    '#f6c23e',
                                    '#e74a3b',
                                    '#858796'
                                ],
                                borderWidth: 2
                            }]
                        };

                        const courseOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { display: true, position: 'right' },
                                tooltip: {
                                    backgroundColor: '#111',
                                    titleColor: '#fff',
                                    bodyColor: '#fff',
                                    callbacks: {
                                        label: function(context) {
                                            let value = context.raw.toLocaleString();
                                            return `₦ ${value}`;
                                        }
                                    }
                                }
                            }
                        };

                        // ✅ Default chart type is doughnut
                        let courseChart = new Chart(ctxCourse, {
                            type: 'doughnut',
                            data: courseData,
                            options: courseOptions
                        });

                        // Allow chart type switching
                        document.getElementById('courseChartType').addEventListener('change', function(e) {
                            const newType = e.target.value;
                            courseChart.destroy();
                            courseChart = new Chart(ctxCourse, {
                                type: newType,
                                data: courseData,
                                options: courseOptions
                            });
                        });
                    </script>
                </div>


            @endif


        </div>
    @endif

    @if(Auth::user()->hasAnyRole(['Student']))
        <!-- Student dashboard cards here -->
    @endif
</x-app-layout>