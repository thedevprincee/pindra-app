@extends('layouts.auth_layout')

@section('pageTitle')
    Login
@endsection

@section('content')
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Login</h2>
    </div>
    <form method="POST" action="{{ route('store-login') }}">
        @csrf
        <div class="input-group custom">
            <input
                type="text"
                placeholder="Email"
                name="email"
                class="form-control form-control-lg @error('email') is-invalid @enderror"  value="{{ old('email') }}" required autocomplete="email" autofocus
            />
            <div class="input-group-append custom">
                <span class="input-group-text"
                    ><i class="icon-copy dw dw-user1"></i
                ></span>
            </div>
        </div>
        @error('email')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
        
        <div class="input-group custom">
            <input
                type="password"
                class="form-control form-control-lg @error('password') is-invalid @enderror"
                placeholder="Password"
                name="password"
                value="{{ @old('password') }}"
                id="password" name="password" required autocomplete="current-password" />
            

            <div class="input-group-append custom">
                <span class="input-group-text"
                    ><i class="dw dw-padlock1"></i
                ></span>
            </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <div class="row pb-30">
            <div class="col-6">
                <div class="custom-control custom-checkbox">
                    <input
                        type="checkbox"
                        class="custom-control-input"
                        name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}
                    />
                    <label class="custom-control-label" for="customCheck1"
                        > {{ __('Remember Me') }}</label
                    >
                </div>
            </div>
            <div class="col-6">
                
                <div class="forgot-password">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>        
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group mb-0">
                    <!--
                    use code for form submit
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In">
                -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block" > {{ __('Login') }}</button>
                </div>
                <div
                    class="font-16 weight-600 pt-10 pb-10 text-center"
                    data-color="#707373"
                >
                    OR
                </div>
                <div class="input-group mb-0">
                    <a
                        class="btn btn-outline-primary btn-lg btn-block"
                        href="/register"
                        >Register To Create Account</a
                    >
                </div>
            </div>
        </div>
    </form>
</div>

@endsection