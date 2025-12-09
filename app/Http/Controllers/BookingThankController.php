<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class BookingThankController extends Controller
{
    public function show(Booking $booking)
    {
        return view('booking.thank-you', ['booking' => $booking]);
    }
}
