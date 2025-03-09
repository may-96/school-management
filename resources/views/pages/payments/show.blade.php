@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Student Fees</a></li>
                                <li class="breadcrumb-item" aria-current="page">Detail</li>
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
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="d-print-none card mb-3">
                        <div class="card-body p-3">
                            <ul class="list-inline ms-auto mb-0 d-flex justify-content-end flex-wrap">
                                <li class="list-inline-item align-bottom me-2">
                                    <a href="{{ route('payment.edit') }}" class="avtar avtar-s btn-link-secondary">
                                        <i class="ph-duotone ph-pencil-simple-line f-22"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item align-bottom me-2">
                                    <a onclick="window.print()" href="#" class="avtar avtar-s btn-link-secondary">
                                        <i class="ph-duotone ph-printer f-22"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="row align-items-center g-3">
                                        <div class="col-sm-6">
                                            <div class="m-0">
                                                <p class="f-w-400 mb-1 text-start">Admission No : <span
                                                        class="f-w-600 mb-1 text-end">AD837568378</span></p>
                                                <p class="f-w-400 mb-1 text-start">Student Name : <span
                                                        class="f-w-600 mb-1 text-end">Saqib Din</span></p>
                                                <p class="f-w-400 mb-1 text-start">Father Name : <span
                                                        class="f-w-600 mb-1 text-end">Muhammad Khan</span></p>
                                                <p class="f-w-400 mb-1 text-start">Class / Section : <span
                                                        class="f-w-600 mb-1 text-end">10th Green</span></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <h6>Due Date :<span class="text-muted f-w-600">10/8/2023</span></h6>
                                            <p class="f-w-400 mb-1 text-end">INV ID - <span
                                                    class="text-muted f-w-600">23452353</span></p>
                                            <span class="badge bg-light-success rounded-pill ms-2">Paid</span>

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
                                                <tr>
                                                    <td>1</td>
                                                    <td>Tuition Fees</td>
                                                    <td class="text-end">3000 Pkr</td>
                                                </tr>

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
                                                <p class="f-w-600 mb-1 text-end">7900 Pkr</p>
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
@endsection
