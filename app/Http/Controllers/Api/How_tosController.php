<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\how_tos;
use Illuminate\Http\Request;

class How_tosController extends Controller
{
          public function index()
{
    $how_tos = how_tos::all();

    return response()->json([
        'status' => true,
        'data' => $how_tos
    ]);
}
}
