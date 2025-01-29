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
                                <li class="breadcrumb-item" aria-current="page">Edit</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Edit</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-sm-6 col-xl-3">
                                    <div class="mb-3 mb-0">
                                        <label class="form-label">Invoice id</label>
                                        <input type="text" class="form-control" placeholder="#xxxx" value="8795646525451"
                                            readonly />
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3">
                                    <div class="mb-3 mb-0">
                                        <label class="form-label">Payment Type</label>
                                        <select class="form-select" id="exampleFormControlSelect1">
                                            <option>Please Select</option>
                                            <option selected>cash</option>
                                            <option>cheque</option>
                                            <option>credit card</option>
                                            <option>online transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-3">
                                    <div class="mb-3 mb-0">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" id="exampleFormControlSelect1">
                                            <option>Please Select</option>
                                            <option selected>Paid</option>
                                            <option>Unpaid</option>
                                            <option>Partial Paid</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-xl-3">
                                    <div class="mb-3 mb-0">
                                        <label class="form-label">Due Date</label>
                                        <input type="datetime-local" class="form-control" value="2022-02-06T11:42:13.510" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <h5>Detail</h5>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><span class="text-danger">*</span>Roll No</th>
                                                    <th><span class="text-danger">*</span>Name</th>
                                                    <th><span class="text-danger">*</span>Description</th>
                                                    <th>Price</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="number" class="form-control" placeholder="Roll No"
                                                            value="34" /></td>
                                                    <td><input type="text" class="form-control" placeholder="Name"
                                                            value="Musa Khan" /></td>
                                                    <td><input type="text" class="form-control" placeholder="Description"
                                                            value="Topper Student" /></td>
                                                    <td><input type="number" class="form-control" placeholder="Price"
                                                            value="275.00" /></td>
                                                    <td class="text-center">
                                                        <a href="#"
                                                            class="avtar avtar-s btn-link-danger btn-pc-default"><i
                                                                class="ti ti-trash f-20"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="invoice-total ms-auto">
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="text-muted mb-1 text-start">Discount :</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="f-w-600 mb-1 text-end text-success">$10.00</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="f-w-600 mb-1 text-start">Grand Total :</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="f-w-600 mb-1 text-end">$25.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row align-items-end justify-content-end g-3">

                                        <div class="col-sm-auto btn-page">
                                            <a href="{{ route('payment.show') }}"
                                                class="btn btn-outline-secondary">Preview</a>
                                            <button class="btn btn-primary">Update</button>
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
