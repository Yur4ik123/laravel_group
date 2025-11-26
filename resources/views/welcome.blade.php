@extends('layouts.app')
@section('content')

    <h1>
        Welcome page
    </h1>

    @auth
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle"></i>
        </button>
        <ul class="dropdown-menu" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="#">Кабинет</a></li>
            <li><a class="dropdown-item" href="#">Мои заказы</a></li>
            <li><a class="dropdown-item" href="#">Выйти</a></li>
        </ul>
    </div>
    @else
    <div class="d-flex gap-2">
        <a href="{{route('login')}}" class="btn btn-primary" >
            <i class="bi bi-box-arrow-in-right"></i> Войти
        </a>
        <a href="{{route('register')}}" class="btn btn-outline-primary" >
            <i class="bi bi-person-plus"></i> Регистрация
        </a>
    </div>
    @endauth


@endsection
