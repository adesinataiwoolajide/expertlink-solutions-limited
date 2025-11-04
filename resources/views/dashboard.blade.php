<x-app-layout>
    <div class="row gx-3">
        <div class="col-xxl-2 col-sm-4 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon-box sm2 border border-2 rounded-5 border-info">
                            <i class="ri-account-pin-circle-fill fs-5 text-info"></i>
                        </div>
                        <div class="ms-3">
                            <h3 class="m-0 fw-semibold">{{ number_format($totalUsers) }}</h3>
                            <h6 class="m-0 text-secondary small">Total Users</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-2 col-sm-4 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon-box sm2 border border-2 rounded-5 border-info">
                            <i class="ri-dashboard-2-fill fs-5 text-info"></i>
                        </div>
                        <div class="ms-2">
                            <h3 class="m-0 fw-semibold">{{ number_format($totalPrograms) }}</h3>
                            <h6 class="m-0 text-secondary small">Total Programs</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-2 col-sm-4 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon-box sm2 border border-2 rounded-5 border-info">
                            <i class="ri-eye-fill fs-5 text-info"></i>
                        </div>
                        <div class="ms-2">
                            <h3 class="m-0 fw-semibold">{{ number_format($totalCourses) }}</h3>
                            <h6 class="m-0 text-secondary small">Total Courses</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-2 col-sm-4 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon-box sm2 border border-2 rounded-5 border-info">
                            <i class="ri-handbag-fill fs-5 text-info"></i>
                        </div>
                        <div class="ms-2">
                            <h3 class="m-0 fw-semibold">{{ number_format($totalAllocations) }}</h3>
                            <h6 class="m-0 text-secondary small">Total Allocation</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-2 col-sm-4 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon-box sm2 border border-2 rounded-5 border-info">
                            <i class="ri-group-2-fill fs-5 text-info"></i>
                        </div>
                        <div class="ms-2">
                            <h3 class="m-0 fw-semibold">{{ number_format($totalAllocationHistories) }}</h3>
                            <h6 class="m-0 text-secondary small">Total Allocation Histories</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-2 col-sm-4 col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon-box sm2 border border-2 rounded-5 border-info">
                            <i class="ri-honor-of-kings-fill fs-5 text-info"></i>
                        </div>
                        <div class="ms-2">
                            <h3 class="m-0 fw-semibold">{{ number_format($totalInstructors) }}</h3>
                            <h6 class="m-0 text-secondary small">Total Instructors</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>