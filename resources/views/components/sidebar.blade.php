<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('dashboard') }}">
                                @if (Auth::user()->profile_photo_path)
                                    <img src="{{ Auth::user()->profile_photo_path ? asset('storage/' . Auth::user()->profile_photo_path) : asset('assets/images/user/default.jpg') }}"
                                        alt="user" class="user-avtar rounded-circle"
                                        style="width: 50px; height: 50px;" />
                                @else
                                    <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user"
                                        class="user-avtar rounded-circle" style="width: 50px; height: 50px;" />
                                @endif
                            </a>
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            <h6 class="mb-0">
                                {{ Auth::user()->name ?? (Auth::user()->first_name . ' ' . Auth::user()->last_name ?? 'No name') }}
                            </h6>

                            <small data-i18n="{{ Auth::user()->role }}">
                                {{ ucfirst(Auth::user()->role) }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label data-i18n="Navigation">Navigation</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('dashboard') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-status-up"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Dashboard">Dashboard</span>
                        {{-- @php
                            $totalAll =
                                ($totalTeachers ?? 0) + ($totalStudents ?? 0) + ($totalPaid ?? 0);
                            $displayTotal = $totalAll >= 99 ? '99+' : $totalAll;
                        @endphp
                        <span class="pc-badge">{{ $displayTotal }}</span> --}}
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
                    <a href="{{ route('payment.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-dollar-square"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Payments">Payments</span><span class="pc-arrow"></span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="{{ route('voucher.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-keyboard"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext" data-i18n="Vouchers">Vouchers</span><span class="pc-arrow"></span>
                    </a>
                </li>
                @auth
                    @if (auth()->user()->role == 'admin')
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
                        <li class="pc-item pc-hasmenu">
                            <a href="{{ route('appsetting') }}" class="pc-link">
                                <span class="pc-micon">
                                    <svg class="pc-icon">
                                        <use xlink:href="#custom-setting-2"></use>
                                    </svg>
                                </span>
                                <span class="pc-mtext" data-i18n="Application">App Settings</span><span
                                    class="pc-arrow"></span>
                            </a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>
