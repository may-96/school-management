@extends('layouts.master')

@section('content')
    <div class="auth-main">
        <div class="auth-wrapper v3">
            <div class="auth-form">
                <div class="auth-header row">
                </div>
                <div class="card my-5">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="auth-1" role="tabpanel" aria-labelledby="auth-tab-1">
                                <div class="text-center">
                                    <h3 class="text-center mb-3">Welcome To<br>School Management System</h3>
                                    <div class="d-grid my-3">
                                        @auth
                                            <a href="{{ route('dashboard') }}"
                                                class="btn mt-2 btn-light-primary bg-light text-muted"><span>Go to
                                                    Dashboard</span></a>
                                        @else
                                            <a href="{{ route('login') }}"
                                                class="btn mt-2 btn-light-primary bg-light text-muted"><span>Login</span></a>
                                        @endauth

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="auth-footer">
                </div>
            </div>
            <div class="auth-sidecontent justify-content-center align-items-center">
                <div class="p-3 px-lg-5 text-center d-flex">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active d-flex flex-column align-items-center">
                                <img src="../assets/images/user/sms.png" alt="user-image"
                                    class="user-avtar wid-100 rounded-circle mb-3" />
                                {{-- <h2 class="text-white mb-0">Management System</h2> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
