@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title d-flex justify-content-between">
                                <h2 class="mb-0">Dashboard</h2>
                                <a id="refreshBtn" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="tooltip"
                                    data-bs-placement="left" title="Stats Refresh Now">
                                    <i class="ti ti-refresh f-20"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="alert-container">
                <x-alerts />
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card welcome-banner">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <div class="user-upload wid-75">
                                                @if ($school && $school->logo)
                                                    <img src="{{ asset('storage/schools/' . $school->logo) }}"
                                                        alt="Logo" class="img-fluid" style="max-width: 150px;">
                                                @else
                                                    <img src="{{ asset('assets/images/user/sms.png') }}" alt="Default Logo"
                                                        class="img-fluid" style="max-width: 150px;" />
                                                @endif
                                            </div>
                                        </div>
                                        <div class="pt-0">
                                            @if ($school)
                                                <h2 class="text-white text-break">
                                                    {{ $school->name }}
                                                </h2>
                                                <p class="text-white text-break">
                                                    {{ $school->description }}
                                                </p>
                                            @else
                                                <h2 class="text-white">
                                                    School Name Not Set
                                                </h2>
                                                <p class="text-white">
                                                    Please configure your
                                                    school settings.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="img-welcome-banner position-relative">
                                        <img src="../assets/images/widget/welcome-banner.png" alt="img"
                                            class="img-fluid" style="height:auto;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar bg-light-primary">
                                        <i class="ti ti-user f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1">Total Teachers</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        {{-- <h4 class="mb-0">{{ $totalTeachers }}</h4> --}}
                                        <h4 class="mb-0 purecounter" data-purecounter-start="0"
                                            data-purecounter-end="{{ $stats['total_teachers'] ?? 0 }}"
                                            data-purecounter-duration="2" data-purecounter-separator=","
                                            id="total_teachers">
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar bg-light-warning">
                                        <i class="ti ti-users f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1">Total Students</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        {{-- <h4 class="mb-0">{{ $totalStudents }}</h4> --}}
                                        <h4 class="mb-0 purecounter" data-purecounter-start="0"
                                            data-purecounter-end="{{ $stats['total_students'] ?? 0 }}"
                                            data-purecounter-duration="2" data-purecounter-separator=","
                                            id="total_students">
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar bg-light-info">
                                        <i class="ti ti-users f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1">Total Employees</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        {{-- <h4 class="mb-0">{{ $totalEmployees }}</h4> --}}
                                        <h4 class="mb-0 purecounter" data-purecounter-start="0"
                                            data-purecounter-end="{{ $stats['total_employees'] ?? 0 }}"
                                            data-purecounter-duration="2" data-purecounter-separator=","
                                            id="total_employees">
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar bg-light-success">
                                        <i class="ti ti-currency-dollar f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1 d-flex align-items-center justify-content-between">
                                        Fee Received
                                        <span class="text-success fw-medium">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $stats['total_paid'] ?? 0 }}"
                                                data-purecounter-duration="2" data-purecounter-separator=","
                                                id="total_paid">
                                            </span>
                                        </span>
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">
                                            <span data-purecounter-start="0"
                                                data-purecounter-end="{{ $stats['total_paid_amount'] ?? 0 }}"
                                                data-purecounter-duration="2" data-purecounter-separator=","
                                                class="purecounter" id="total_paid_amount">
                                            </span>
                                            PKR
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar bg-light-danger">
                                        <i class="ti ti-credit-card f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1 d-flex align-items-center justify-content-between">
                                        Fee Pending
                                        <span class="text-danger fw-medium">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $stats['total_unpaid'] ?? 0 }}"
                                                data-purecounter-duration="2" data-purecounter-separator=","
                                                id="total_unpaid">
                                            </span>
                                        </span>
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">
                                            <span id="total_pending_amount" data-purecounter-start="0"
                                                data-purecounter-end="{{ $stats['total_pending_amount'] ?? 0 }}"
                                                data-purecounter-duration="2" data-purecounter-separator=","
                                                class="purecounter">
                                            </span>
                                            PKR
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar bg-light-success">
                                        <i class="ti ti-chart-bar text-success f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1 d-flex align-items-center justify-content-between">
                                        Payroll Paid
                                        <span class="text-success fw-medium">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $stats['paid_data'] ?? 0 }}"
                                                data-purecounter-duration="2" data-purecounter-separator=","
                                                id="paid_data">
                                            </span>
                                        </span>

                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $stats['total_paid_amount_data'] ?? 0 }}"
                                                data-purecounter-duration="2" data-purecounter-separator=","
                                                id="total_paid_amount_data">
                                            </span>
                                            PKR
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar bg-light-danger">
                                        <i class="ti ti-calendar-event text-danger f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1 d-flex align-items-center justify-content-between">
                                        Payroll Unpaid
                                        <span class="text-danger fw-medium">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $stats['unpaid_data'] ?? 0 }}"
                                                data-purecounter-duration="2" data-purecounter-separator=","
                                                id="unpaid_data">
                                            </span>
                                        </span>

                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">
                                            <span class="purecounter" data-purecounter-start="0"
                                                data-purecounter-end="{{ $stats['total_unpaid_amount_data'] ?? 0 }}"
                                                data-purecounter-duration="2" data-purecounter-separator=","
                                                id="total_unpaid_amount_data">
                                            </span>
                                            PKR
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Teachers, Students &
                                    Employees</h5>
                            </div>
                            <div id="course-report-bar-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Payroll</h5>
                            </div>
                            <div id="payroll-report-bar-chart"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-4">Vouchers</h5>
                            </div>
                            <div class="row g-3 mb-3">
                                <!-- Total Vouchers -->
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <h6 class="mb-0">Total
                                                    Vouchers</h6>
                                                <span class="fw-medium">
                                                    <span id="total_vouchers">{{ $stats['total_vouchers'] ?? 0 }}</span>
                                                </span>
                                            </div>
                                            <h5 class="mb-2 mt-3">
                                                <span
                                                    id="grand_total_amount">{{ number_format($stats['grand_total_amount'] ?? 0) }}</span>
                                                PKR
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <!-- Paid Vouchers -->
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Paid
                                                    Vouchers</h6>
                                                <span class="fw-medium">
                                                    <span id="voucher_total_paid">{{ $stats['total_paid'] ?? 0 }}</span>
                                                </span>
                                            </div>
                                            <h5 class="mb-2 mt-3">
                                                <span
                                                    id="voucher_total_paid_amount">{{ number_format($stats['total_paid_amount'] ?? 0) }}</span>
                                                PKR
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <!-- Partial Paid Vouchers -->
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">
                                                    Partial Paid Vouchers
                                                </h6>
                                                <span class="fw-medium">
                                                    <span
                                                        id="total_partial_paid">{{ $stats['total_partial_paid'] ?? 0 }}</span>
                                                </span>
                                            </div>
                                            <h5 class="mb-2 mt-3">
                                                <span
                                                    id="total_partial_paid_amount">{{ number_format($stats['total_partial_paid_amount'] ?? 0) }}</span>
                                                PKR
                                            </h5>
                                        </div>
                                    </div>
                                </div>

                                <!-- Unpaid Vouchers -->
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Unpaid
                                                    Vouchers</h6>
                                                <span class="fw-medium">
                                                    <span
                                                        id="voucher_total_unpaid">{{ $stats['total_unpaid'] ?? 0 }}</span>
                                                </span>
                                            </div>
                                            <h5 class="mb-2 mt-3">
                                                <span
                                                    id="voucher_total_unpaid_amount">{{ number_format($stats['total_pending_amount'] ?? 0) }}</span>
                                                PKR
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="invoice-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>

    {{-- Custom JS Stats auto & manual refresh --}}
    <script>
        new PureCounter();

        function numberFormat(num) {
            if (num === null || num === undefined || num === '') {
                return 0;
            }
            let parsed = Number(num);
            return isNaN(parsed) ? 0 : new Intl.NumberFormat().format(parsed);
        }

        function refreshStats(isManual = false) {
            return fetch("{{ route('dashboard.refresh') }}")
                .then(res => res.json())
                .then(data => {
                    if (data.stats) {
                        for (const key in data.stats) {
                            const el = document.getElementById(key);
                            if (el) {
                                let value = data.stats[key];
                                el.setAttribute("data-purecounter-end", value);
                            } else {
                                console.warn(`Element with id "${key}" not found in DOM`);
                            }
                        }

                        new PureCounter();
                    }

                    if (data.last_checked) {
                        const lastCheckedEl = document.getElementById('lastChecked');
                        if (lastCheckedEl) {
                            lastCheckedEl.innerText = data.last_checked;
                        }
                    }

                    if (isManual) {
                        showSuccessMessage("Dashboard stats refreshed successfully!");
                    }
                })
                .catch(err => console.error("Error refreshing stats:", err));
        }


        // Manual Refresh Button
        const refreshBtn = document.getElementById('refreshBtn');
        if (refreshBtn) {
            refreshBtn.addEventListener('click', function() {
                refreshStats(true);
            });
        }

        // Auto Refresh Every 15 Minute
        setInterval(() => refreshStats(false), 900000);

        // refreshStats(false);
    </script>

    <script>
        function showSuccessMessage(message) {
            const container = document.getElementById('alert-container');
            if (!container) return;

            const alertBox = document.createElement('div');
            alertBox.className = 'alert alert-success alert-dismissible fade show';
            alertBox.role = 'alert';
            alertBox.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;

            container.innerHTML = '';
            container.appendChild(alertBox);

            setTimeout(() => {
                let bsAlert = bootstrap.Alert.getOrCreateInstance(alertBox);
                bsAlert.close();
            }, 3000);
        }
    </script>
@endsection
