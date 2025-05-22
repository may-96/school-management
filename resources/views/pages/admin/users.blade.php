@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Admin</a></li>
                                <li class="breadcrumb-item" aria-current="page">Users</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Users Profile</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <script>
                    setTimeout(function() {
                        let alert = document.getElementById('success-alert');
                        if (alert) {
                            let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                            bsAlert.close();
                        }
                    }, 3000);
                </script>

                @php
                    // Clear the session manually after showing it once
                    session()->forget('success');
                @endphp
            @endif

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header text-end">
                            <a data-bs-toggle="modal" data-bs-target="#add-user-modal" href="#"
                                class="btn btn-primary">Add User</a>
                        </div>
                        <div class="card-body table-card">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Users</th>
                                            <th>ROLE</th>
                                            <th class="text-end">STATUS</th>
                                            <th class="text-end">ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-auto pe-0">
                                                            @if ($user->profile_photo_path)
                                                                <img src="{{ asset('storage/' . $user->profile_photo_path) }}"
                                                                    style="width: 40px; height: 40px;"
                                                                    class="rounded-circle" alt="user-image" />
                                                            @else
                                                                <img src="{{ asset('assets/images/user/avatar-1.jpg') }}"
                                                                    alt="img" class="rounded-circle"
                                                                    style="width: 40px; height: 40px;" />
                                                            @endif
                                                        </div>
                                                        <div class="col justify-content-center">
                                                            <h5 class="mb-0">
                                                                {{ old('first_name', $user->first_name . ' ' . $user->last_name) }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge 
                                              {{ $user->role === 'admin'
                                                  ? 'bg-light-info'
                                                  : ($user->role === 'manager'
                                                      ? 'bg-light-info'
                                                      : ($user->role === 'member'
                                                          ? 'bg-light-warning'
                                                          : 'bg-secondary')) }}">
                                                        {{ ucfirst($user->role) }}
                                                    </span>
                                                </td>
                                                <td class="text-end">
                                                    <span
                                                        class="badge {{ $user->status === 'active' ? 'bg-light-success' : 'bg-light-danger' }}">
                                                        {{ $user->status === 'active' ? 'Active' : 'Inactive' }}
                                                    </span>
                                                </td>
                                                <td class="text-end">
                                                    {{-- Edit --}}
                                                    {{-- <a data-bs-toggle="modal"
                                                        data-bs-target="#edit-user-modal-{{ $user->id }}" href="#"
                                                        class="avtar avtar-xs btn-link-secondary">
                                                        <i class="ti ti-edit f-20"></i>
                                                    </a> --}}
                                                    {{-- Delete --}}
                                                    <form id="delete-form-{{ $user->id }}" method="POST"
                                                        action="{{ route('admin.users.destroy', $user->id) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="#"
                                                            class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                            data-id="{{ $user->id }}">
                                                            <i class="ti ti-trash f-20"></i>
                                                        </a>
                                                    </form>

                                                    <script>
                                                        document.querySelectorAll('.bs-pass-para').forEach(btn => {
                                                            btn.addEventListener('click', function(e) {
                                                                e.preventDefault();
                                                                const userId = this.dataset.id;
                                                                const form = document.getElementById('delete-form-' + userId);
                                                                if (form) {
                                                                    form.submit();
                                                                } else {
                                                                    console.error('Delete form not found for ID:', userId);
                                                                }
                                                            });
                                                        });
                                                    </script>

                                                </td>
                                            </tr>

                                            {{-- Edit Modal per user --}}
                                            {{-- <div class="modal fade" id="edit-user-modal-{{ $user->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('admin.users.update', $user) }}"
                                                            method="POST">
                                                            @csrf @method('PUT')
                                                            <div class="modal-header">
                                                                <h4 class="mb-0">User Edit</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">First Name</label>
                                                                        <input type="text" name="first_name"
                                                                            class="form-control"
                                                                            value="{{ explode(' ', $user->name)[0] }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Last Name</label>
                                                                        <input type="text" name="last_name"
                                                                            class="form-control"
                                                                            value="{{ explode(' ', $user->name)[1] ?? '' }}"
                                                                            required>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Role</label>
                                                                        <select name="role" class="form-select" required>
                                                                            @foreach (['admin', 'member'] as $role)
                                                                                <option value="{{ $role }}"
                                                                                    {{ $user->role === $role ? 'selected' : '' }}>
                                                                                    {{ ucfirst($role) }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Status</label>
                                                                        <select name="status" class="form-select" required>
                                                                            <option value="active"
                                                                                {{ $user->status === 'active' ? 'selected' : '' }}>
                                                                                Active</option>
                                                                            <option value="inactive"
                                                                                {{ $user->status === 'inactive' ? 'selected' : '' }}>
                                                                                Inactive</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Email</label>
                                                                        <input type="email" name="email"
                                                                            class="form-control"
                                                                            value="{{ $user->email }}" required>
                                                                    </div>
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Password</label>
                                                                        <input type="password" name="password"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer text-end">
                                                                <button class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> --}}
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add modal user  --}}

    <div class="modal fade" id="add-user-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h4 class="mb-0">Add User</h4>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                {{-- <div class="col-sm-12 text-center mb-3">
                                    <div class="user-upload wid-75">
                                        <div class="user-upload wid-75">
                                            <!-- Display image or default image -->
                                            <img id="profilePhotoPreview"
                                                src="{{ $user->profile_photo_path ? asset('storage/' . $user->profile_photo_path) : asset('assets/images/user/default.jpg') }}"
                                                alt="Profile Photo" class="img-fluid" />

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
                                </div> --}}
                                {{-- First Name --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div>
                                {{-- Last Name --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div>
                                {{-- Role --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Role</label>
                                    <select name="role" class="form-select" required>
                                        @foreach (['admin', 'member'] as $role)
                                            <option value="{{ $role }}">{{ ucfirst($role) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Status --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select" required>
                                        <option value="select">Select</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                                {{-- Email --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                {{-- Password --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- edit model user  --}}

    {{-- <div class="modal fade" id="edit-user-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h4 class="mb-0">User Edit</h4>
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
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 text-center mb-3">
                                                <div class="user-upload wid-75">
                                                    <img src="../assets/images/user/saqib.jpg" alt="img"
                                                        class="img-fluid" style="height:75px; width:75px" />
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
                                                    <label class="form-label">Role</label>
                                                    <input type="text" class="form-control" value="Owner" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Status</label>
                                                    <input type="text" class="form-control" value="Joined" />
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
                                            <div class="col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-end">
                                                <button class="btn btn-primary">Update</button>
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
    </div> --}}
@endsection
