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

            <x-alert-error />

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
                                        <label class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="first_name"
                                            value="{{ $student->first_name }}" placeholder="Enter first name" required>
                                    </div>

                                    {{-- Last Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="last_name"
                                            value="{{ $student->last_name }}" placeholder="Enter last name" required>
                                    </div>

                                    {{-- Date of Birth --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob"
                                            value="{{ $student->dob }}" required>
                                    </div>

                                    {{-- Registration Date --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Registration Date</label>
                                        <input type="date" class="form-control" name="registration_date"
                                            value="{{ $student->registration_date }}" required>
                                    </div>

                                    {{-- Admission No --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Admission No</label>
                                        <input type="text" class="form-control" name="admission_no"
                                            value="{{ $student->admission_no }}" required>
                                    </div>

                                    {{-- Roll No --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Roll No</label>
                                        <input type="text" class="form-control" name="roll_no"
                                            value="{{ $student->roll_no }}" required>
                                    </div>

                                    {{-- Class --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Class</label>
                                        <select class="form-select" name="class" required>
                                            <option disabled>Select</option>
                                            @foreach (['K.G', 'Montesori', 'Nursery', 'Prep', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '1st Year', '2nd Year'] as $class)
                                                <option value="{{ $class }}"
                                                    {{ $student->class == $class ? 'selected' : '' }}>{{ $class }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Section --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Section</label>
                                        <input type="text" class="form-control" name="section"
                                            value="{{ $student->section }}" required>
                                    </div>

                                    {{-- Gender --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select" name="gender" required>
                                            <option disabled>Select</option>
                                            @foreach (['Male', 'Female', 'Other'] as $gender)
                                                <option value="{{ $gender }}"
                                                    {{ $student->gender == $gender ? 'selected' : '' }}>
                                                    {{ $gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status" required>
                                            <option disabled>Select</option>
                                            <option value="Active" {{ $student->status == 'Active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="Inactive"
                                                {{ $student->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    {{-- Parent Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Parents Name</label>
                                        <input type="text" class="form-control" name="parents_name"
                                            value="{{ $student->parents_name }}" required>
                                    </div>

                                    {{-- Parent Mobile --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Parents Mobile Number</label>
                                        <input type="number" class="form-control" name="parents_mobile"
                                            value="{{ $student->parents_mobile }}" required>
                                    </div>

                                    {{-- Secondary Mobile --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Secondary Mobile Number</label>
                                        <input type="number" class="form-control" name="secondary_mobile"
                                            value="{{ $student->secondary_mobile }}">
                                    </div>

                                    {{-- Profile Photo --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Student Profile</label>
                                        <input class="form-control" type="file" name="profile_photo"
                                            accept="image/*">
                                    </div>

                                    {{-- Address --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea class="form-control" name="address" rows="2" required>{{ $student->address }}</textarea>
                                    </div>

                                    {{-- Submit Button --}}
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
