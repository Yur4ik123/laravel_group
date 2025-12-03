@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Смена пароля</h2>

        <form method="POST" action="{{ route('profile.password.update') }}">
            @csrf
            @method('PATCH')

            <label>Текущий пароль</label>
            <input type="password" name="current_password" required>

            <label>Новый пароль</label>
            <input type="password" name="password" required>

            <label>Повтор нового пароля</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Сохранить</button>
        </form>

        <br>
        <a href="{{ route('profile.edit') }}">Назад в профиль</a>
    </div>
@endsection
