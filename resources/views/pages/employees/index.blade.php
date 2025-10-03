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
                                <h2 class="mb-0">Employees List</h2>
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
                                <h5 class="mb-3 mb-sm-0">Employee list</h5>
                                <div>
                                    <a href="{{ route('employees.create') }}" class="btn btn-light-info">Add Employee</a>
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
