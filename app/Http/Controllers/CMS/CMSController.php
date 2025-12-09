<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

class CMSController extends Controller
{
    public function index()
    {
        return view('cms.index');
    }
}

