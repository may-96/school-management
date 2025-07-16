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
                                <li class="breadcrumb-item">Student</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">
                                    Student Add
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
                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name') }}" placeholder="Enter first name" />
                                        @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name') }}" placeholder="Enter last name" />
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Parents Name <span class="text-danger">*</span></label>
                                        <input type="text" name="parents_name" class="form-control"
                                            value="{{ old('parents_name') }}" placeholder="Enter parents name" />
                                        @error('parents_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Parents Mobile Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="parents_mobile" class="form-control"
                                            value="{{ old('parents_mobile') }}" placeholder="Enter parents mobile number" />
                                        @error('parents_mobile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" name="dob" class="form-control"
                                            value="{{ old('dob') }}" />
                                        @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Registration Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="registration_date" class="form-control"
                                            value="{{ old('registration_date') }}" />
                                        @error('registration_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-select">
                                            <option value="">Select</option>
                                            @foreach (['Male', 'Female', 'Other'] as $g)
                                                <option value="{{ $g }}"
                                                    {{ old('gender') == $g ? 'selected' : '' }}>{{ $g }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Admission No <span class="text-danger">*</span></label>
                                        <input type="number" name="admission_no" class="form-control"
                                            value="{{ old('admission_no') }}" placeholder="Enter ID number" />
                                        @error('admission_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Roll No</label>
                                        <input type="number" name="roll_no" class="form-control"
                                            value="{{ old('roll_no') }}" placeholder="Enter roll no" />
                                        @error('roll_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Class</label>
                                        <select name="class" class="form-select">
                                            <option>Select</option>
                                            @foreach (['K.G', 'Montesori', 'Nursery', 'Prep', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '1st Year', '2nd Year'] as $item)
                                                <option {{ old('class') == $item ? 'selected' : '' }}>{{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('class')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Section</label>
                                        <input type="text" name="section" class="form-control"
                                            value="{{ old('section') }}" placeholder="Enter Section" />
                                        @error('section')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            @foreach (['Active', 'Inactive'] as $s)
                                                <option value="{{ $s }}"
                                                    {{ old('status', 'Inactive') == $s ? 'selected' : '' }}>
                                                    {{ $s }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Secondary Mobile Number</label>
                                        <input type="text" name="secondary_mobile" class="form-control"
                                            value="{{ old('secondary_mobile') }}"
                                            placeholder="Enter Secondary Mobile Number" />
                                        @error('secondary_mobile')  
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Student Profile</label>
                                        <input type="file" name="profile_photo" class="form-control" />
                                        @error('profile_photo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" rows="2" placeholder="Enter address">{{ old('address') }}</textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

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
