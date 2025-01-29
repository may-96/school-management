@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('school.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">School</a></li>
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
                <div class="col-12">
                    <div class="card welcome-banner bg-blue-800">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="p-4">
                                        <h2 class="text-white">Govt High Secondary School No 1</h2>
                                        <p class="text-white">The Brand new User Interface with power of Bootstrap
                                            Components. Explore the
                                            Endless possibilities with Able
                                            Pro.</p>
                                        <a href="https://scrumad.com" class="btn btn-outline-light">Explore</a>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <div class="img-welcome-banner">
                                        <img src="../assets/images/widget/welcome-banner.png" alt="img"
                                            class="img-fluid" />
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
                                        <i class="ti ti-users f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1">New Students</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">400+</h4>
                                        <span class="text-success fw-medium">30.6%</span>
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
                                        <i class="ti ti-notebook f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1">Total Course</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">520+</h4>
                                        <span class="text-warning fw-medium">30.6%</span>
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
                                        <i class="ti ti-eye f-24"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <p class="mb-1">New Visitor</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">800+</h4>
                                        <span class="text-success fw-medium">30.6%</span>
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
                                    <p class="mb-1">Fees Collection</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0">1,065</h4>
                                        <span class="text-danger fw-medium">30.6%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Student Performance</h5>
                                <button class="btn btn-sm btn-link-primary">View Report</button>
                            </div>
                            <h4 class="mb-1">78%</h4>
                            <p class="d-inline-flex align-items-center text-success gap-1 mb-0"> <i
                                    class="ti ti-arrow-narrow-up"></i>
                                2.1% </p>
                            <p class="text-muted mb-1">1-12 Dec, 2023</p>
                            <div id="course-report-bar-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <h5 class="mb-0">Student States</h5>
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
                            <div id="student-states-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
