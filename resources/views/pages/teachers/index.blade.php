@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('teacher.index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">School</a></li>
                                <li class="breadcrumb-item" aria-current="page">Teacher List</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Teacher List</h2>
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
                                <h5 class="mb-3 mb-sm-0">Teacher list</h5>
                                <div>
                                    <a href="{{ route('teacher.create') }}" class="btn btn-primary">Add Teacher</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div class="table-responsive">
                                <table class="table table-hover" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Departments / Class</th>
                                            <th>Education</th>
                                            <th>Mobile</th>
                                            <th>Joining Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="{{ route('teacher.profile') }}">
                                                            <img src="../assets/images/user/avatar-1.jpg" alt="user image"
                                                                class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Airi Satou</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.COM., M.COM.</td>
                                            <td>0316 8336096</td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.edit') }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-2.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Ashton Cox</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.COM., M.COM.</td>
                                            <td>0316 8336096</td>
                                            <td>2023/12/24</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-3.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Bradley Greer</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.A, B.C.A</td>
                                            <td>0316 8336096</td>
                                            <td>2022/09/19</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-4.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Brielle Williamson</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.A, B.C.A</td>
                                            <td>0316 8336096</td>
                                            <td>2022/08/22</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-5.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Airi Satou</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.COM., M.COM.</td>
                                            <td>0316 8336096</td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-6.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Ashton Cox</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.COM., M.COM.</td>
                                            <td>0316 8336096</td>
                                            <td>2023/12/24</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-7.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Bradley Greer</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.A, B.C.A</td>
                                            <td>0316 8336096</td>
                                            <td>2022/09/19</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-8.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Brielle Williamson</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.A, B.C.A</td>
                                            <td>0316 8336096</td>
                                            <td>2022/08/22</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-9.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Brielle Williamson</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.A, B.C.A</td>
                                            <td>0316 8336096</td>
                                            <td>2022/08/22</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-10.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Airi Satou</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.COM., M.COM.</td>
                                            <td>0316 8336096</td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-2.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Ashton Cox</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.COM., M.COM.</td>
                                            <td>0316 8336096</td>
                                            <td>2023/12/24</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-3.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Bradley Greer</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.A, B.C.A</td>
                                            <td>0316 8336096</td>
                                            <td>2022/09/19</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-4.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Brielle Williamson</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.A, B.C.A</td>
                                            <td>0316 8336096</td>
                                            <td>2022/08/22</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-5.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Airi Satou</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.COM., M.COM.</td>
                                            <td>0316 8336096</td>
                                            <td>2023/09/12</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-6.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Ashton Cox</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.COM., M.COM.</td>
                                            <td>0316 8336096</td>
                                            <td>2023/12/24</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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
                                                    <div class="flex-shrink-0">
                                                        <img src="../assets/images/user/avatar-7.jpg" alt="user image"
                                                            class="img-radius wid-40" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-0">Bradley Greer</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">din.97legend@gmail.com</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Developer</h6>
                                                    <small class="text-truncate w-100 text-muted">10th</small>
                                                </div>
                                            </td>
                                            <td>B.A, B.C.A</td>
                                            <td>0316 8336096</td>
                                            <td>2022/09/19</td>
                                            <td>
                                                <a href="{{ route('teacher.profile') }}"
                                                    class="avtar avtar-xs btn-link-secondary">
                                                    <i class="ti ti-eye f-20"></i>
                                                </a>
                                                <a href="{{ route('teacher.create', ['mode' => 'edit']) }}"
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

    <script type="module">
        import {
            DataTable
        } from '../assets/js/plugins/module.js';
        window.dt = new DataTable('#pc-dt-simple');
    </script>

@endsection
