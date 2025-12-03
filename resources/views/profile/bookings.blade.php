@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Мои бронирования</h2>

        <p>Пока бронирований нет.</p>

        <a href="{{ route('profile.edit') }}">Назад в профиль</a>
    </div>
@endsection
