<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'categories' => \App\Models\Category::all(),
        ]);
    }
}
