@extends('layouts.master')

@section('content')
<div class="auth-main">
    <div class="auth-wrapper v1">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <h4 class="text-center f-w-500 mb-3">Login with your email</h4>

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus />
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required />
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex mt-1 justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input input-primary" type="checkbox" id="remember_me" name="remember" />
                        <label class="form-check-label text-muted" for="remember_me">Remember me?</label>
                    </div>
                    <h6 class="text-secondary f-w-400 mb-0">
                        <a href="{{ route('auth.forget') }}"> Forgot Password? </a>
                    </h6>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
            <!-- End Login Form -->

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
