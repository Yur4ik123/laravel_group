<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\SlotController;

Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/slots', [SlotController::class, 'getSlots']);

