@extends('layouts.master')

@section('content')
<div class="auth-main">
    <div class="auth-wrapper v1">
        <div class="auth-form">
            <div class="card my-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-end mb-4">
                        <h3 class="mb-0"><b>Forgot Password</b></h3>
                        <a href="{{ route('auth.login') }}" class="link-primary">Back to Login</a>
                    </div>
                    <div class="mb-4 text-sm text-muted">
                        {{ __('Forgot your password? No problem. Just enter your email address and we will email you a password reset link.') }}
                    </div>
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email Address" value="{{ old('email') }}" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <p class="mt-4 text-sm text-muted">Do not forget to check the SPAM box.</p>
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary">Send Password Reset Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection