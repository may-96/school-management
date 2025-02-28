<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('school.dashboard') }}"><img src="../assets/images/user/saqib.jpg" 
                                    alt="user" class="user-avtar wid-50 rounded-circle" />
                                </a>
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
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('student.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-user-add"></use>
                              </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Students">Students</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('payment.list') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-dollar-square"></use>
                              </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Payments">Payments</span><span class="pc-arrow"></span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('payment.voucher') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-keyboard"></use>
                              </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Vouchers">Vouchers</span><span class="pc-arrow"></span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('admin.users') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-user-square"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Users">Users</span><span class="pc-arrow"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
