<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\reader_favorites;
use Illuminate\Http\Request;

class Reader_favoritesController extends Controller
{
    // LIST + PAGINATION
    public function index()
    {
        $reader_favorites = reader_favorites::orderBy('created_at', 'desc')
                        ->paginate(5);

        return response()->json([
            'status' => true,
            'data' => $reader_favorites
        ]);
    }

    // SHOW
    public function show($id)
    {
        $reader_favorites = reader_favorites::find($id);

        if (!$reader_favorites) {
            return response()->json([
                'status' => false,
                'message' => 'Reader favorite not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $reader_favorites
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $reader_favorites = reader_favorites::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Reader favorite created successfully',
            'data' => $reader_favorites
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $reader_favorites = reader_favorites::find($id);

        if (!$reader_favorites) {
            return response()->json([
                'status' => false,
                'message' => 'Reader favorite not found'
            ], 404);
        }

        $reader_favorites->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Reader favorite updated successfully',
            'data' => $reader_favorites
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $reader_favorites = reader_favorites::find($id);

        if (!$reader_favorites) {
            return response()->json([
                'status' => false,
                'message' => 'Reader favorite not found'
            ], 404);
        }

        $reader_favorites->delete();

        return response()->json([
            'status' => true,
            'message' => 'Reader favorite deleted successfully'
        ]);
    }
}
