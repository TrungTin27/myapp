<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Banner;

class CMSController extends Controller
{
    public function index()
    {
        $banners = Banner::where('is_active', 1)
            ->orderBy('sort_order')
            ->get();

        return view('cms.home', compact('banners'));
    }
}
