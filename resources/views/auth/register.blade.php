@extends('layouts.app')
@section('content')
    <div class="register__wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card register-card">
                        <div class="card-body">
                            <h3 class="register-title text-center">
                                <i class="bi bi-person-plus"></i>
                                {{ __('auth.register') }}
                            </h3>
                            <form method="POST" action="{{ route('register') }}" class="!w-full">
                                @csrf
                                <div class="row">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <div class="input-group-custom">
                                            <label for="name" class="form-label">{{ __('auth.name') }}</label>
                                            <i class="bi bi-person input-icon"></i>
                                            <input id="name"
                                                   type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   name="name"
                                                   value="{{ old('name') }}"
                                                   placeholder="John"
                                                   required
                                                   autofocus
                                                   autocomplete="name">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Surname -->
                                    <div class="col-md-6">
                                        <div class="input-group-custom">
                                            <label for="surname" class="form-label">{{ __('auth.surname') }}</label>
                                            <i class="bi bi-person input-icon"></i>
                                            <input id="surname"
                                                   type="text"
                                                   class="form-control @error('surname') is-invalid @enderror"
                                                   name="surname"
                                                   value="{{ old('surname') }}"
                                                   placeholder="Doe"
                                                   required
                                                   autocomplete="family-name">
                                            @error('surname')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

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
                                           autocomplete="username">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="input-group-custom">
                                    <label for="phone" class="form-label">{{ __('auth.phone') }}</label>
                                    <i class="bi bi-telephone input-icon"></i>
                                    <input id="phone"
                                           type="tel"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           name="phone"
                                           value="{{ old('phone') }}"
                                           placeholder="+38 (___) ___-__-__"
                                           required
                                           autocomplete="tel">
                                    @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <!-- Password -->
                                    <div class="col-md-6">
                                        <div class="input-group-custom">
                                            <label for="password" class="form-label">{{ __('auth.password') }}</label>
                                            <i class="bi bi-lock input-icon"></i>
                                            <input id="password"
                                                   type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"
                                                   placeholder="••••••••"
                                                   required
                                                   autocomplete="new-password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="col-md-6">
                                        <div class="input-group-custom">
                                            <label for="password_confirmation" class="form-label">{{ __('auth.confirm_password') }}</label>
                                            <i class="bi bi-lock-fill input-icon"></i>
                                            <input id="password_confirmation"
                                                   type="password"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                                   name="password_confirmation"
                                                   placeholder="••••••••"
                                                   required
                                                   autocomplete="new-password">
                                            @error('password_confirmation')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="register-footer">
                                    <button type="submit" class="btn btn-primary btn-register w-100">
                                        {{ __('auth.register') }}
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </button>

                                    <div class="text-center mt-3">
                                        <a class="already-registered" href="{{ route('login') }}">
                                            <i class="bi bi-box-arrow-in-right me-1"></i>
                                            {{ __('auth.already_registered') }}
                                        </a>
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
