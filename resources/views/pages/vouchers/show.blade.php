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
                                <li class="breadcrumb-item"><a href="{{ url('/vouchers') }}">Vouchers</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $voucher->invoice_id }}</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Details</h2>
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
                                    @if (in_array(strtolower($voucher->status), ['unpaid', 'partial paid']))
                                        <a href="{{ route('voucher.edit', $voucher->id) }}?redirect_to=voucher_show"
                                            class="avtar avtar-s btn-link-secondary">
                                            <i class="ph-duotone ph-pencil-simple-line f-22"></i>
                                        </a>
                                    @endif
                                </li>
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
                                @if ($school)
                                    <div class="d-flex align-items-center justify-content-center text-center ">
                                        <img src="{{ asset('storage/schools/' . $school->logo) }}" alt="School Logo"
                                            class="img-fluid user-upload" style="max-width: 150px;">
                                        <h2 class="text-center d-print-block ms-2 mt-2">{{ $school->name }}</h2>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center justify-content-center text-center">
                                        <img src="{{ asset('assets/images/user/sms.png') }}" alt="Default Logo"
                                            class="img-fluid user-upload" style="max-width: 150px;">
                                        <h2 class="text-center ms-2">School Name Not Set</h2>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="row align-items-center g-3">
                                            <div class="col-sm-6">
                                                <div class="m-0">
                                                    <p class="f-w-400 mb-1 text-start">Admission No :
                                                        <span class="f-w-600 mb-1 text-end">
                                                            {{ $voucher->student->admission_no ?? '' }}
                                                        </span>
                                                    </p>
                                                    <p class="f-w-400 mb-1 text-start">Student Name :
                                                        <span class="f-w-600 mb-1 text-end">
                                                            {{ $voucher->student->first_name ?? '' }}
                                                            {{ $voucher->student->last_name ?? '' }}
                                                        </span>
                                                    </p>
                                                    <p class="f-w-400 mb-1 text-start">Parents Name :
                                                        <span class="f-w-600 mb-1 text-end">
                                                            {{ $voucher->student->parents_name ?? 'N/A' }}
                                                        </span>
                                                    </p>
                                                    <p class="f-w-400 mb-1 text-start">Class / Section :
                                                        <span class="f-w-600 mb-1 text-end">
                                                            {{ optional(optional($voucher->student->classSection)->class)->name ?? 'N/A' }}
                                                            /
                                                            {{ optional(optional($voucher->student->classSection)->section)->name ?? 'N/A' }}
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-sm-end">
                                                <h6>Due Date :
                                                    <span class="text-muted f-w-600">
                                                        {{ \Carbon\Carbon::parse($voucher->payment_date)->format('d/m/Y') ?? 'N/A' }}
                                                    </span>
                                                </h6>
                                                <p class="f-w-400 mb-1 text-end">
                                                    <span class="text-muted f-w-600">{{ $voucher->invoice_id }}</span>
                                                    <span class="text-muted f-w-600">{{ $voucher->payment_id }}</span>
                                                </p>
                                                @php
                                                    $status = strtolower($voucher->status);
                                                    $badgeClass = match ($status) {
                                                        'paid' => 'success',
                                                        'unpaid' => 'danger',
                                                        'partial paid' => 'warning',
                                                        default => 'secondary',
                                                    };
                                                @endphp

                                                <h6>Payment Date :
                                                    @forelse ($voucher->payments as $payment)
                                                        <span class="text-muted f-w-600">
                                                            {{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}
                                                        </span>
                                                    @empty
                                                        <span class="text-muted f-w-600">N/A</span>
                                                    @endforelse
                                                </h6>

                                                <span
                                                    class="badge bg-light-{{ $badgeClass }} text-{{ $badgeClass }} rounded-pill ms-2">
                                                    {{ ucfirst($voucher->status) }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Fees Type</th>
                                                        <th class="text-end">Fees</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($voucher->items as $index => $item)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                {{ $item->feeType->name ?? 'ID: ' . $item->fee_type_id }}
                                                            </td>
                                                            <td class="text-end">{{ number_format($item->fee_amount) }} PKR
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-start">
                                            <hr class="mb-2 mt-1 border-secondary border-opacity-50" />
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="invoice-total ms-auto">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="f-w-600 mb-1 text-start">Grand Total :</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="f-w-600 mb-1 text-end">{{ number_format($voucher->amount) }}
                                                        PKR</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-12">
                                        <label class="form-label">Notes :</label>
                                        <p class="text-light" readonly>{{ $voucher->notes }}</p>
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
