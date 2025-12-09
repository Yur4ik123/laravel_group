<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Models\Booking;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class BookingController extends Controller
{
    /**
     * Store a newly created booking from AJAX request
     */
    public function store(StoreBookingRequest $request): JsonResponse
    {


        $data = $request->validated();

        // get user_id from email
        if (empty($data['user_id']) && !empty($data['email'])) {
            $user = User::where('email', $data['email'])->first();
            $data['user_id'] = $user?->id;
        }

        // get service price
        $service = Service::findOrFail($data['service_id']);
        if (empty($service)) {
            return response()->json([
                'success' => false,
                'message' => 'Отсутствует данная услуга'
            ]);
        }
        $data['total_price'] = $service->price;


        //set default status
        if (empty($data['status_id'])) {
            $data['status_id'] = 1;
        }

        $booking = Booking::create($data);

        return response()->json([
            'success'      => true,
            'message'      => 'Бронирование успешно создано',
            'data'         => $booking->load(['user', 'service', 'slot', 'status']),
            'redirect_url' => route('booking.thank-you', ['booking' => $booking->id]),
        ], 201);
    }
}
