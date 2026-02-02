<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\breakfast_recipes;
use Illuminate\Http\Request;

class Breakfast_recipesController extends Controller
{
  public function index()
{
    $recipes = breakfast_recipes::all();

    return response()->json([
        'status' => true,
        'data' => $recipes
    ]);
}
}
