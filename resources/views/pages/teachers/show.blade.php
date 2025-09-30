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
                                <li class="breadcrumb-item"><a href="{{ url('/teachers') }}">Teachers</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $teacher->first_name }}
                                    {{ $teacher->last_name }}</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">{{ $teacher->first_name }} {{ $teacher->last_name }}</h2>
                                <p class="mb-1 text-muted">Teacher Profile</p>
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
                                        <i class="ti ti-user me-2"></i>Profile
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ session('active_tab') == 'profile-2' ? 'active' : '' }}"
                                        id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
                                        aria-selected="{{ session('active_tab') == 'profile-2' ? 'true' : 'false' }}">
                                        <i class="ti ti-school me-2"></i>Classes
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
                                            <div class="col-sm-12 text-start mb-3">
                                                <div class="user-upload wid-75">
                                                    @if ($teacher->profile_image)
                                                        <img src="{{ asset('storage/teachers/' . $teacher->profile_image) }}"
                                                            alt="img" class="img-fluid" />
                                                    @else
                                                        <img src="{{ asset('assets/images/user/avatar-5.jpg') }}"
                                                            alt="img" class="img-fluid" />
                                                    @endif
                                                </div>
                                            </div>

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">First Name</p>
                                                            <p class="mb-0">{{ $teacher->first_name }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Last Name</p>
                                                            <p class="mb-0"> {{ $teacher->last_name }}</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Joining Date</p>
                                                            <p class="mb-0">
                                                                {{ $teacher->joining_date ?? 'N/A' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Date of Birth</p>
                                                            <p class="mb-0">
                                                                {{ $teacher->date_of_birth ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Email</p>
                                                            <p class="mb-0">{{ $teacher->email }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Gender</p>
                                                            <p class="mb-0">{{ $teacher->gender }}</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Department</p>
                                                            <p class="mb-0">{{ $teacher->department ?? 'N/A' }}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Educations</p>
                                                            <p class="mb-0">{{ $teacher->education ?? 'N/A' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Phone</p>
                                                            <p class="mb-0">
                                                                {{ $teacher->mobile_number ?? 'N/A' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Monthly Salary</p>
                                                            <p class="mb-0">
                                                                {{ $teacher->monthly_salary ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p class="mb-1 text-muted">Address</p>
                                                            <p class="mb-0">{{ $teacher->address ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade {{ session('active_tab') == 'profile-2' ? 'show active' : '' }}"
                            id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-sm-flex align-items-center justify-content-between">
                                                <h5 class="mb-3 mb-sm-0">Teacher Assignment</h5>
                                                <a href="#"
                                                    class="btn btn-outline-secondary d-inline-flex align-items-center open-modal"
                                                    data-bs-toggle="modal" data-bs-target="#add-teacher-assign-modal"
                                                    data-teacher-id="{{ $teacher->id }}">
                                                    <i class="ti ti-arrow-right-circle f-20 me-1"></i>
                                                    Assign
                                                </a>

                                            </div>
                                        </div>
                                        <div class="card-body table-card">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Classes / Sections</th>
                                                            <th>Subjects</th>
                                                            <th class="text-end">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($teacher->assignments as $assignment)
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        <!-- Class Name -->
                                                                        <div class="fw-semibold mb-1">
                                                                            {{ $assignment->class->name ?? 'N/A' }}</div>

                                                                        <!-- Section + Head Master Badge -->
                                                                        <div
                                                                            class="text-muted small d-flex align-items-center gap-2">
                                                                            <span>{{ $assignment->section->name ?? 'N/A' }}</span>

                                                                            @if ($assignment->is_head_master ?? false)
                                                                                <span
                                                                                    class="badge bg-success text-white">Head
                                                                                    Master</span>
                                                                            @else
                                                                                <span
                                                                                    class="badge bg-secondary text-white">Teaches
                                                                                    this section</span>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="fw-bold mb-1">
                                                                        {{ $assignment->subject->name ?? 'N/A' }}
                                                                    </div>
                                                                </td>
                                                                <td class="text-end">
                                                                    <a href="#"
                                                                        class="avtar avtar-xs btn-link-secondary edit-assign-btn"
                                                                        data-assign-id="{{ $assignment->id }}"
                                                                        data-teacher-id="{{ $teacher->id }}"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#edit-teacher-assign-modal"
                                                                        title="Edit">
                                                                        <i class="ti ti-pencil f-20"></i>
                                                                    </a>



                                                                    <form
                                                                        action="{{ route('teacher-assignment.destroy', $assignment->id) }}"
                                                                        method="POST" class="d-inline"
                                                                        id="delete-form-{{ $assignment->id }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <a href="#"
                                                                            class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                                            data-id="{{ $assignment->id }}"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#delete-assign-modal-{{ $assignment->id }}"
                                                                            data-bs-toggle="tooltip" title="Delete">
                                                                            <i class="ti ti-trash f-20"></i>
                                                                        </a>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                </table>

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
    </div>

    {{-- Assign Modal --}}
    <div class="modal fade" id="add-teacher-assign-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">Assign</h5>
                    <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                        <i class="ti ti-x f-20"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('assign.class') }}" method="POST" id="assign-form">
                        @csrf

                        <input type="hidden" name="teacher_id" id="teacher_id">

                        <div class="mb-3">
                            <label class="form-label">Class <span class="text-danger">*</span></label>
                            <select name="class_id" id="class_id" class="form-select" required>
                                <option value="">Select Class</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Section <span class="text-danger">*</span></label>
                            <select name="class_section_id" id="section_id" class="form-select" required>
                                <option value="">Select Section</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <select name="subject_id" id="subject_id" class="form-select">
                                <option value="">Select Subject</option>
                            </select>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="1" id="isHeadMaster"
                                name="is_head_master">
                            <label class="form-check-label" for="isHeadMaster">
                                Assign as Head Master
                            </label>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Assignment Modal --}}
    <div class="modal fade" id="edit-teacher-assign-modal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h5 class="modal-title">Edit Assignment</h5>
                    <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                        <i class="ti ti-x f-20"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="edit-assign-form">
                        @method('PUT')
                        @csrf
                        {{-- Hidden Inputs --}}
                        <input type="hidden" name="assignment_id" id="edit_assignment_id">
                        <input type="hidden" name="teacher_id" id="edit_teacher_id">

                        <div class="mb-3">
                            <label class="form-label">Class <span class="text-danger">*</span></label>
                            <select name="class_id" id="edit_class_id" class="form-select" required>
                                <option value="">Select Class</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Section <span class="text-danger">*</span></label>
                            <select name="class_section_id" id="edit_section_id" class="form-select" required>
                                <option value="">Select Section</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <select name="subject_id" id="edit_subject_id" class="form-select">
                                <option value="">Select Subject</option>
                            </select>
                        </div>

                        <div class="form-check mb-3">
                            <input type="hidden" name="is_head_master" value="0">
                            <input class="form-check-input" type="checkbox" value="1" id="edit_isHeadMaster"
                                name="is_head_master">
                            <label class="form-check-label" for="edit_isHeadMaster">Assign as Head Master</label>
                        </div>


                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    {{-- teacher assign  --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById('add-teacher-assign-modal');
            const classDropdown = document.getElementById('class_id');
            const sectionDropdown = document.getElementById('section_id');
            const subjectDropdown = document.getElementById('subject_id');
            const teacherIdInput = document.getElementById('teacher_id');
            const assignForm = document.getElementById('assign-form');
            const isHeadMaster = document.getElementById('isHeadMaster');

            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const teacherId = button.getAttribute('data-teacher-id');
                teacherIdInput.value = teacherId;

                classDropdown.innerHTML = '<option value="">Select Class</option>';
                sectionDropdown.innerHTML = '<option value="">Select Section</option>';
                sectionDropdown.setAttribute('disabled', true);
                subjectDropdown.innerHTML = '<option value="">Select Subject</option>';
                isHeadMaster.checked = false;

                // Fetch classes and subjects
                fetch(`/teacher-assignment/${teacherId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.classes.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.text = item.name;
                            classDropdown.appendChild(option);
                        });

                        data.subjects.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.text = item.name;
                            subjectDropdown.appendChild(option);
                        });
                    });
            });

            classDropdown.addEventListener('change', function() {
                const classId = this.value;
                sectionDropdown.innerHTML = '<option>Loading...</option>';
                sectionDropdown.setAttribute('disabled', true);

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
                            sectionDropdown.removeAttribute('disabled');
                        })
                        .catch(() => {
                            sectionDropdown.innerHTML = '<option>Error loading</option>';
                            sectionDropdown.setAttribute('disabled', true);
                        });
                } else {
                    sectionDropdown.innerHTML = '<option value="">Select Section</option>';
                    sectionDropdown.setAttribute('disabled', true);
                }
            });

            assignForm.addEventListener('submit', function(e) {
                const classValue = classDropdown.value;
                const sectionValue = sectionDropdown.value;

                if (!classValue || !sectionValue) {
                    e.preventDefault();
                    alert("Please select Class and Section.");
                    return;
                }
            });
        });
    </script>

    {{-- Edit Assignment --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editModal = document.getElementById('edit-teacher-assign-modal');
            const editClassDropdown = document.getElementById('edit_class_id');
            const editSectionDropdown = document.getElementById('edit_section_id');
            const editSubjectDropdown = document.getElementById('edit_subject_id');
            const editTeacherIdInput = document.getElementById('edit_teacher_id');
            const editAssignIdInput = document.getElementById('edit_assignment_id');
            const editForm = document.getElementById('edit-assign-form');
            const editIsHeadMaster = document.getElementById('edit_isHeadMaster');

            editModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const assignId = button.getAttribute('data-assign-id');
                const teacherId = button.getAttribute('data-teacher-id');

                // hidden inputs
                editAssignIdInput.value = assignId;
                editTeacherIdInput.value = teacherId;

                // form action
                editForm.action = `/teacher-assignment/${assignId}`;

                // reset dropdowns
                editClassDropdown.innerHTML = '<option value="">Select Class</option>';
                editSectionDropdown.innerHTML = '<option value="">Select Section</option>';
                editSectionDropdown.setAttribute('disabled', true);
                editSubjectDropdown.innerHTML = '<option value="">Select Subject</option>';
                editIsHeadMaster.checked = false;

                // fetch assignment
                fetch(`/teacher-assignment/${assignId}/edit`)
                    .then(res => res.json())
                    .then(data => {
                        const assignment = data.assignment;

                        // classes
                        data.classes.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.text = item.name;
                            if (assignment.class_id == item.id) {
                                option.selected = true;
                            }
                            editClassDropdown.appendChild(option);
                        });

                        // subjects
                        data.subjects.forEach(item => {
                            const option = document.createElement('option');
                            option.value = item.id;
                            option.text = item.name;
                            if (assignment.subject_id == item.id) {
                                option.selected = true;
                            }
                            editSubjectDropdown.appendChild(option);
                        });

                        // sections
                        fetch(`/get-class-sections/${assignment.class_id}`)
                            .then(res => res.json())
                            .then(sections => {
                                editSectionDropdown.innerHTML =
                                    '<option value="">Select Section</option>';
                                sections.forEach(sec => {
                                    const option = document.createElement('option');
                                    option.value = sec.id;
                                    option.text = sec.section_name;
                                    if (assignment.class_section_id == sec.id) {
                                        option.selected = true;
                                    }
                                    editSectionDropdown.appendChild(option);
                                });
                                editSectionDropdown.removeAttribute('disabled');
                            });

                        // head master checkbox
                        if (assignment.is_head_master) {
                            editIsHeadMaster.checked = true;
                        }
                    });
            });

            // reload sections when class changes
            editClassDropdown.addEventListener('change', function() {
                const classId = this.value;
                editSectionDropdown.innerHTML = '<option>Loading...</option>';
                editSectionDropdown.setAttribute('disabled', true);

                if (classId) {
                    fetch(`/get-class-sections/${classId}`)
                        .then(res => res.json())
                        .then(data => {
                            editSectionDropdown.innerHTML = '<option value="">Select Section</option>';
                            data.forEach(item => {
                                const option = document.createElement('option');
                                option.value = item.id;
                                option.text = item.section_name;
                                editSectionDropdown.appendChild(option);
                            });
                            editSectionDropdown.removeAttribute('disabled');
                        })
                        .catch(() => {
                            editSectionDropdown.innerHTML = '<option>Error loading</option>';
                            editSectionDropdown.setAttribute('disabled', true);
                        });
                } else {
                    editSectionDropdown.innerHTML = '<option value="">Select Section</option>';
                    editSectionDropdown.setAttribute('disabled', true);
                }
            });

            // validation
            editForm.addEventListener('submit', function(e) {
                if (!editClassDropdown.value || !editSectionDropdown.value) {
                    e.preventDefault();
                    alert("Please select Class and Section.");
                }
            });
        });
    </script>

    {{-- Tooltip --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
            tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>

@endsection
