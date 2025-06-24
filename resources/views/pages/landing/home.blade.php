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
                                    <h3 class="text-center mb-3">Welcome to the School</h3>
                                    <p class="mb-4">Login or Sign Up</p>
                                    <div class="d-grid my-3">
                                        <a href="{{ route('login') }}"
                                            class="btn mt-2 btn-light-primary bg-light text-muted"><span> Login</span></a>
                                        <a href="{{ route('register') }}"
                                            class="btn mt-2 btn-light-primary bg-light text-muted"><span> Sign Up</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="auth-footer">
                    <p class="m-0 w-100 text-center">By signing up, you confirm to have read School Management System <a
                            href="#">Privacy Policy</a> and agree to the
                        <a href="#">Terms of Service</a>.
                    </p>
                </div>
            </div>
            <div class="auth-sidecontent justify-content-center align-items-center">
                <div class="p-3 px-lg-5 text-center d-flex">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active d-flex flex-column align-items-center">
                                <img src="../assets/images/user/saqib.jpg" alt="user-image"
                                    class="user-avtar wid-100 rounded-circle mb-3" />
                                <h2 class="text-white mb-0">Saqib Din</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
