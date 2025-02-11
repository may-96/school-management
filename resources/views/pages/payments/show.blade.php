@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('payment.dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Student Fees</a></li>
                                <li class="breadcrumb-item" aria-current="page">Detail</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Detail</h2>
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
                                    <a href="#" class="avtar avtar-s btn-link-secondary">
                                        <i class="ph-duotone ph-download-simple f-22"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item align-bottom me-2">
                                    <a href="#" class="avtar avtar-s btn-link-secondary">
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
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="img/s.jpg" class="img-fluid rounded-3" alt="images"
                                                    style="height:3em; width:3em"; />
                                                <span class="badge bg-light-secondary rounded-pill ms-2">Unpaid</span>
                                            </div>
                                            <p class="mb-0">INV - 000457</p>
                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <h6>Due Date <span class="text-muted f-w-400">10/8/2023</span></h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Roll No</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th class="text-end">Price</th>
                                                    <th class="text-end">Total Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>Musa Khan</td>
                                                    <td>Topper</td>
                                                    <td class="text-end">$80.00</td>
                                                    <td class="text-end">$160.00</td>
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
                                                <p class="text-muted mb-1 text-start">Discount :</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="mb-1 text-end text-success">$10.00</p>
                                            </div>

                                            <div class="col-6">
                                                <p class="f-w-600 mb-1 text-start">Grand Total :</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="f-w-600 mb-1 text-end">$150.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 text-end d-print-none">
                                    <button class="btn btn-outline-secondary btn-print-invoice">Download</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
