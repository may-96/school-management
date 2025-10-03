@extends('layouts.master')

@section('content')
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #printable-area,
            #printable-area * {
                visibility: visible;
            }

            #printable-area {
                position: relative;
                top: 0;
                left: 0;
                width: 100%;
            }

            .d-print-none {
                display: none !important;
            }

            .d-screen-none {
                display: block !important;
            }
        }

        @media screen {
            .d-screen-none {
                display: none !important;
            }
        }
    </style>

    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('payrolls.index') }}">Payrolls</a></li>
                                <li class="breadcrumb-item" aria-current="page">Payroll #{{ $payroll->id }}</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Payroll Slip</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alerts />

            <div class="row">
                <div class="col-sm-12">
                    <div class="d-print-none card mb-3">
                        <div class="card-body p-3">
                            <ul class="list-inline ms-auto mb-0 d-flex justify-content-end flex-wrap">
                                <li class="list-inline-item align-bottom me-2">
                                    <a onclick="window.print()" href="#"
                                        class="avtar avtar-s btn-link-secondary d-print-none">
                                        <i class="ph-duotone ph-printer f-22"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div id="printable-area">
                        <div class="card mb-3 d-screen-none d-print-block">
                            <div class="card-body p-3">

                                <h2 class="text-center ms-2">Payroll Slip</h2>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="row align-items-center g-3">
                                            <div class="col-sm-6">
                                                {{-- <p class="f-w-400 mb-1 text-start">Employee ID:
                                                    <span class="f-w-600">{{ $payroll->employee_id }}</span>
                                                </p> --}}
                                                <p class="f-w-400 mb-1 text-start">Name:
                                                    <span class="f-w-600">{{ $employee->first_name ?? '' }}
                                                        {{ $employee->last_name ?? '' }}</span>
                                                </p>
                                                {{-- <p class="f-w-400 mb-1 text-start">Department:
                                                    <span class="f-w-600">{{ $employee->department ?? 'N/A' }}</span>
                                                </p> --}}
                                                <p class="f-w-400 mb-1 text-start">
                                                    Type:
                                                    <span
                                                        class="f-w-600">{{ class_basename($payroll->employee_type) }}</span>
                                                </p>
                                            </div>
                                            <div class="col-sm-6 text-sm-end">
                                                <h6>Payroll Month:
                                                    <span class="text-muted f-w-600">
                                                        {{ \Carbon\Carbon::parse($payroll->payroll_month)->format('F Y') }}
                                                    </span>
                                                </h6>
                                                <h6>Generated On:
                                                    <span class="text-muted f-w-600">
                                                        {{ $payroll->created_at->format('d/m/Y') }}
                                                    </span>
                                                </h6>
                                                <h6>Status:
                                                    <span class="text-muted f-w-600">
                                                        @if ($payroll->status == 'paid')
                                                            <span class="badge bg-light-success">Paid</span>
                                                        @else
                                                            <span class="badge bg-light-danger">Unpaid</span>
                                                        @endif
                                                    </span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Pay Types</th>
                                                        <th class="text-end">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        {{-- <td>1</td> --}}
                                                        {{-- <td>Basic Salary</td> --}}
                                                        {{-- <td class="text-end">
                                                            {{ number_format($payroll->monthly_salary, 2) }}</td>
                                                    </tr> --}}

                                                        @foreach ($payroll->details as $index => $detail)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $detail->payType->name }}</td>
                                                        <td class="text-end">
                                                            {{ $detail->payType->is_deductible ? '-' : '+' }}
                                                            {{ number_format($detail->amount, 2) }}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>


                                            </table>
                                        </div>
                                        <hr class="mb-2 mt-1 border-secondary border-opacity-50" />
                                    </div>

                                    <div class="col-12">
                                        <div class="invoice-total ms-auto">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="f-w-600 mb-1 text-start">Total:</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="f-w-600 mb-1 text-end">
                                                        {{ number_format($payroll->net_salary ?? $payroll->monthly_salary, 2) }}
                                                        PKR
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-12">
                                        <label class="form-label">Notes:</label>
                                        <p class="text-light">{{ $payroll->notes }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <script>
        const body = document.body;
        window.addEventListener('beforeprint', () => {
            body.setAttribute('data-pc-theme', 'light');
        });
        window.addEventListener('afterprint', () => {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                body.setAttribute('data-pc-theme', 'dark');
            } else if (savedTheme === 'light') {
                body.setAttribute('data-pc-theme', 'light');
            } else {
                const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const systemTheme = systemPrefersDark ? 'dark' : 'light';
                body.setAttribute('data-pc-theme', systemTheme);
            }
        });
    </script>
@endsection
