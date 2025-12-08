@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>My Bookings</h2>

        @if($bookings->count())
            <div class="bookings-list mt-4">
                @foreach($bookings as $booking)
                    <div class="booking-card p-3 mb-3 border rounded">
                        <p><b>Service:</b> {{ $booking->service->name ?? '-' }}</p>
                        <p><b>Date:</b> {{ $booking->date->format('d.m.Y') }}</p>
                        <p><b>Price:</b> {{ $booking->total_price }}</p>
                        <p><b>Status:</b> {{ $booking->status->name ?? '-' }}</p>
                        <p><b>Phone:</b> {{ $booking->phone }}</p>
                        <p><b>Email:</b> {{ $booking->email }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="mt-3">You have no bookings yet.</p>
        @endif

        <a href="{{ route('profile.edit') }}" class="btn btn-secondary mt-3">
            Back to profile
        </a>
    </div>
@endsection
