<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Category;
class ServiceController extends Controller
{
    /**
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function index(string $category_slug, string $service_slug)
    {
        $category = Category::where('slug', $category_slug)
            ->firstOrFail();
        $service = Service::where('slug', $service_slug)
            ->where('category_id', $category->id)
            ->firstOrFail();
         return view('services.index', [
            'service' => $service,
             'category' => $category,
        ]);

    }
}
