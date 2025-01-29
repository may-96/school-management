@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('payment.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Student Fees</a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Dashboard</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3 mb-3">
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Total</h6>
                                                <p class="mb-0 text-muted d-flex align-items-center gap-1">
                                                    <svg class="pc-icon text-warning wid-15 hei-15">
                                                        <use xlink:href="#custom-arrow-down"></use>
                                                    </svg>
                                                    20.3%
                                                </p>
                                            </div>
                                            <h5 class="mb-2 mt-3">£5678.09</h5>
                                            <div class="d-flex align-items-center gap-1">
                                                <h5 class="mb-0">3</h5>
                                                <p class="mb-0 text-muted d-flex align-items-center gap-2">invoices</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Paid</h6>
                                                <p class="mb-0 text-muted d-flex align-items-center gap-1">
                                                    <svg class="pc-icon text-danger wid-15 hei-15">
                                                        <use xlink:href="#custom-arrow-down"></use>
                                                    </svg>
                                                    -8.73%
                                                </p>
                                            </div>
                                            <h5 class="mb-2 mt-3">£5678.09</h5>
                                            <div class="d-flex align-items-center gap-1">
                                                <h5 class="mb-0">5</h5>
                                                <p class="mb-0 text-muted d-flex align-items-center gap-2">invoices</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Pending</h6>
                                                <p class="mb-0 text-muted d-flex align-items-center gap-1">
                                                    <svg class="pc-icon text-success wid-15 hei-15">
                                                        <use xlink:href="#custom-arrow-up"></use>
                                                    </svg>
                                                    10.73%
                                                </p>
                                            </div>
                                            <h5 class="mb-2 mt-3">£5678.09</h5>
                                            <div class="d-flex align-items-center gap-1">
                                                <h5 class="mb-0">20</h5>
                                                <p class="mb-0 text-muted d-flex align-items-center gap-2">invoices</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xxl-3">
                                    <div class="card border mb-0">
                                        <div class="card-body p-3">
                                            <div class="d-flex align-items-center justify-content-between gap-1">
                                                <h6 class="mb-0">Overdue</h6>
                                                <p class="mb-0 text-muted d-flex align-items-center gap-1">
                                                    <svg class="pc-icon text-primary wid-15 hei-15">
                                                        <use xlink:href="#custom-arrow-down"></use>
                                                    </svg>
                                                    -4.73%
                                                </p>
                                            </div>
                                            <h5 class="mb-2 mt-3">£5678.09</h5>
                                            <div class="d-flex align-items-center gap-1">
                                                <h5 class="mb-0">5</h5>
                                                <p class="mb-0 text-muted d-flex align-items-center gap-2">invoices</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="invoice-chart"></div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body pb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Total Expenses</h5>
                                <div class="dropdown">
                                    <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-dots-vertical f-18"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Today</a>
                                        <a class="dropdown-item" href="#">Weekly</a>
                                        <a class="dropdown-item" href="#">Monthly</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="total-income-graph"></div>
                            <div class="mb-2 mt-3 d-flex align-items-center justify-content-between">
                                <h6 class="mb-0 d-flex align-items-center gap-2"><i
                                        class="fas fa-circle text-warning f-12"></i> Pending</h6>
                                <p class="mb-0 text-muted">$3,202</p>
                            </div>
                            <div class="mb-2 d-flex align-items-center justify-content-between">
                                <h6 class="mb-0 d-flex align-items-center gap-2"><i
                                        class="fas fa-circle text-success f-12"></i> Paid</h6>
                                <p class="mb-0 text-muted">$45,050</p>
                            </div>
                            <div class="mb-2 d-flex align-items-center justify-content-between">
                                <h6 class="mb-0 d-flex align-items-center gap-2"><i
                                        class="fas fa-circle text-danger f-12"></i> Overdue</h6>
                                <p class="mb-0 text-muted">$25,000</p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
