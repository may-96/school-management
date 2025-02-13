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
                                <li class="breadcrumb-item" aria-current="page">Account Profile</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Account Profile</h2>
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
                                        <i class="ti ti-user me-2"></i>User
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2"
                                        role="tab" aria-selected="true">
                                        <i class="ti ti-file-text me-2"></i>Personal Details
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-4" data-bs-toggle="tab" href="#profile-4"
                                        role="tab" aria-selected="true">
                                        <i class="ti ti-lock me-2"></i>Change Password
                                    </a>
                                </li>
                                <li class="nav-item">
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
                                                <p class="text-muted text-sm">Administrator</p>
                                                <hr class="my-3 border border-secondary-subtle" />
                                                {{-- <div class="row g-3">
                                                    <div class="col-4">
                                                        <h5 class="mb-0">86</h5>
                                                        <small class="text-muted">Post</small>
                                                    </div>
                                                    <div class="col-4 border border-top-0 border-bottom-0">
                                                        <h5 class="mb-0">40</h5>
                                                        <small class="text-muted">Project</small>
                                                    </div>
                                                    <div class="col-4">
                                                        <h5 class="mb-0">4.5K</h5>
                                                        <small class="text-muted">Members</small>
                                                    </div>
                                                </div> --}}
                                                {{-- <hr class="my-3 border border-secondary-subtle" /> --}}
                                                <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-phone me-2"></i>
                                                    <p class="mb-0">(+92) 8336096</p>
                                                </div>
                                                <div
                                                    class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                    <i class="ti ti-mail me-2"></i>
                                                    <p class="mb-0">din.97legend@gmail.com</p>
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
                                            <h5>Personal Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">First Name</p>
                                                            <p class="mb-0">Saqib</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Last Name</p>
                                                            <p class="mb-0">Din</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Contact Phone</p>
                                                            <p class="mb-0">(+92) 316-8336096</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Email</p>
                                                            <p class="mb-0">din.97legend@gmail.com</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <p class="mb-1 text-muted">Address</p>
                                                    <p class="mb-0">Street 110-B Dhoke Awan, DHA Phase 2 Gate 1, ISB.
                                                        Pakistan</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                            <div class="row">
                                <div class="col-lg-6">
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
                                                        <input type="number" class="form-control"/>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"
                                                            value="din.97legend@gmail.com" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <textarea class="form-control">DHA Phase 2 Gate 1, ISB. Pakistan</textarea>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
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
                                    </div>
                                </div>
                                <div class="col-12 text-end btn-page">
                                    <div class="btn btn-outline-secondary mb-4">Cancel</div>
                                    <div class="btn btn-primary mb-4">Update Profile</div>
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
@endsection
