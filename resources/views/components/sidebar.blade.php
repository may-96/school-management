<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('school.dashboard') }}"><img src="../assets/images/user/avatar-1.jpg"
                                    alt="user" class="user-avtar wid-45 rounded-circle" /></a>
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            <h6 class="mb-0" data-i18n="Saqib Din">Saqib Din</h6>
                            <small data-i18n="Administrator">Administrator</small>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label data-i18n="Navigation">Navigation</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('school.dashboard') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-status-up"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Dashboard">Dashboard</span>
                        <span class="pc-badge">2</span>
                    </a>
                </li>


                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('teacher.index') }}" class="pc-link">
                        <span class="pc-micon">
                              <svg class="pc-icon">
                                <use xlink:href="#custom-user"></use>
                              </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Teachers">Teachers</span>
                        {{-- <span class="pc-badge">2</span> --}}
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('student.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-layer"></use>
                              </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Students">Students</span>
                        {{-- <span class="pc-badge">2</span> --}}
                    </a>
                </li>


                {{-- <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-layer"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="School">School</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item pc-hasmenu">
                            <a class="pc-link" href="#!">
                                <span data-i18n="Teacher">Teacher</span>
                                <span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{ route('teacher.create') }}" data-i18n="Add">Add</a></li>
                                <li class="pc-item"><a class="pc-link" href="{{ route('teacher.index') }}" data-i18n="List">List</a></li>
                            </ul>
                        </li>
                        <li class="pc-item pc-hasmenu">
                            <a class="pc-link" href="#!">
                                <span data-i18n="Student">Student</span>
                                <span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                            <ul class="pc-submenu">
                                <li class="pc-item"><a class="pc-link" href="{{ route('student.create') }}" data-i18n="Add">Add</a>
                                </li>
                                <li class="pc-item"><a class="pc-link" href="{{ route('student.index') }}" data-i18n="List">list</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li> --}}
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-dollar-square"></use>
                              </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Student Fees">Student Fees</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('payment.dashboard') }}"
                                data-i18n="Finance">Finance</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('payment.create') }}"
                                data-i18n="Add Fees">Add
                                Fees</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('payment.edit') }}"
                                data-i18n="Edit Fees">Edit
                                Fees</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('payment.index') }}"
                                data-i18n="Fees Collection">Fees
                                Collection</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('payment.show') }}"
                                data-i18n="Fee Receipt">Fee
                                Receipt</a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('student.profile') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-user-square"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Profile">Profile</span><span class="pc-arrow"></span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label data-i18n="Admin Panel">Admin Panel</label>
                    <svg class="pc-icon">
                        <use xlink:href="#custom-layer"></use>
                    </svg>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('profile.user') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-user-square"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="User">User</span><span class="pc-arrow"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
