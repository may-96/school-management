@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student.profile') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                                <li class="breadcrumb-item" aria-current="page">Student Profile</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Student Profile</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body py-0">
                            <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                        role="tab" aria-selected="true">
                                        <i class="ti ti-user me-2"></i>Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2"
                                        role="tab" aria-selected="true">
                                        <i class="ti ti-file-text me-2"></i>Voucher List
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                            <div class="row">
                                <div class="col-lg-8 col-xxl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Personal Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-sm-12 text-start mb-3">
                                                <div class="user-upload wid-75">
                                                    <img src="../assets/images/user/avatar-1.jpg" alt="img"
                                                        class="img-fluid" />
                                                    <label for="uplfile" class="img-avtar-upload">
                                                        <i class="ti ti-camera f-24 mb-1"></i>
                                                        <span>Upload</span>
                                                    </label>
                                                    <input type="file" id="uplfile" class="d-none" />
                                                </div>
                                            </div>

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Full Name</p>
                                                            <p class="mb-0">Saqib Din</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Father Name</p>
                                                            <p class="mb-0">Muhammad Khan</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Registration Date</p>
                                                            <p class="mb-0">07-03-2003</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Date of Birth</p>
                                                            <p class="mb-0">07-03-2003</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Class / Section</p>
                                                            <p class="mb-0">10th / Green</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Roll No</p>
                                                            <p class="mb-0">97</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Admission No</p>
                                                            <p class="mb-0">AD892765986</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Phone</p>
                                                            <p class="mb-0">0316-8336096</p>
                                                        </div>

                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Status</p>
                                                            <p class="mb-0"><span
                                                                    class="badge bg-light-success">Active</span></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Secondary Mobile No</p>
                                                            <p class="mb-0">0316-8336096</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <p class="mb-1 text-muted">Address</p>
                                                    <p class="mb-0">Street 110-B Kalians Bag, Dewan, M.P. New York</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-sm-flex align-items-center justify-content-between">
                                                <h5 class="mb-3 mb-sm-0">Vouchers list</h5>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="analytics-tab-1-pane"
                                                    role="tabpanel" aria-labelledby="analytics-tab-1" tabindex="0">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover" id="pc-dt-simple-1">
                                                            <thead>
                                                                <tr>
                                                                    <th>Invoice Id</th>
                                                                    <th>Student Name</th>
                                                                    <th>Due Date</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th class="text-end">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>398745687</td>
                                                                    <td>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="../assets/images/user/avatar-1.jpg"
                                                                                    alt="user-image"
                                                                                    class="wid-40 hei-40 rounded-circle" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1"><span
                                                                                        class="text-truncate w-100">Saqib
                                                                                        Din</span></h6>
                                                                                <p class="f-12 mb-0"><a href="#!"
                                                                                        class="text-muted"><span
                                                                                            class="text-truncate w-100">0316-8336096</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7/11/2022</td>
                                                                    <td>3000 Pkr</td>
                                                                    <td><span class="badge bg-light-success">Paid</span>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <ul class="list-inline mb-0">
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-add-payment_modal"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-plus f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-voucher-slip_model"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-eye f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="{{ route('payment.edit') }}"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-edit f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"> <a
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                                        class="ti ti-trash f-20"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>398745687</td>
                                                                    <td>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="../assets/images/user/avatar-1.jpg"
                                                                                    alt="user-image"
                                                                                    class="wid-40 hei-40 rounded-circle" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1"><span
                                                                                        class="text-truncate w-100">Saqib
                                                                                        Din</span></h6>
                                                                                <p class="f-12 mb-0"><a href="#!"
                                                                                        class="text-muted"><span
                                                                                            class="text-truncate w-100">0316-8336096</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7/11/2022</td>
                                                                    <td>3000 Pkr</td>
                                                                    <td><span class="badge bg-light-info">Unpaid</span>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <ul class="list-inline mb-0">
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-add-payment_modal"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-plus f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-voucher-slip_model"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-eye f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="{{ route('payment.edit') }}"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-edit f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"> <a
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                                        class="ti ti-trash f-20"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>398745687</td>
                                                                    <td>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="../assets/images/user/avatar-1.jpg"
                                                                                    alt="user-image"
                                                                                    class="wid-40 hei-40 rounded-circle" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1"><span
                                                                                        class="text-truncate w-100">Saqib
                                                                                        Din</span></h6>
                                                                                <p class="f-12 mb-0"><a href="#!"
                                                                                        class="text-muted"><span
                                                                                            class="text-truncate w-100">0316-8336096</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7/11/2022</td>
                                                                    <td>3000 Pkr</td>
                                                                    <td><span class="badge bg-light-success">Paid</span>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <ul class="list-inline mb-0">
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-add-payment_modal"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-plus f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-voucher-slip_model"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-eye f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="{{ route('payment.edit') }}"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-edit f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"> <a
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                                        class="ti ti-trash f-20"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>398745687</td>
                                                                    <td>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="../assets/images/user/avatar-1.jpg"
                                                                                    alt="user-image"
                                                                                    class="wid-40 hei-40 rounded-circle" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1"><span
                                                                                        class="text-truncate w-100">Saqib
                                                                                        Din</span></h6>
                                                                                <p class="f-12 mb-0"><a href="#!"
                                                                                        class="text-muted"><span
                                                                                            class="text-truncate w-100">0316-8336096</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7/11/2022</td>
                                                                    <td>3000 Pkr</td>
                                                                    <td><span
                                                                            class="badge bg-light-danger">Cancelled</span>
                                                                    <td class="text-end">
                                                                        <ul class="list-inline mb-0">
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-add-payment_modal"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-plus f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-voucher-slip_model"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-eye f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="{{ route('payment.edit') }}"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-edit f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"> <a
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                                        class="ti ti-trash f-20"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>398745687</td>
                                                                    <td>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="../assets/images/user/avatar-1.jpg"
                                                                                    alt="user-image"
                                                                                    class="wid-40 hei-40 rounded-circle" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1"><span
                                                                                        class="text-truncate w-100">Saqib
                                                                                        Din</span></h6>
                                                                                <p class="f-12 mb-0"><a href="#!"
                                                                                        class="text-muted"><span
                                                                                            class="text-truncate w-100">0316-8336096</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7/11/2022</td>
                                                                    <td>3000 Pkr</td>
                                                                    <td><span class="badge bg-light-info">Unpaid</span></td>   
                                                                    <td class="text-end">
                                                                        <ul class="list-inline mb-0">
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-add-payment_modal"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-plus f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-voucher-slip_model"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-eye f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="{{ route('payment.edit') }}"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-edit f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"> <a
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                                        class="ti ti-trash f-20"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>398745687</td>
                                                                    <td>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="../assets/images/user/avatar-1.jpg"
                                                                                    alt="user-image"
                                                                                    class="wid-40 hei-40 rounded-circle" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1"><span
                                                                                        class="text-truncate w-100">Saqib
                                                                                        Din</span></h6>
                                                                                <p class="f-12 mb-0"><a href="#!"
                                                                                        class="text-muted"><span
                                                                                            class="text-truncate w-100">0316-8336096</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7/11/2022</td>
                                                                    <td>3000 Pkr</td>
                                                                    <td><span
                                                                            class="badge bg-light-danger">Cancelled</span>
                                                                    <td class="text-end">
                                                                        <ul class="list-inline mb-0">
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-add-payment_modal"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-plus f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-voucher-slip_model"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-eye f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="{{ route('payment.edit') }}"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-edit f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"> <a
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                                        class="ti ti-trash f-20"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>398745687</td>
                                                                    <td>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="../assets/images/user/avatar-1.jpg"
                                                                                    alt="user-image"
                                                                                    class="wid-40 hei-40 rounded-circle" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1"><span
                                                                                        class="text-truncate w-100">Saqib
                                                                                        Din</span></h6>
                                                                                <p class="f-12 mb-0"><a href="#!"
                                                                                        class="text-muted"><span
                                                                                            class="text-truncate w-100">0316-8336096</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7/11/2022</td>
                                                                    <td>3000 Pkr</td>
                                                                    <td><span class="badge bg-light-success">Paid</span>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <ul class="list-inline mb-0">
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-add-payment_modal"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-plus f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-voucher-slip_model"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-eye f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="{{ route('payment.edit') }}"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-edit f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"> <a
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                                        class="ti ti-trash f-20"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>398745687</td>
                                                                    <td>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="../assets/images/user/avatar-1.jpg"
                                                                                    alt="user-image"
                                                                                    class="wid-40 hei-40 rounded-circle" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1"><span
                                                                                        class="text-truncate w-100">Saqib
                                                                                        Din</span></h6>
                                                                                <p class="f-12 mb-0"><a href="#!"
                                                                                        class="text-muted"><span
                                                                                            class="text-truncate w-100">0316-8336096</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7/11/2022</td>
                                                                    <td>3000 Pkr</td>
                                                                    <td><span
                                                                            class="badge bg-light-danger">Cancelled</span>
                                                                    <td class="text-end">
                                                                        <ul class="list-inline mb-0">
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-add-payment_modal"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-plus f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-voucher-slip_model"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-eye f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="{{ route('payment.edit') }}"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-edit f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"> <a
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                                        class="ti ti-trash f-20"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>398745687</td>
                                                                    <td>
                                                                        <div class="row align-items-center">
                                                                            <div class="col-auto pe-0">
                                                                                <img src="../assets/images/user/avatar-1.jpg"
                                                                                    alt="user-image"
                                                                                    class="wid-40 hei-40 rounded-circle" />
                                                                            </div>
                                                                            <div class="col">
                                                                                <h6 class="mb-1"><span
                                                                                        class="text-truncate w-100">Saqib
                                                                                        Din</span></h6>
                                                                                <p class="f-12 mb-0"><a href="#!"
                                                                                        class="text-muted"><span
                                                                                            class="text-truncate w-100">0316-8336096</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>7/11/2022</td>
                                                                    <td>3000 Pkr</td>
                                                                    <td><span class="badge bg-light-success">Paid</span>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <ul class="list-inline mb-0">
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-add-payment_modal"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-plus f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#student-voucher-slip_model"
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-eye f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"><a
                                                                                    href="{{ route('payment.edit') }}"
                                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                                        class="ti ti-edit f-20"></i></a>
                                                                            </li>
                                                                            <li class="list-inline-item"> <a
                                                                                    href="#"
                                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                                        class="ti ti-trash f-20"></i></a>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- student add payment model --}}

    <div class="modal fade" id="student-add-payment_modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h4 class="mb-0">Add Payment</h4>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">INVOICE ID : </label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="text-muted d-block">8943769870</span>
                                    </div>
                                </div>

                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Payment
                                        Method : <small class="text-muted d-block">Enter
                                            your Payment Method</small></label>
                                    <div class="col-lg-8">
                                        <select class="form-select" id="exampleFormControlSelect1">
                                            <option>Please Select</option>
                                            <option>cheque</option>
                                            <option>cash</option>
                                            <option>credit card</option>
                                            <option>online transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label"> Amount
                                        :<small class="text-muted d-block">Enter
                                            Amount</small></label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Payment
                                        Date:<small class="text-muted d-block">Enter the
                                            Payment Date</small></label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label"> Refrence No
                                        :<small class="text-muted d-block">Enter
                                            Refrence No</small></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Notes
                                        :<small class="text-muted d-block">Enter
                                            Notes</small></label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" rows="2" placeholder="Enter address"></textarea>
                                    </div>
                                </div>
                                <div class="text-end btn-page mb-0 mt-4 me-0">
                                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal"
                                        data-bs-toggle="tooltip">Cancel</button>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- student edit payment model --}}

    <div class="modal fade" id="student-edit-payment_modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h4 class="mb-0">Edit Payment</h4>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">INVOICE ID : </label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="text-muted d-block">8943769870</span>
                                    </div>
                                </div>

                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Payment
                                        Method : <small class="text-muted d-block">Enter
                                            your Payment Method</small></label>
                                    <div class="col-lg-8">
                                        <select class="form-select" id="exampleFormControlSelect1">
                                            <option>Please Select</option>
                                            <option>cheque</option>
                                            <option>cash</option>
                                            <option>credit card</option>
                                            <option>online transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label"> Amount
                                        :<small class="text-muted d-block">Enter
                                            Amount</small></label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Payment
                                        Date:<small class="text-muted d-block">Enter the
                                            Payment Date</small></label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label"> Refrence No
                                        :<small class="text-muted d-block">Enter
                                            Refrence No</small></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Notes
                                        :<small class="text-muted d-block">Enter
                                            Notes</small></label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" rows="2" placeholder="Enter address"></textarea>
                                    </div>
                                </div>
                                <div class="text-end btn-page mb-0 mt-4 me-0">
                                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal"
                                        data-bs-toggle="tooltip">Cancel</button>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- student voucher slip model --}}
    <div class="modal fade" id="student-voucher-slip_model" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h5 class="mb-0">Student Voucher Slip</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Invoice Id</th>
                                                <th>Refrence No</th>
                                                <th>Payment Method</th>
                                                <th>Payment Date</th>
                                                <th>Amount</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>34659087</td>
                                                <td>RN-001</td>
                                                <td>Easypaisa</td>
                                                <td>07-03-2003</td>
                                                <td>3000 Pkr</td>
                                                <td class="text-end">
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"><a data-bs-toggle="modal"
                                                                data-bs-target="#student-edit-payment_modal" href="#"
                                                                class="avtar avtar-xs btn-link-secondary"><i
                                                                    class="ti ti-edit f-20"></i></a></li>
                                                        <li class="list-inline-item"> <a href="#"
                                                                class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                    class="ti ti-trash f-20"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-start">
                                    <hr class="mb-2 mt-1 border-secondary border-opacity-50" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        import {
            DataTable
        } from '../assets/js/plugins/module.js';
        window.dt = new DataTable('#pc-dt-simple-1');
        window.dt = new DataTable('#pc-dt-simple-2');
        window.dt = new DataTable('#pc-dt-simple-3');
        window.dt = new DataTable('#pc-dt-simple-4');
    </script>
    
@endsection
