<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Админка — @yield('title', 'Панель')</title>

    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
<header style="background:#333; color:#fff; padding:15px;">
    <h2>Админ-панель</h2>
    <nav>
        <a href="{{ route('admin.statuses.index') }}" style="color:white; margin-right:20px;">Статусы</a>
        <a href="{{ route('dashboard') }}" style="color:white;">На сайт</a>
    </nav>
</header>

<main style="padding:20px;">
    @yield('content')
</main>
</body>
</html>
