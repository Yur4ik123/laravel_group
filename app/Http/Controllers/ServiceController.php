<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display the service page with available booking dates.
     * Finds a service by slug within a specific category and returns
     * the next 5 weekdays (excluding weekends) for booking.
     *
     * @param  string  $category_slug  The category slug
     * @param  string  $service_slug  The service slug
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function index(string $category_slug, string $service_slug): View
    {
        $category = Category::where('slug', $category_slug)
            ->firstOrFail();
        $service = Service::where('slug', $service_slug)
            ->where('category_id', $category->id)
            ->firstOrFail();

        $weekDays = collect();
        $date = Carbon::now();

        while ($weekDays->count() < 5) {
            $date->addDay();
            if (! $date->isWeekend()) {
                $weekDays->push($date->copy());
            }
        }

        return view('services.index', [
            'service' => $service,
            'category' => $category,
            'weekDays' => $weekDays,
        ]);

    }
}
