<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', 1)->get();

        return response()->json([
            'status' => true,
            'data' => $banners
        ]);
    }   
}



