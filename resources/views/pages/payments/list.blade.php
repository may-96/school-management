@extends('layouts.master')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('payment.list') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Payment</a></li>
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->


            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5 class="mb-3 mb-sm-0">Payments list</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel"
                                    aria-labelledby="analytics-tab-1" tabindex="0">
                                    <div class="table-responsive">
                                        <table class="table table-hover" id="pc-dt-simple-1">
                                            <thead>
                                                <tr>
                                                    <th>Invoice Id</th>
                                                    <th>Refrence No</th>
                                                    <th>Payment Date</th>
                                                    <th>Payment Method</th>
                                                    <th>Amount</th>
                                                    <th class="text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>4567547765</td>
                                                    <td>RN-001</td>
                                                    <td>7/11/2022</td>
                                                    <td>Easypaisa</td>
                                                    <td>3000 Pkr</td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a data-bs-toggle="modal"
                                                                    data-bs-target="#student-edit-payment_modal" href="#"
                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                        class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"> <a href="#"
                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4567547765</td>
                                                    <td>RN-001</td>
                                                    <td>7/11/2022</td>
                                                    <td>Easypaisa</td>
                                                    <td>3000 Pkr</td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a data-bs-toggle="modal"
                                                                    data-bs-target="#student-edit-payment_modal" href="#"
                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                        class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"> <a href="#"
                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4567547765</td>
                                                    <td>RN-001</td>
                                                    <td>7/11/2022</td>
                                                    <td>Easypaisa</td>
                                                    <td>3000 Pkr</td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a data-bs-toggle="modal"
                                                                    data-bs-target="#student-edit-payment_modal" href="#"
                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                        class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"> <a href="#"
                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4567547765</td>
                                                    <td>RN-001</td>
                                                    <td>7/11/2022</td>
                                                    <td>Easypaisa</td>
                                                    <td>3000 Pkr</td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a data-bs-toggle="modal"
                                                                    data-bs-target="#student-edit-payment_modal" href="#"
                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                        class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"> <a href="#"
                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4567547765</td>
                                                    <td>RN-001</td>
                                                    <td>7/11/2022</td>
                                                    <td>Easypaisa</td>
                                                    <td>3000 Pkr</td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a data-bs-toggle="modal"
                                                                    data-bs-target="#student-edit-payment_modal"
                                                                    href="#"
                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                        class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"> <a href="#"
                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4567547765</td>
                                                    <td>RN-001</td>
                                                    <td>7/11/2022</td>
                                                    <td>Easypaisa</td>
                                                    <td>3000 Pkr</td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a
                                                                    href="{{ route('payment.edit') }}"
                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                        class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"> <a href="#"
                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4567547765</td>
                                                    <td>RN-001</td>
                                                    <td>7/11/2022</td>
                                                    <td>Easypaisa</td>
                                                    <td>3000 Pkr</td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a data-bs-toggle="modal"
                                                                    data-bs-target="#student-edit-payment_modal"
                                                                    href="#"
                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                        class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"> <a href="#"
                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4567547765</td>
                                                    <td>RN-001</td>
                                                    <td>7/11/2022</td>
                                                    <td>Easypaisa</td>
                                                    <td>3000 Pkr</td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a data-bs-toggle="modal"
                                                                    data-bs-target="#student-edit-payment_modal"
                                                                    href="#"
                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                        class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"> <a href="#"
                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4567547765</td>
                                                    <td>RN-001</td>
                                                    <td>7/11/2022</td>
                                                    <td>Easypaisa</td>
                                                    <td>3000 Pkr</td>
                                                    <td class="text-end">
                                                        <ul class="list-inline mb-0">
                                                            <li class="list-inline-item"><a data-bs-toggle="modal"
                                                                    data-bs-target="#student-edit-payment_modal"
                                                                    href="#"
                                                                    class="avtar avtar-xs btn-link-secondary"><i
                                                                        class="ti ti-edit f-20"></i></a></li>
                                                            <li class="list-inline-item"> <a href="#"
                                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                                        class="ti ti-trash f-20"></i></a></li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
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

    <!-- [ Main Content ] end -->

    {{--student edit fees model  --}}

    <div class="modal fade" id="student-edit-payment_modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h4 class="mb-0">Edit Payment</h4>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">INVOICE ID : </label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="text-muted d-block">8943769870</span>
                                    </div>
                                </div>

                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Payment
                                        Method : <small class="text-muted d-block">Enter
                                            your Payment Method</small></label>
                                    <div class="col-lg-8">
                                        <select class="form-select" id="exampleFormControlSelect1">
                                            <option>Please Select</option>
                                            <option>cheque</option>
                                            <option>cash</option>
                                            <option>credit card</option>
                                            <option>online transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label"> Amount
                                        :<small class="text-muted d-block">Enter
                                            Amount</small></label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Payment
                                        Date:<small class="text-muted d-block">Enter the
                                            Payment Date</small></label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label"> Refrence No
                                        :<small class="text-muted d-block">Enter
                                            Refrence No</small></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Notes
                                        :<small class="text-muted d-block">Enter
                                            Notes</small></label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" rows="2" placeholder="Enter address"></textarea>
                                    </div>
                                </div>
                                <div class="text-end btn-page mb-0 mt-4 me-0">
                                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal"
                                        data-bs-toggle="tooltip">Cancel</button>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module">
        import {
            DataTable
        } from '../assets/js/plugins/module.js';
        window.dt = new DataTable('#pc-dt-simple-1');
        window.dt = new DataTable('#pc-dt-simple-2');
        window.dt = new DataTable('#pc-dt-simple-3');
        window.dt = new DataTable('#pc-dt-simple-4');
    </script>
    
@endsection
