<?php

namespace App\Http\Controllers;

use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all(); // ĐỪNG where gì hết

        return view('Frontend.index', compact('banners'));
    }
}
