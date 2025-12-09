<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Slot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    /**
     * Retrieves available slots for a specific date and service.
     *
     * This method fetches all slots, checks their booking status for a provided
     * date and service, and maps them to include an availability indicator.
     *
     * @param  Request  $request  The HTTP request containing the 'date' and 'serviceId'.
     * @return JsonResponse A JSON response containing a list of slots with
     *                      their availability status.
     */
    public function getSlots(Request $request): JsonResponse
    {
        $date = $request->get('date');
        $serviceId = $request->get('serviceId');
        if (! $date) {
            return response()->json([]);
        }

        $slots = Slot::all()->map(function ($slot) use ($date, $serviceId) {
            $isBooked = Booking::where('slot_id', $slot->id)
                ->where('date', $date)
                ->where('service_id', $serviceId)
                ->exists();

            return [
                'id' => $slot->id,
                'slot' => $slot->slot,
                'available' => ! $isBooked,
            ];
        });

        return response()->json($slots);
    }
}
