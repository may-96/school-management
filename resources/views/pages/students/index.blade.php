@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student.index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">School</a></li>
                                <li class="breadcrumb-item" aria-current="page">Student</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Student List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5 class="mb-3 mb-sm-0">Student list</h5>
                                <div>
                                    <button class="btn btn-outline-secondary align-items-center me-2" data-bs-toggle="modal"
                                        data-bs-target="#student-add-payment_modal" id="idBtnSub"
                                        style="visibility: hidden;"><i class="ph-duotone ph-plus-circle me-1"></i>Create Fee
                                        Voucher</button>
                                    <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div class="table-responsive">
                                <table class="table table-hover" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Name / Roll No</th>
                                            <th>Admission NO</th>
                                            <th>Class / Section</th>
                                            <th>Parents</th>
                                            <th>Status</th>
                                            <th>Admission Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Saqib Din</h6>
                                                        <small class="text-truncate w-100 text-muted">12</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">10th</h6>
                                                        <small class="text-truncate w-100 text-muted">Green</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Muhammad Khan</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-2.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Umar Ilyas</h6>
                                                        <small class="text-truncate w-100 text-muted">16</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">10th</h6>
                                                        <small class="text-truncate w-100 text-muted">Blue</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Muhammad Ilyas</h6>
                                                        <small class="text-truncate w-100 text-muted">0340-1902251</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-4.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-danger">Inactive</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-5.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-danger">Inactive</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-6.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-7.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-8.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                        <input onChange="toggleButton();"
                                                            class="form-check-input checkboxes" type="checkbox" />
                                                        <i
                                                            class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                        <i
                                                            class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Artisan UI</h6>
                                                        <small class="text-truncate w-100 text-muted">45</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">8th</h6>
                                                        <small class="text-truncate w-100 text-muted">Yellow</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">Jackie Shen</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('student.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.edit') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#"
                                                    class="avtar avtar-xs btn-link-secondary bs-pass-para"><i
                                                        class="ti ti-trash f-20"></i></a>
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

    {{-- student add payemnt modal --}}

    <div class="modal fade" id="student-add-payment_modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h5 class="mb-0">Add Payment</h5>
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
                                        <input type="number" class="form-control" value="5000.00" />
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
                                        <input type="text" class="form-control" value="827365287" />
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

    {{-- student list table data  --}}

    <script type="module">
        import {
            DataTable
        } from '../assets/js/plugins/module.js';
        window.dt = new DataTable('#pc-dt-simple');
    </script>

    {{-- check student show visible button  --}}
    <script>
        function toggleButton() {
            let checkboxes = document.querySelectorAll(".checkboxes");
            let button = document.getElementById("idBtnSub");

            let anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

            button.style.visibility = anyChecked ? "visible" : "hidden";
        }
    </script>
@endsection
