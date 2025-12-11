@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/thank-you.css') }}">
@endpush

@section('content')

    <section class="thank-you">
        <div class="emoji">💚</div>
        <h2>{{ __('booking.confirmed') }}</h2>
        <p>
            {{ __('booking.thank_you') }}
            <strong>{{ $booking->date->format('d.m.Y') }}</strong>
            {{ __('booking.at') }} <strong>{{ optional($booking->slot)->slot ?? '' }}</strong>.
        </p>
        <p>
            {{ __('booking.service') }}: <strong>{{ $booking->service->name ?? '' }}</strong>
        </p>
        <a href="{{ route('home') }}" class="btn-home">{{ __('booking.back_home') }}</a>
    </section>

@endsection
