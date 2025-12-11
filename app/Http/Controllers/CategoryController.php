<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::where('slug', $slug)
            ->with('services')
            ->firstOrFail();

        $services = $category->services;

        return view('show', compact('category', 'services'));
    }
}
