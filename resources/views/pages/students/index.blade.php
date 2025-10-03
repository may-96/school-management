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
                                <li class="breadcrumb-item" aria-current="page">Students</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Students List</h2>
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
                                <h5 class="mb-3 mb-sm-0">Student list</h5>
                                <div>
                                    <a href="#" class="btn btn-outline-secondary d-inline-flex align-items-center me-2"
                                        id="idBtnSub" style="visibility: hidden;">
                                        <i class="ph-duotone ph-plus-circle me-1"></i>Create Fee Voucher
                                    </a>

                                    <a href="{{ route('students.create') }}" class="btn btn-primary">Add Student</a>
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

    @push('scripts')
        {!! $dataTable->scripts() !!}

        <script>
            function handleButtonState() {
                const button = document.getElementById("idBtnSub");
                const checkedBoxes = $('.student-checkbox:checked');
                const selectedStudentIds = checkedBoxes.map(function() {
                    return $(this).data('student-id');
                }).get();

                localStorage.setItem('selectedStudentIds', JSON.stringify(selectedStudentIds));

                if (selectedStudentIds.length === 1) {
                    button.href = `/students/voucher/create/${selectedStudentIds[0]}`;
                    button.style.visibility = "visible";
                } else if (selectedStudentIds.length > 1) {
                    button.href = `/students/voucher/create`;
                    button.style.visibility = "visible";
                } else {
                    button.href = "#";
                    button.style.visibility = "hidden";
                }

                if (selectedStudentIds.length > 0) {
                    $('.single-voucher-btn')
                        .addClass('disabled')
                        .css({
                            'pointer-events': 'none',
                            'opacity': '0.5'
                        })
                        .closest('.tooltip-wrapper')
                        .attr('data-bs-title', 'Disabled while checkbox selected')
                        .tooltip('dispose')
                        .tooltip();
                } else {
                    $('.single-voucher-btn')
                        .removeClass('disabled')
                        .css({
                            'pointer-events': '',
                            'opacity': ''
                        })
                        .closest('.tooltip-wrapper')
                        .attr('data-bs-title', 'Create Voucher')
                        .tooltip('dispose')
                        .tooltip();
                }
            }

            $(document).on('change', '.student-checkbox', handleButtonState);
            $(document).ready(function() {
                $('[data-bs-toggle="tooltip"]').tooltip();
                handleButtonState();
            });
        </script>

        <script>
            localStorage.removeItem('selectedStudentIds');
        </script>

        {{-- student checkbox click handling --}}
        <script>
            $('#student-table').on('draw.dt', function() {
                bindCheckboxEvents();
            });

            function bindCheckboxEvents() {
                $('#bulk-checkbox').off('change').on('change', function() {
                    const isChecked = $(this).is(':checked');
                    $('.student-checkbox').each(function() {
                        if ($(this).data('status') === 'Active') {
                            $(this).prop('checked', isChecked);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                    handleButtonState();
                });

                $('.student-checkbox').off('change').on('change', function() {
                    handleButtonState();

                    const totalActive = $('.student-checkbox[data-status="Active"]').length;
                    const checkedActive = $('.student-checkbox[data-status="Active"]:checked').length;
                    $('#bulk-checkbox').prop('checked', totalActive === checkedActive);
                });
            }

            $(document).ready(function() {
                bindCheckboxEvents();
            });
        </script>

        {{-- student voucher button click handling --}}
        <script>
            document.getElementById("idBtnSub").addEventListener("click", function(e) {
                e.preventDefault();

                const selectedStudentIds = JSON.parse(localStorage.getItem('selectedStudentIds') || "[]");

                if (selectedStudentIds.length === 0) {
                    showErrorAlert("Please select at least one student.");
                    return;
                }

                fetch(`/students/status-check-multiple`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            student_ids: selectedStudentIds
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.inactive && data.inactive.length > 0) {
                            const inactiveNames = data.inactive.map(s => s.name).join(', ');
                            showErrorAlert([
                                `Inactive student(s): ${inactiveNames}`
                            ]);
                        } else {
                            if (selectedStudentIds.length === 1) {
                                window.location.href = `/students/voucher/create/${selectedStudentIds[0]}`;
                            } else {
                                window.location.href = `/students/voucher/create`;
                            }
                        }
                    })
                    .catch(error => {
                        showErrorAlert("Something went wrong. Please try again.");
                        console.error(error);
                    });
            });
        </script>

        {{-- tooltips --}}
        <script>
            function initTooltips() {
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
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
