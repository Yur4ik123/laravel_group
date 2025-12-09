@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>{{ __('profile.my_bookings') }}</h2>

        @if($bookings->count())
            <div class="bookings-list mt-4">
                @foreach($bookings as $booking)
                    <div class="booking-card p-3 mb-3 border rounded">
                        <p><b>{{ __('booking.service') }}:</b> {{ $booking->service->name ?? '-' }}</p>
                        <p><b>{{ __('booking.date') }}:</b> {{ $booking->date->format('d.m.Y') }}</p>
                        <p><b>{{ __('booking.price') }}:</b> {{ $booking->total_price }}</p>
                        <p><b>{{ __('booking.status') }}:</b> {{ $booking->status->name ?? '-' }}</p>
                        <p><b>{{ __('booking.phone') }}:</b> {{ $booking->phone }}</p>
                        <p><b>{{ __('booking.email') }}:</b> {{ $booking->email }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-3">{{ __('booking.empty') }}</p>
        @endif

        <a href="{{ route('profile.edit') }}" class="btn btn-secondary mt-3">
            {{ __('profile.back_to_profile') }}
        </a>
    </div>
@endsection
