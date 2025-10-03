@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">User</li>
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

            <x-alerts />

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body py-0">
                            <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{ session('active_tab', 'profile-1') == 'profile-1' ? 'active' : '' }}"
                                        id="profile-tab-1" data-bs-toggle="tab" href="#profile-1" role="tab"
                                        aria-selected="{{ session('active_tab', 'profile-1') == 'profile-1' ? 'true' : 'false' }}">
                                        <i class="ti ti-user me-2"></i>Personal Details
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link {{ session('active_tab') == 'profile-2' ? 'active' : '' }}"
                                        id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
                                        aria-selected="{{ session('active_tab') == 'profile-2' ? 'true' : 'false' }}">
                                        <i class="ti ti-lock me-2"></i>Change Information
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade {{ session('active_tab', 'profile-1') == 'profile-1' ? 'show active' : '' }}"
                            id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
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
                                                            <p class="mb-0">{{ $user->first_name ?? 'N/A' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Last Name</p>
                                                            <p class="mb-0">{{ $user->last_name ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Contact Phone</p>
                                                            <p class="mb-0">{{ $user->phone ?? 'N/A' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Email</p>
                                                            <p class="mb-0">{{ $user->email }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item px-0 pb-0">
                                                    <p class="mb-1 text-muted">Address</p>
                                                    <p class="mb-0">{{ $user->address ?? 'N/A' }}</p>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Profile Update Form --}}
                        <div class="tab-pane fade {{ session('active_tab') == 'profile-2' ? 'show active' : '' }}"
                            id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
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
                                                            placeholder="Enter first name"
                                                            value="{{ old('first_name', $user->first_name) }}" />
                                                        @error('first_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Last Name</label>
                                                        <input type="text" name="last_name" class="form-control"
                                                            placeholder="Enter last name"
                                                            value="{{ old('last_name', $user->last_name) }}" />
                                                        @error('last_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Contact No</label>
                                                        <input type="text" name="phone" class="form-control"
                                                            placeholder="Enter contact no"
                                                            value="{{ old('phone', $user->phone) }}" />
                                                        @error('phone')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6 mb-3">
                                                        <label class="form-label">Email <span
                                                                class="text-danger">*</span></label>
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="Enter email"
                                                            value="{{ old('email', $user->email) }}" />
                                                        @error('email')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-12 mb-3">
                                                        <label class="form-label">Address</label>
                                                        <textarea name="address" class="form-control" placeholder="Enter address">{{ old('address', $user->address) }}</textarea>
                                                        @error('address')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
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
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-sm-10">

                                                        {{-- Old Password --}}
                                                        <div class="mb-3">
                                                            <label class="form-label">Old Password <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="password" name="current_password"
                                                                    class="form-control pe-5" placeholder="********"
                                                                    required />
                                                                <i class="fa fa-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                                                    style="cursor: pointer;"></i>
                                                            </div>
                                                            @error('current_password')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        {{-- New Password --}}
                                                        <div class="mb-3">
                                                            <label class="form-label">New Password <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="password" name="password"
                                                                    class="form-control pe-5" placeholder="********"
                                                                    required />
                                                                <i class="fa fa-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                                                    style="cursor: pointer;"></i>
                                                            </div>
                                                            @error('password')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>

                                                        {{-- Confirm Password --}}
                                                        <div class="mb-3">
                                                            <label class="form-label">Confirm Password <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="position-relative">
                                                                <input type="password" name="password_confirmation"
                                                                    class="form-control pe-5" placeholder="********"
                                                                    required />
                                                                <i class="fa fa-eye toggle-password position-absolute top-50 end-0 translate-middle-y me-3"
                                                                    style="cursor: pointer;"></i>
                                                            </div>
                                                            {{-- Laravel does not use error bag for password_confirmation unless you manually validate it --}}
                                                            @if ($errors->has('password_confirmation'))
                                                                <small
                                                                    class="text-danger">{{ $errors->first('password_confirmation') }}</small>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Submit --}}
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

    @push('scripts')
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

        <script>
            setTimeout(function() {
                const successAlert = document.getElementById('success-alert');
                const errorAlert = document.getElementById('error-alert');

                if (successAlert) {
                    let alertInstance = bootstrap.Alert.getOrCreateInstance(successAlert);
                    alertInstance.close();
                }

                if (errorAlert) {
                    let alertInstance = bootstrap.Alert.getOrCreateInstance(errorAlert);
                    alertInstance.close();
                }
            }, 3000);
        </script>
        {{-- Remember Active Tab on Page Reload --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const activeTab = @json(session('active_tab'));

                if (activeTab) {
                    $('.tab-pane').removeClass('active show');
                    $('.nav-link').removeClass('active');

                    $('#' + activeTab).addClass('active show');
                    $('a[href="#' + activeTab + '"]').addClass('active');
                }
            });
        </script>
    @endpush
@endsection
