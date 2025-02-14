@extends('layouts.master')

@section('content')

<div class="pc-container">
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('profile.user') }}">Home</a></li>
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
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="profile-tab-4" data-bs-toggle="tab" href="#profile-4"
                                    role="tab" aria-selected="true">
                                    <i class="ti ti-lock me-2"></i>Change Password
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#profile-3"
                                    role="tab" aria-selected="true">
                                    <i class="ti ti-settings me-2"></i>Settings
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                        <div class="row">
                            <div class="col-lg-4 col-xxl-3">
                                <div class="card">
                                    <div class="card-body position-relative">

                                        <div class="text-center mt-3">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-70"
                                                    src="../assets/images/user/avatar-5.jpg" alt="User image" />
                                            </div>
                                            <h5 class="mb-0">Saqib Din</h5>
                                            <p class="text-muted text-sm">Male</p>
                                            <hr class="my-3 border border-secondary-subtle" />
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <h5 class="mb-0">10th</h5>
                                                    <small class="text-muted">Class</small>
                                                </div>
                                                <div class="col-6 border border-top-0 border-bottom-0">
                                                    <h5 class="mb-0">40</h5>
                                                    <small class="text-muted">Roll No</small>
                                                </div>
                                                {{-- <div class="col-4">
                                                    <h5 class="mb-0">4.5K</h5>
                                                    <small class="text-muted">Members</small>
                                                </div> --}}
                                            </div>
                                            <hr class="my-3 border border-secondary-subtle" />
                                            {{-- <div
                                                class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-mail me-2"></i>
                                                <p class="mb-0">din.97legend@gmail.com</p>
                                            </div> --}}
                                            <div
                                                class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-phone me-2"></i>
                                                <p class="mb-0">(+92) 8336096</p>
                                            </div>
                                            <div
                                                class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-map-pin me-2"></i>
                                                <p class="mb-0">DHA Phase 2 Gate 1 Isb</p>
                                            </div>
                                            {{-- <div class="d-inline-flex align-items-center justify-content-start w-100">
                                                <i class="ti ti-link me-2"></i>
                                                <a href="#" class="link-primary">
                                                    <p class="mb-0">https://saqib.din.url</p>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xxl-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Personal Information</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 text-center mb-3">
                                                <div class="user-upload wid-75">
                                                    <img src="../assets/images/user/avatar-4.jpg" alt="img"
                                                        class="img-fluid" />
                                                    <label for="uplfile" class="img-avtar-upload">
                                                        <i class="ti ti-camera f-24 mb-1"></i>
                                                        <span>Upload</span>
                                                    </label>
                                                    <input type="file" id="uplfile" class="d-none" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" value="Saqib" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" value="Din" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Contact Phone</label>
                                                    <input type="number" class="form-control" value="0316-8336096" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address</label>
                                                    <textarea class="form-control" rows="1">DHA Phase 2 Gate 1, ISB. Pakistan</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end btn-page">
                                <div class="btn btn-outline-secondary mb-4">Cancel</div>
                                <div class="btn btn-primary mb-4">Update Profile</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs invoice-tab border-bottom mb-3" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="analytics-tab-1" data-bs-toggle="tab"
                                                data-bs-target="#analytics-tab-1-pane" type="button" role="tab"
                                                aria-controls="analytics-tab-1-pane" aria-selected="true">
                                                <span class="d-flex align-items-center gap-2">All <span
                                                        class="avtar rounded-circle bg-light-primary">15</span></span>
                                            </button>
                                        </li>
                                        {{-- <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="analytics-tab-2" data-bs-toggle="tab"
                                                data-bs-target="#analytics-tab-2-pane" type="button" role="tab"
                                                aria-controls="analytics-tab-2-pane" aria-selected="false">
                                                <span class="d-flex align-items-center gap-2">Paid <span
                                                        class="avtar rounded-circle bg-light-success">2</span></span>
                                            </button>
                                        </li> --}}
                                        {{-- <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="analytics-tab-3" data-bs-toggle="tab"
                                                data-bs-target="#analytics-tab-3-pane" type="button" role="tab"
                                                aria-controls="analytics-tab-3-pane" aria-selected="false">
                                                <span class="d-flex align-items-center gap-2">Unpaid <span
                                                        class="avtar rounded-circle bg-light-warning">2</span></span>
                                            </button>
                                        </li> --}}
                                        {{-- <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="analytics-tab-4" data-bs-toggle="tab"
                                                data-bs-target="#analytics-tab-4-pane" type="button" role="tab"
                                                aria-controls="analytics-tab-4-pane" aria-selected="false">
                                                <span class="d-flex align-items-center gap-2">Cancelled <span
                                                        class="avtar rounded-circle bg-light-danger">1</span></span>
                                            </button>
                                        </li> --}}
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel"
                                            aria-labelledby="analytics-tab-1" tabindex="0">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="pc-dt-simple-1">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice Id</th>
                                                            <th>Student Name</th>
                                                            <th>Date</th>
                                                            <th>Payment Type</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-5.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Saqib Din</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>cash</td>
                                                            <td>275$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-9.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>cheque</td>
                                                            <td>290$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-10.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Liana Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>330$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-1.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>cash</td>
                                                            <td>260$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-2.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>230$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-3.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>cheque</td>
                                                            <td>350$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-4.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>cash</td>
                                                            <td>270$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-7.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>cheque</td>
                                                            <td>340$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-8.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Airi Satuo</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- <div class="tab-pane fade" id="analytics-tab-2-pane" role="tabpanel"
                                            aria-labelledby="analytics-tab-2" tabindex="0">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="pc-dt-simple-2">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice Id</th>
                                                            <th>Student Name</th>
                                                            <th>Date</th>
                                                            <th>Payment Type</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-2.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-3.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Airi Satuo</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-5.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-9.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                                
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-10.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-1.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-4.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-7.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-8.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="tab-pane fade" id="analytics-tab-3-pane" role="tabpanel"
                                            aria-labelledby="analytics-tab-3" tabindex="0">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="pc-dt-simple-3">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice Id</th>
                                                            <th>Student Name</th>
                                                            <th>Date</th>
                                                            <th>Payment Type</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-5.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-9.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-10.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Airi Satuo</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-1.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-2.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-3.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-4.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-7.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-8.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="tab-pane fade" id="analytics-tab-4-pane" role="tabpanel"
                                            aria-labelledby="analytics-tab-4" tabindex="0">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="pc-dt-simple-4">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice Id</th>
                                                            <th>Student Name</th>
                                                            <th>Date</th>
                                                            <th>Payment Type</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-2.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-3.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-5.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-9.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-10.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Airi Satuo</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-1.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-4.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Mickie Melmoth</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>5/5/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-success">Paid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-7.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Shelba Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>7/6/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-danger">Cancelled</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>
                                                                <div class="row align-items-center">
                                                                    <div class="col-auto pe-0">
                                                                        <img src="../assets/images/user/avatar-8.jpg"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    </div>
                                                                    <div class="col">
                                                                        <h6 class="mb-1"><span
                                                                                class="text-truncate w-100">Liana Thews</span>
                                                                        </h6>
                                                                        <p class="f-12 mb-0"><a href="#!"
                                                                                class="text-muted"><span
                                                                                    class="text-truncate w-100">0316-8336096</span></a></p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>05/01/2022</td>
                                                            <td>credit card</td>
                                                            <td>240$</td>
                                                            <td><span class="badge bg-light-info">Unpaid</span></td>
                                                            <td class="text-end">
                                                                <ul class="list-inline mb-0">
                                                                    <li class="list-inline-item"><a href="invoice-details.php"
                                                                            class="avtar avtar-s btn-link-info btn-pc-default"><i
                                                                                class="ti ti-eye f-20"></i></a></li>
                                                                    <li class="list-inline-item"><a href="invoice-edit.php"
                                                                            class="avtar avtar-s btn-link-success btn-pc-default"><i
                                                                                class="ti ti-edit f-20"></i></a></li>
                                                                    <li class="list-inline-item"> <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tab-pane" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>General Settings</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Username <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="saqib din" />
                                                    <small class="form-text text-muted">Your Profile URL:
                                                        https://pc.com/saqib-din</small>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Account Email <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control"
                                                        value="sd@sample.com" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Language</label>
                                                    <select class="form-control">
                                                        <option>English</option>
                                                        <option>Urdu</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Sign in Using</label>
                                                    <select class="form-control">
                                                        <option>Password</option>
                                                        <option>Key</option>
                                                        <option>Pin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 text-end">
                                <button class="btn btn-outline-dark ms-2 mb-4">Clear</button>
                                <button class="btn btn-primary mb-4">Update Profile</button>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="tab-pane" id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Change Password</h5>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Old Password</label>
                                            <input type="password" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <input type="password" class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" class="form-control" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-end btn-page">
                                <div class="btn btn-outline-secondary">Cancel</div>
                                <div class="btn btn-primary">Update Profile</div>
                            </div>
                        </div>
                    </div> --}}
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