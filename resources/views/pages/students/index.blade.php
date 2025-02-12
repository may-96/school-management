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
                                <li class="breadcrumb-item" aria-current="page">Student List</li>
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
                                    <a href="{{ route('payment.create') }}" class="btn btn-outline-secondary me-2">Student
                                        Fees</a>
                                    <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div class="table-responsive">
                                <table class="table table-hover" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Admission NO</th>
                                            <th>Roll No</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th>Admission Date</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('student.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">saqib Din</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>12</td>
                                            <td>10th</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.create') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>

                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-2.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">umar</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD987244565</td>
                                            <td>23</td>
                                            <td>9th</td>
                                            <td>Blue</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-danger">Inactive</span></td>
                                            <td>2023/12/24</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('student.create') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>

                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-3.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Dilawar</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98723465</td>
                                            <td>34</td>
                                            <td>5th</td>
                                            <td>Yellow</td>
                                            <td>Female</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2022/09/19</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-4.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Zain</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98722365</td>
                                            <td>23</td>
                                            
                                            <td>6th</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2022/08/22</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-5.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Irfan</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365 </td>
                                            <td>56</td>
                                            
                                            <td>8th</td>
                                            <td>Blue</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-6.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Arshad</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365</td>
                                            <td>56</td>
                                           
                                            <td>9th</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/12/24</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr><td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="../assets/images/user/avatar-7.jpg" alt="user image"
                                                        class="img-radius wid-40" />
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Mubashir</h6>
                                                    <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                </div>
                                            </div>
                                        </td>
                                            <td>AD98724365</td>
                                            <td>78</td>
                                            
                                            <td>10th</td>
                                            <td>Blue</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2022/09/19</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr><td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <img src="../assets/images/user/avatar-8.jpg" alt="user image"
                                                        class="img-radius wid-40" />
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-0">Javed</h6>
                                                    <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                </div>
                                            </div>
                                        </td>
                                            <td>AD98724365</td>
                                            <td>66</td>
                                            
                                            <td>7th</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-danger">Inactive</span></td>
                                            <td>2022/08/22</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-9.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Khan</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365</td>
                                            <td>67</td>
                                           
                                            <td>4th</td>
                                            <td>Yellow</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-danger">Inactive</span></td>
                                            <td>2022/08/22</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-10.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Malang jan</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365n</td>
                                            <td>87</td>
                                            
                                            <td>8th</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-danger">Inactive</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-2.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Shahmer</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365</td>
                                            <td>34</td>
                                           
                                            <td>2nd</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-danger">Inactive</span></td>
                                            <td>2023/12/24</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-3.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Bilal</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365</td>
                                            <td>67</td>
                                            
                                            <td>10th</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-danger">Inactive</span></td>
                                            <td>2022/09/19</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-4.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Ahmed</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365</td>
                                            <td>67</td>
                                           
                                            <td>6th</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2022/08/22</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-5.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Jamal</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365</td>
                                            <td>78</td>
                                          
                                            <td>9th</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-6.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Banana khan</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365</td>
                                            <td>78</td>
                                            
                                            <td>3rd</td>
                                            <td>Green</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2023/12/24</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-7.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">muheeb</h6>
                                                        <small class="text-truncate w-100 text-muted">0316-8336096</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>AD98724365</td>
                                            <td>87</td>
                                            
                                            <td>4th</td>
                                            <td>Blue</td>
                                            <td>Male</td>
                                            <td><span class="badge bg-light-success">Active</span></td>
                                            <td>2022/09/19</td>
                                            <td>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="student-add.php" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-edit f-20"></i>
                                                </a>
                                                <a href="#" class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                                <button
                                                    class="btn btn-sm btn-light-secondary d-flex align-items-center gap-2 mt-1"
                                                    data-bs-toggle="modal" data-bs-target="#address-edit_add-modal"><i
                                                        class="ph-duotone ph-plus-circle"></i>Add Fees</button>
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

    {{-- fees modal --}}

    <div class="modal fade" id="address-edit_add-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h5 class="mb-0">G.H.S.S No 1 Abbottabad</h5>
                        {{-- <span class="badge bg-light-info mt-2 ">Unpaid</span> --}}
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"
                            data-bs-toggle="tooltip" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Invoice
                                        Id :<small class="text-muted d-block">Enter
                                            your Invoice Id</small></label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Fees
                                        Type : <small class="text-muted d-block">Enter
                                            your Fees Type</small></label>
                                    <div class="col-lg-8">
                                        <select class="form-select" id="exampleFormControlSelect1">
                                            <option>Please Select</option>
                                            <option>Tuition Fees</option>
                                            <option>Admission Fees</option>
                                            <option>Subjects Fees</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Payment
                                        Type : <small class="text-muted d-block">Enter
                                            your Payment Type</small></label>
                                    <div class="col-lg-8">
                                        <select class="form-select" id="exampleFormControlSelect1">
                                            <option>Please Select</option>
                                            <option>cheque</option>
                                            <option>cash</option>
                                            <option>credit card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Amount
                                        :<small class="text-muted d-block">Enter
                                            Amount</small></label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Due
                                        Date:<small class="text-muted d-block">Enter the
                                            due date</small></label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" />
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
        window.dt = new DataTable('#pc-dt-simple');
    </script>
@endsection
