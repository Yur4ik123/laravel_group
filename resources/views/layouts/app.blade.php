<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->

    <!-- Scripts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
<header>
    <div class="logo">
        <h1>
            <a href="{{route('home')}}">OKSANA KHORIEVA</a>
        </h1>
    </div>
    <button class="burger-btn" id="burgerBtn" aria-label="Toggle menu">
        <span class="burger-line"></span>
        <span class="burger-line"></span>
        <span class="burger-line"></span>
    </button>

    <nav class="nav" id="navMenu">
        <ul>
            <li class="menu"><a href="#home">Home</a></li>
            <li class="menu"><a href="#about">About</a></li>
            <li class="menu"><a href="#services">Services</a></li>
            <li class="menu"><a href="#contacts">Contacts</a></li>
            <li class="menu">
                @auth
                    <a href="{{route('dashboard')}}" class="">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name  }}
                    </a>
                @else
                    <a href="{{route('login')}}" class="">
                        <i class="bi bi-person-circle"></i> Войти
                    </a>
                @endauth
            </li>
        </ul>
    </nav>
    <div class="overlay" id="overlay"></div>
</header>
<div class="content"></div>
@yield('content')
</body>
</html>
