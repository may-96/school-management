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
                                <li class="breadcrumb-item" aria-current="page">Student</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">
                                    Student Edit
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Basic Information</h5>
                        </div>
                        <form action="{{ route('student.update', $student->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    {{-- First Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ old('first_name', $student->first_name) }}"
                                            placeholder="Enter first name">
                                        @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Last Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ old('last_name', $student->last_name) }}"
                                            placeholder="Enter last name">
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Parents Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Parents Name</label>
                                        <input type="text" class="form-control" name="parents_name"
                                            value="{{ old('parents_name', $student->parents_name) }}">
                                    </div>

                                    {{-- Parents Mobile Number --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Parents Mobile Number <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="parents_mobile"
                                            value="{{ old('parents_mobile', $student->parents_mobile) }}">
                                        @error('parents_mobile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Date of Birth --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="dob"
                                            value="{{ old('dob', $student->dob) }}">
                                        @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Registration Date --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Registration Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="registration_date"
                                            value="{{ old('registration_date', $student->registration_date) }}">
                                        @error('registration_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Gender --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select class="form-select" name="gender">
                                            <option value="">Select</option>
                                            @foreach (['Male', 'Female', 'Other'] as $gender)
                                                <option value="{{ $gender }}"
                                                    {{ old('gender', $student->gender) == $gender ? 'selected' : '' }}>
                                                    {{ $gender }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Admission No --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Admission No <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="admission_no"
                                            value="{{ old('admission_no', $student->admission_no) }}">
                                        @error('admission_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Roll No --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Roll No</label>
                                        <input type="number" class="form-control" name="roll_no"
                                            value="{{ old('roll_no', $student->roll_no) }}">
                                        @error('roll_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Class --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Class</label>
                                        <select class="form-select" name="class">
                                            <option>Select</option>
                                            @foreach (['K.G', 'Montesori', 'Nursery', 'Prep', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '1st Year', '2nd Year'] as $class)
                                                <option value="{{ $class }}"
                                                    {{ old('class', $student->class) == $class ? 'selected' : '' }}>
                                                    {{ $class }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Section --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Section</label>
                                        <input type="text" class="form-control" name="section"
                                            value="{{ old('section', $student->section) }}">
                                        @error('section')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            {{-- <option value="">Select</option> --}}
                                            @foreach (['Active', 'Inactive'] as $status)
                                                <option value="{{ $status }}"
                                                    {{ old('status', $student->status) == $status ? 'selected' : '' }}>
                                                    {{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Secondary Mobile --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Secondary Mobile Number</label>
                                        <input type="number" class="form-control" name="secondary_mobile"
                                            value="{{ old('secondary_mobile', $student->secondary_mobile) }}">
                                        @error('secondary_mobile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Profile Photo --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Student Profile Photo</label>
                                        <input class="form-control" type="file" name="profile_photo"
                                            accept="image/*">
                                    </div>

                                    {{-- Address --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" rows="2">{{ old('address', $student->address) }}</textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Submit --}}
                                    <div class="col-md-12 text-end">
                                        <button class="btn btn-primary" type="submit">Update</button>
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
