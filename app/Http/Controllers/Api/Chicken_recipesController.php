<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\chicken_recipes;
use Illuminate\Http\Request;

class Chicken_recipesController extends Controller
{
  public function index()
{
    $recipes = chicken_recipes::all();

    return response()->json([
        'status' => true,
        'data' => $recipes
    ]);
}

}
