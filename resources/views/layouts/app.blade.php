<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="/css/main_styles.css">
    @stack('styles')
</head>
<body>
<header>
    <div class="logo">
        <h1><a href="{{ route('home') }}">OKSANA KHORIEVA</a></h1>
    </div>

    <button class="burger-btn" id="burgerBtn" aria-label="Toggle menu">
        <span class="burger-line"></span>
        <span class="burger-line"></span>
        <span class="burger-line"></span>
    </button>

    <nav class="nav" id="navMenu">
        <ul>
            <li class="menu"><a href="{{ LaravelLocalization::localizeUrl('/') }}#home">{{ __('navigation.home') }}</a></li>
            <li class="menu"><a href="{{ LaravelLocalization::localizeUrl('/') }}#about">{{ __('navigation.about') }}</a></li>
            <li class="menu"><a href="{{ LaravelLocalization::localizeUrl('/') }}#services">{{ __('navigation.services') }}</a></li>
            <li class="menu dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ strtoupper(app()->getLocale()) }}
                </a>
                <ul class="dropdown-menu shadow-lg border-0 rounded-lg py-2 !min-w-fit">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        @if(app()->getLocale() != $localeCode)
                        <li class="m-0">
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                               class="!w-fit dropdown-item px-4 py-2 hover:bg-gray-100 transition-colors">
                                {{ strtoupper($localeCode) }}
                            </a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </li>

            <li class="menu">
                @auth
                    <a href="{{ route('profile.edit') }}">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <i class="bi bi-person-circle"></i> {{ __('auth.log_in') }}
                    </a>
                @endauth
            </li>

        </ul>
    </nav>
    <div class="overlay" id="overlay"></div>
</header>

<div class="content"></div>
@yield('content')
@stack('scripts')
</body>
</html>
