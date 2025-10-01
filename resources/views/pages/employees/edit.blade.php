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
                                <li class="breadcrumb-item" aria-current="page">Employees</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">
                                    Edit Employee
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <x-alerts /> --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Basic Information</h5>
                        </div>
                        <form action="{{ route('employees.update', $employee->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="row">

                                    {{-- First Name (Required) --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name', $employee->first_name) }}"
                                            placeholder="Enter first name" required />
                                        @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Last Name (Optional) --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name', $employee->last_name) }}"
                                            placeholder="Enter last name" />
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Mobile No --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" name="mobile_no" class="form-control"
                                            value="{{ old('mobile_no', $employee->mobile_no) }}"
                                            placeholder="Enter mobile number" required />
                                        @error('mobile_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                       {{-- Monthly Salary --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Monthly Salary <span class="text-danger">*</span></label>
                                        <input type="number" name="monthly_salary" class="form-control"
                                            value="{{ old('monthly_salary', $employee->monthly_salary) }}"
                                            placeholder="Enter monthly salary" />
                                        @error('monthly_salary')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Gender --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="">Select</option>
                                            @foreach (['Male', 'Female', 'Other'] as $gender)
                                                <option value="{{ $gender }}"
                                                    {{ old('gender', $employee->gender) == $gender ? 'selected' : '' }}>
                                                    {{ ucfirst($gender) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- DOB --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" max="{{ date('Y-m-d') }}"
                                            value="{{ old('dob', $employee->dob) }}" />
                                        @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Joining Date --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Joining Date</label>
                                        <input type="date" name="joining_date" class="form-control"
                                            max="{{ date('Y-m-d') }}"
                                            value="{{ old('joining_date', $employee->joining_date) }}" />
                                        @error('joining_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $employee->email) }}" placeholder="Enter email" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Department --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Department</label>
                                        <input type="text" name="department" class="form-control"
                                            value="{{ old('department', $employee->department) }}"
                                            placeholder="Enter department" />
                                        @error('department')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="Active" {{ old('status', $employee->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('status', $employee->status ?? '') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Profile Image --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Employee Profile</label>
                                        <input type="file" name="employee_profile" class="form-control" />
                                        @if ($employee->employee_profile)
                                            <small class="text-muted">Current: {{ $employee->employee_profile }}</small>
                                        @endif
                                        @error('employee_profile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Address --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" rows="1" placeholder="Enter address">{{ old('address', $employee->address) }}</textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Submit --}}
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
