@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/thank-you.css') }}">
@endpush

@section('content')

    <section class="thank-you">
        <div class="emoji">💚</div>
        <h2>Запись подтверждена!</h2>
        <p>
            Спасибо! Мы ждём вас
            <strong>{{ $booking->date }}</strong>
            в <strong>{{ optional($booking->slot)->time ?? '' }}</strong>.
        </p>
        <p>
            Услуга: <strong>{{ $booking->service->name ?? '' }}</strong>
        </p>
        <a href="{{ route('home') }}" class="btn-home">Вернуться на главную</a>
    </section>

@endsection
