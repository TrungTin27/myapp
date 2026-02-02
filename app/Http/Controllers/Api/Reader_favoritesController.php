<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\reader_favorites;
use Illuminate\Http\Request;

class Reader_favoritesController extends Controller
{
          public function index()
{
    $reader_favorites = reader_favorites::all();

    return response()->json([
        'status' => true,
        'data' => $reader_favorites
    ]);
}
}
