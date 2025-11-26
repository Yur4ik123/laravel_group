@extends('layouts.app')
@section('content')
    <div class="login__wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card login-card">
                        <div class="card-body">
                            <h3 class="login-title text-center">
                                <i class="bi bi-shield-lock"></i>
                                {{ __('auth.log_in') }}
                            </h3>

                            <!-- Session Status -->
                            @if (session('status'))
                                <div class="alert alert-custom" role="alert">
                                    <i class="bi bi-check-circle me-2"></i>
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('login') }}" class="!w-full">
                                @csrf

                                <!-- Email Address -->
                                <div class="input-group-custom">
                                    <label for="email" class="form-label">{{ __('auth.email') }}</label>
                                    <i class="bi bi-envelope input-icon"></i>
                                    <input id="email"
                                           type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}"
                                           placeholder="your@email.com"
                                           required
                                           autofocus
                                           autocomplete="username">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="input-group-custom">
                                    <label for="password" class="form-label">{{ __('auth.password') }}</label>
                                    <i class="bi bi-lock input-icon"></i>
                                    <input id="password"
                                           type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password"
                                           placeholder="••••••••"
                                           required
                                           autocomplete="current-password">
                                    @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Remember Me -->
                                <div class="form-check form-check-custom">
                                    <input type="checkbox"
                                           class="form-check-input"
                                           id="remember_me"
                                           name="remember">
                                    <label class="form-check-label" for="remember_me">
                                        {{ __('auth.remember_me') }}
                                    </label>
                                </div>

                                <div class="login-footer">
                                    <button type="submit" class="btn btn-primary btn-login w-100">
                                        {{ __('auth.log_in') }}
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </button>

                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        @if (Route::has('password.request'))
                                            <a class="forgot-password" href="{{ route('password.request') }}">
                                                <i class="bi bi-question-circle me-1"></i>
                                                {{ __('auth.forgot_password') }}
                                            </a>
                                        @endif

                                        @if (Route::has('register'))
                                            <a class="register-link" href="{{ route('register') }}">
                                                <i class="bi bi-person-plus me-1"></i>
                                                {{ __('auth.register') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
