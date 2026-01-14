<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class HomeController extends Controller
{
    public function index()
    {
        $banner = Banner::latest()->first(); // banner mới nhất

       return view('index', compact('banner'));

    }
}
