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

            {{-- <x-alerts /> --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Basic Information</h5>
                        </div>
                        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
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
                                        <input type="date" name="dob" class="form-control" max="{{ date('Y-m-d') }}"
                                            value="{{ old('dob') }}" />
                                        @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Registration Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="registration_date" class="form-control"
                                            max="{{ date('Y-m-d') }}" value="{{ old('registration_date') }}" />
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
                                            value="{{ old('admission_no') }}" placeholder="Enter admission number" />
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
                                        <select id="class-dropdown" class="form-select">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ old('class_id', $class->id) }}">{{ $class->name }}</option>
                                            @endforeach
                                            @error('class_id')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Section</label>
                                        <select name="class_section_id" id="section-dropdown" class="form-select">
                                            <option value="{{ old('class_section_id') }}">Select Section</option>
                                        </select>
                                        @error('class_section_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            @foreach (['Active', 'Inactive'] as $s)
                                                <option value="{{ $s }}"
                                                    {{ old('status', 'Active') == $s ? 'selected' : '' }}>
                                                    {{ $s }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Secondary Mobile Number</label>
                                        <input type="text" name="secondary_mobile" class="form-control"
                                            value="{{ old('secondary_mobile') }}"
                                            placeholder="Enter secondary mobile number" />
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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const classDropdown = document.getElementById('class-dropdown');
            const sectionDropdown = document.getElementById('section-dropdown');

            classDropdown.addEventListener('change', function() {
                const classId = this.value;
                sectionDropdown.innerHTML = '<option>Loading...</option>';

                if (classId) {
                    fetch(`/get-class-sections/${classId}`)
                        .then(response => response.json())
                        .then(data => {
                            sectionDropdown.innerHTML = '<option value="">Select Section</option>';
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.text = item.section_name;
                                sectionDropdown.appendChild(option);
                            });
                        })
                        .catch(() => {
                            sectionDropdown.innerHTML = '<option>Error loading</option>';
                        });
                } else {
                    sectionDropdown.innerHTML = '<option value="">Select Section</option>';
                }
            });
        });
    </script>
@endsection
