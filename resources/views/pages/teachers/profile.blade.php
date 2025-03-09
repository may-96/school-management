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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Teachers</a></li>
                                <li class="breadcrumb-item" aria-current="page">Teacher Profile</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Teacher Profile</h2>
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
                                                            <p class="mb-1 text-muted">Joining Date</p>
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
                                                            <p class="mb-1 text-muted">Department / Class</p>
                                                            <p class="mb-0">Laravel Developer / 12th</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Educations</p>
                                                            <p class="mb-0">Bachelor In Science</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Email</p>
                                                            <p class="mb-0">din.97legend@gmail.com</p>
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
                                                            <p class="mb-1 text-muted">Gender</p>
                                                            <p class="mb-0">Male</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Status</p>
                                                            <p class="mb-0"><span
                                                                    class="badge bg-light-success">Active</span></p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
