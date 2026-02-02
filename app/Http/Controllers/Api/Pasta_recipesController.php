<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\pasta_recipes;
use Illuminate\Http\Request;

class Pasta_recipesController extends Controller
{
      public function index()
{
    $recipes = pasta_recipes::all();

    return response()->json([
        'status' => true,
        'data' => $recipes
    ]);
}
}
    