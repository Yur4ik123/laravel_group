<?php

use App\Http\Controllers\BookingThankController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware(['auth'])->group(function () {

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
        Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

        Route::get('/bookings', [ProfileController::class, 'bookings'])->name('profile.bookings');

    });
    Route::get('/profile/bookings', [ProfileController::class, 'bookings'])->name('profile.bookings');
    Route::get('/thanks/{booking}', [BookingThankController::class, 'show'])->name('booking.thank-you');

    Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/{category_slug}/{service_slug}', [ServiceController::class, 'index'])->name('service.index');
});
require __DIR__.'/auth.php';
