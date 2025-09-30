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
                                <h2 class="mb-0">Teachers List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alerts />

            <div class="row">
                <div class="col-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5 class="mb-3 mb-sm-0">Teacher list</h5>
                                <div>
                                    <a href="{{ route('teachers.create') }}" class="btn btn-primary">Add Teacher</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                {!! $dataTable->table(['class' => 'table table-hover'], true) !!}
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

    @push('scripts')
        {!! $dataTable->scripts() !!}

        {{-- tooltips --}}
        <script>
            function initTooltips() {
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-hover="tooltip"]'));
                tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }

            document.addEventListener('DOMContentLoaded', initTooltips);

            $(document).on('draw.dt', function() {
                initTooltips();
            });
        </script>
    @endpush
@endsection
