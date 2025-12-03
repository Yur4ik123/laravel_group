@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Личный кабинет</h2>

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <label>Имя</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

            <label>Фамилия</label>
            <input type="text" name="surname" value="{{ old('surname', $user->surname) }}" required>

            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

            <label>Телефон</label>
            <input type="text" name="phone"
                   id="phone"
                   value="{{ old('phone', $user->phone) }}"
                   placeholder="+38 (0__) ___-__-__"
                   required>

            <button type="submit">Сохранить</button>
        </form>

        <hr>

        <a href="{{ route('profile.password') }}">Сменить пароль</a> |
        <a href="{{ route('profile.bookings') }}">Мои бронирования</a>
    </div>
@endsection
