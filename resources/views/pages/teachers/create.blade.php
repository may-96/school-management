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
                                <li class="breadcrumb-item" aria-current="page">Teachers</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">
                                    Add Teacher
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
                        <form action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    {{-- First Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name') }}" placeholder="Enter first name" />
                                        @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Last Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name') }}" placeholder="Enter last name" />
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Gender --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-select">
                                            <option value="">Select</option>
                                            @foreach (['Male', 'Female', 'Other'] as $gender)
                                                <option value="{{ $gender }}"
                                                    {{ old('gender') == $gender ? 'selected' : '' }}>{{ $gender }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Mobile Number --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" name="mobile_number" class="form-control"
                                            value="{{ old('mobile_number') }}" placeholder="Enter Mobile number" />
                                        @error('mobile_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Date of Birth --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth" class="form-control"
                                            max="{{ date('Y-m-d') }}" value="{{ old('date_of_birth') }}" />
                                        @error('date_of_birth')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Joining Date --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Joining Date <span class="text-danger">*</span></label>
                                        <input type="date" name="joining_date" class="form-control"
                                            max="{{ date('Y-m-d') }}" value="{{ old('joining_date') }}" />
                                        @error('joining_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Monthly Salary --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Monthly Salary <span class="text-danger">*</span></label>
                                        <input type="number" name="monthly_salary" class="form-control"
                                            value="{{ old('monthly_salary', $teacher->monthly_salary ?? '') }}"
                                            placeholder="Enter monthly salary" step="0.01" min="0" />
                                        @error('monthly_salary')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Enter email" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Department --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Department</label>
                                        <input type="text" name="department" class="form-control"
                                            value="{{ old('department') }}" placeholder="Enter department">
                                        @error('department')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Education --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Education</label>
                                        <input type="text" name="education" class="form-control"
                                            value="{{ old('education') }}" placeholder="Enter Education" />
                                        @error('education')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option value="Active" {{ old('status', $teacher->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="Inactive" {{ old('status', $teacher->status ?? '') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Teacher Profile --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Teacher Profile</label>
                                        <input class="form-control" type="file" name="profile_photo" />
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" rows="2" placeholder="Enter address">{{ old('address') }}</textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Submit --}}
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
