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
                                <li class="breadcrumb-item"><a href="{{ url('/students') }}">Students</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $student->first_name }}
                                    {{ $student->last_name }}</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">{{ $student->first_name }} {{ $student->last_name }}</h2>
                                <p class="mb-1 text-muted">Edit Student</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alerts />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Basic Information</h5>
                        </div>
                        <form action="{{ route('students.update', $student->id) }}" method="POST"
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
                                            value="{{ old('parents_name', $student->parents_name) }}"
                                            placeholder="Enter parents name">
                                        @error('parents_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Parents Mobile Number --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Parents Mobile Number <span
                                                class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="parents_mobile"
                                            value="{{ old('parents_mobile', $student->parents_mobile) }}"
                                            placeholder="Enter parents mobile number">
                                        @error('parents_mobile')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Date of Birth --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" max="{{ date('Y-m-d') }}" name="dob"
                                            value="{{ old('dob', $student->dob) }}">
                                        @error('dob')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Registration Date --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Registration Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" max="{{ date('Y-m-d') }}"
                                            name="registration_date"
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
                                            value="{{ old('admission_no', $student->admission_no) }}"
                                            placeholder="Enter admission number">
                                        @error('admission_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Roll No --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Roll No</label>
                                        <input type="number" class="form-control" name="roll_no"
                                            value="{{ old('roll_no', $student->roll_no) }}"
                                            placeholder="Enter roll number">
                                        @error('roll_no')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Class --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Class</label>
                                        <select id="class-dropdown" class="form-select"
                                            data-selected-class="{{ $selectedClassId }}">
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Section</label>
                                        <select name="class_section_id" id="section-dropdown" class="form-select"
                                            data-selected-section="{{ old('class_section_id', $student->class_section_id) }}">
                                            <option value="{{ old('class_section_id') }}">Select Section</option>
                                        </select>
                                        @error('class_section_id')
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
                                            value="{{ old('secondary_mobile', $student->secondary_mobile) }}"
                                            placeholder="Enter secondary mobile number">
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
                                        <textarea class="form-control" name="address" rows="2" placeholder="Enter address">{{ old('address', $student->address) }}</textarea>
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


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const classDropdown = document.getElementById('class-dropdown');
            const sectionDropdown = document.getElementById('section-dropdown');
            const selectedClassId = classDropdown.dataset.selectedClass;
            const selectedSectionId = sectionDropdown.dataset.selectedSection;

            function loadSections(classId, callback = null) {
                sectionDropdown.innerHTML = '<option>Loading...</option>';
                fetch(`/get-class-sections/${classId}`)
                    .then(response => response.json())
                    .then(data => {
                        sectionDropdown.innerHTML = '<option value="">Select Section</option>';
                        data.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.text = item.section_name;
                            if (selectedSectionId && selectedSectionId == item.id) {
                                option.selected = true;
                            }
                            sectionDropdown.appendChild(option);
                        });
                        if (callback) callback();
                    })
                    .catch(() => {
                        sectionDropdown.innerHTML = '<option>Error loading</option>';
                    });
            }

            if (selectedClassId) {
                classDropdown.value = selectedClassId;
                loadSections(selectedClassId);
            }

            classDropdown.addEventListener('change', function() {
                const classId = this.value;
                if (classId) {
                    sectionDropdown.dataset.selectedSection = '';
                    loadSections(classId);
                } else {
                    sectionDropdown.innerHTML = '<option value="">Select Section</option>';
                }
            });
        });
    </script>
@endsection
