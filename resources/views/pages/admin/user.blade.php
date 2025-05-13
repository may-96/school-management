@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
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
                                        <i class="ti ti-file-text me-2"></i>Personal Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2"
                                        role="tab" aria-selected="true">
                                        <i class="ti ti-lock me-2"></i>Change Information
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane show active" id="profile-1" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-8 col-xxl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Personal Details</h5>
                                        </div>
                                        <div class="card-body">

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-sm-12 text-start mb-3">
                                                            <div class="user-upload">
                                                                @if ($user->profile_photo_path)
                                                                    <img src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('assets/images/user/default.jpg') }}"
                                                                        alt="Profile Photo" class="img-fluid" />
                                                                @else
                                                                    <img src="{{ asset('assets/images/user/avatar-1.jpg') }}"
                                                                        alt="Profile Photo" class="img-fluid" />
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">First Name</p>
                                                            <p class="mb-0">{{ $user->first_name }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Last Name</p>
                                                            <p class="mb-0">{{ $user->last_name }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Contact Phone</p>
                                                            <p class="mb-0">{{ $user->phone }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Email</p>
                                                            <p class="mb-0">{{ $user->email }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <p class="mb-1 text-muted">Address</p>
                                                    <p class="mb-0">{{ $user->address }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Profile Update Form --}}
                        <div class="tab-pane" id="profile-2" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form method="POST" action="{{ route('admin.users.update-profile') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Personal Information</h5>
                                            </div>
                                            <div class="card-body">
                                                @if (session('success'))
                                                    <div class="alert alert-success alert-dismissible fade show"
                                                        role="alert" id="success-alert">
                                                        {{ session('success') }}
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-sm-12 text-center mb-3">
                                                        <div class="user-upload wid-75">
                                                            <div class="user-upload wid-75">
                                                                @if ($user->profile_photo_path)
                                                                    <img id="profilePhotoPreview"
                                                                        src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('assets/images/user/default.jpg') }}"
                                                                        alt="Profile Photo" class="img-fluid" />
                                                                @else
                                                                    <img id="profilePhotoPreview"
                                                                        src="{{ asset('assets/images/user/avatar-1.jpg') }}"
                                                                        alt="Profile Photo" class="img-fluid" />
                                                                @endif
                                                                <!-- Upload Label -->
                                                                <label for="profile_photo" class="img-avtar-upload">
                                                                    <i class="ti ti-camera f-24 mb-1"></i>
                                                                    <span>Upload</span>
                                                                </label>

                                                                <!-- Hidden File Input -->
                                                                <input type="file" id="profile_photo"
                                                                    name="profile_photo" class="d-none"
                                                                    onchange="previewImage(event)" />
                                                            </div>

                                                            <!-- JavaScript to handle preview -->
                                                            <script>
                                                                function previewImage(event) {
                                                                    const file = event.target.files[0];
                                                                    const reader = new FileReader();

                                                                    reader.onload = function(e) {
                                                                        // Update the profile photo preview with the new image
                                                                        document.getElementById('profilePhotoPreview').src = e.target.result;
                                                                    };

                                                                    // Read the uploaded file
                                                                    if (file) {
                                                                        reader.readAsDataURL(file);
                                                                    }
                                                                }
                                                            </script>


                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">First Name</label>
                                                        <input type="text" name="first_name" class="form-control"
                                                            value="{{ old('first_name', $user->first_name) }}" />
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" name="last_name" class="form-control"
                                                            value="{{ old('last_name', $user->last_name) }}" />
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Contact Phone</label>
                                                        <input type="text" name="phone" class="form-control"
                                                            value="{{ old('phone', $user->phone) }}" />
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email" class="form-control"
                                                            value="{{ old('email', $user->email) }}" />
                                                    </div>
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="address" class="form-control">{{ old('address', $user->address) }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 text-end btn-page">
                                                <button type="submit" class="btn btn-primary mb-4 me-4">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                {{-- Password Update --}}
                                <div class="col-lg-6">
                                    <form action="{{ route('admin.users.update-password') }}" method="POST">
                                        @csrf

                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Change Password</h5>
                                            </div>
                                            <div class="card-body">
                                                <!-- Display errors -->
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul class="m-0">
                                                            {{-- Loop through each error and display it --}}
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-sm-10">
                                                        <div class="mb-3">
                                                            <label class="form-label">Old Password</label>
                                                            <div class="position-relative">
                                                                <input type="password" name="current_password"
                                                                    class="form-control password-input pe-5" required />
                                                                <i class="fa fa-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                                                    style="cursor: pointer;"></i>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">New Password</label>
                                                            <div class="position-relative">
                                                                <input type="password" name="password"
                                                                    class="form-control password-input pe-5" required />
                                                                <i class="fa fa-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                                                    style="cursor: pointer;"></i>
                                                            </div>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label class="form-label">Confirm Password</label>
                                                            <div class="position-relative">
                                                                <input type="password" name="password_confirmation"
                                                                    class="form-control password-input pe-5" required />
                                                                <i class="fa fa-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                                                    style="cursor: pointer;"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    document.querySelectorAll('.toggle-password').forEach(function(icon) {
                                                        icon.addEventListener('click', function() {
                                                            const input = this.previousElementSibling;
                                                            if (input.type === 'password') {
                                                                input.type = 'text';
                                                                this.classList.remove('fa-eye');
                                                                this.classList.add('fa-eye-slash');
                                                            } else {
                                                                input.type = 'password';
                                                                this.classList.remove('fa-eye-slash');
                                                                this.classList.add('fa-eye');
                                                            }
                                                        });
                                                    });
                                                </script>


                                            </div>
                                            <div class="col-12 text-end btn-page">
                                                <button type="submit" class="btn btn-primary mb-4 me-4">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
