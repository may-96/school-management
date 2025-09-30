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

            <x-alerts />

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
                                            {{-- <th>Totals</th> --}}
                                            <th>Contacts</th>
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
                                                                {{ $user->first_name . ' ' . $user->last_name }}
                                                            </h5>
                                                            <small
                                                                class="text-truncate w-100 text-muted">{{ $user->email }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <span
                                                                class="text-truncate w-100 text-muted">{{ $user->phone ?? 'N/A' }}</span>
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
                                                    @if ($user->role !== 'admin')
                                                        <a data-bs-toggle="modal"
                                                            data-bs-target="#edit-user-modal-{{ $user->id }}"
                                                            href="#" class="avtar avtar-xs btn-link-secondary">
                                                            <i class="ti ti-edit f-20"></i>
                                                        </a>
                                                    @endif

                                                    {{-- Delete --}}
                                                    <form id="delete-form-{{ $user->id }}" method="POST"
                                                        action="{{ route('admin.users.destroy', $user->id) }}"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')

                                                        @if ($user->role !== 'admin')
                                                            <a href="#"
                                                                class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                                data-id="{{ $user->id }}">
                                                                <i class="ti ti-trash f-20"></i>
                                                            </a>
                                                        @endif
                                                    </form>
                                                </td>
                                            </tr>

                                            {{-- Edit Modal per user --}}
                                            <div class="modal fade" id="edit-user-modal-{{ $user->id }}"
                                                tabindex="-1">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <form action="{{ route('admin.users.update', $user) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-header">
                                                                <h4 class="mb-0">User Edit</h4>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    {{-- First Name --}}
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">First Name</label>
                                                                        <input type="text" name="first_name"
                                                                            class="form-control"
                                                                            placeholder="Enter first name"
                                                                            value="{{ old('first_name', $user->first_name) }}">
                                                                        @error('first_name')
                                                                            <small
                                                                                class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>

                                                                    {{-- Last Name --}}
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Last Name</label>
                                                                        <input type="text" name="last_name"
                                                                            class="form-control"
                                                                            placeholder="Enter last name"
                                                                            value="{{ old('last_name', $user->last_name) }}">
                                                                        @error('last_name')
                                                                            <small
                                                                                class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>

                                                                    {{-- Phone --}}
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Contact</label>
                                                                        <input type="text" name="phone"
                                                                            class="form-control"
                                                                            placeholder="Enter contact no"
                                                                            value="{{ old('phone', $user->phone) }}">
                                                                        @error('phone')
                                                                            <small
                                                                                class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>

                                                                    {{-- Status --}}
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Status</label>
                                                                        <select name="status" class="form-select">
                                                                            <option value="">Select</option>
                                                                            <option value="active"
                                                                                {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>
                                                                                Active</option>
                                                                            <option value="inactive"
                                                                                {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>
                                                                                Inactive</option>
                                                                        </select>
                                                                        @error('status')
                                                                            <small
                                                                                class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>

                                                                    {{-- Email --}}
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Email <span
                                                                                class="text-danger">*</span></label>
                                                                        <input type="email" name="email"
                                                                            class="form-control" placeholder="Enter email"
                                                                            value="{{ old('email', $user->email) }}">
                                                                        @error('email')
                                                                            <small
                                                                                class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>

                                                                    {{-- Password --}}
                                                                    <div class="col-sm-6 mb-3">
                                                                        <label class="form-label">Password</label>
                                                                        <input type="password" name="password"
                                                                            class="form-control"
                                                                            placeholder="Current password required"
                                                                            readonly>
                                                                        {{-- <small class="text-muted">
                                                                            Current password required</small> --}}
                                                                        @error('password')
                                                                            <br><small
                                                                                class="text-danger">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer text-end">
                                                                <button class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
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
                        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                {{-- First Name --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control"
                                        placeholder="Enter first name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Last Name --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control"
                                        placeholder="Enter last name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Phone --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Contact</label>
                                    <input type="text" name="phone" class="form-control"
                                        placeholder="Enter contact no" value="{{ old('phone') }}">
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Status --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status" class="form-select">
                                        {{-- <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active
                                        </option> --}}
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter email"
                                        value="{{ old('email') }}" required>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                {{-- Password --}}
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" placeholder="********"
                                        required>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
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
@endsection
