@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        {{-- <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">School</a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                            </ul>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Dashboard</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alert-success />

            <div class="row">
                <div class="col-12">
                    <div class="card welcome-banner bg-blue-800">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="p-4">
                                        @if ($school)
                                            <h2 class="text-white">{{ $school->name }}</h2>
                                            <p class="text-white">{{ $school->description }}</p>
                                        @else
                                            <h2 class="text-white">School Name Not Set</h2>
                                            <p class="text-white">Please configure your school settings.</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="img-welcome-banner">
                                        <img src="../assets/images/widget/welcome-banner.png" alt="img"
                                            class="img-fluid" style="height:auto;" />
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
                                    <div class="avtar bg-light-primary">
                                        <i class="ti ti-user f-24"></i>

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1">Total Teachers</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">{{ $totalTeachers }}</h4>
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
                                    <div class="avtar bg-light-warning">
                                        <i class="ti ti-users f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1">Total Students</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">{{ $totalStudents }}</h4>
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
                                    <p class="mb-1">Paid Amount</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">{{ number_format($totalPaidAmount) }} PKR</h4>
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
                                    <p class="mb-1">Pending Amount</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">{{ number_format($totalPendingAmount) }} PKR</h4>
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
                                <h5 class="mb-0">Teachers & Student</h5>
                            </div>
                            <div id="course-report-bar-chart"></div>
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
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Total Vouchers</h6>

                                            </div>
                                            <h5 class="mb-2 mt-3">{{ $totalVouchers }}</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Paid Vouchers</h6>

                                            </div>
                                            <h5 class="mb-2 mt-3">{{ $totalPaid }}</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Partial Paid Vouchers</h6>

                                            </div>
                                            <h5 class="mb-2 mt-3">{{ $totalPartialPaid }}</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Unpaid Vouchers</h6>
                                                <p class="mb-0 text-muted d-flex align-items-center gap-1">
                                                </p>
                                            </div>
                                            <h5 class="mb-2 mt-3">{{ $totalUnpaid }}</h5>
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
@endsection
