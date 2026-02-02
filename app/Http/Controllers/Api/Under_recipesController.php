<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\under_recipes;
use Illuminate\Http\Request;

class Under_recipesController extends Controller
{
    public function index()
{
    $recipes = under_recipes::all();

    return response()->json([
        'status' => true,
        'data' => $recipes
    ]);
}
}
