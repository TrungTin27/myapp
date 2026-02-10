<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\pasta_recipes;
use Illuminate\Http\Request;

class pasta_recipesController extends Controller
{
    // LIST + PAGINATION
    public function index()
    {
        $recipes = pasta_recipes::orderBy('created_at', 'desc')
                               ->paginate(5);

        return response()->json([
            'status' => true,
            'data' => $recipes
        ]);
    }

    // SHOW
    public function show($id)
    {
        $recipe = pasta_recipes::find($id);

        if (!$recipe) {
            return response()->json([
                'status' => false,
                'message' => 'Recipe not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $recipe
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $recipe = pasta_recipes::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Recipe created successfully',
            'data' => $recipe
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $recipe = pasta_recipes::find($id);

        if (!$recipe) {
            return response()->json([
                'status' => false,
                'message' => 'Recipe not found'
            ], 404);
        }

        $recipe->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Recipe updated successfully',
            'data' => $recipe
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $recipe = pasta_recipes::find($id);

        if (!$recipe) {
            return response()->json([
                'status' => false,
                'message' => 'Recipe not found'
            ], 404);
        }

        $recipe->delete();

        return response()->json([
            'status' => true,
            'message' => 'Recipe deleted successfully'
        ]);
    }
}
