@extends('layouts.master')

@section('content')
<div class="auth-main">
    <div class="auth-wrapper v1">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <h4 class="text-center f-w-500 mb-3">Login with your email</h4>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="d-flex mt-1 justify-content-between align-items-center">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="remember_me" name="remember" />
                                <label class="form-check-label text-muted" for="remember_me">{{ __('Remember me') }}</label>
                            </div>
                            @if (Route::has('password.request'))
                                <h6 class="text-secondary f-w-400 mb-0">
                                    <a href="{{ route('password.request') }}"> Forgot Password? </a>
                                </h6>
                            @endif
                        </div>

                        <div class="d-grid mt-4">
                            <x-primary-button>
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                    
                    <div class="d-flex justify-content-between align-items-end mt-4">
                        <h6 class="f-w-500 mb-0">Don't have an Account?</h6>
                        <a href="{{ route('auth.register') }}" class="link-primary">Create Account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
