<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\how_tos;
use Illuminate\Http\Request;

class How_tosController extends Controller
{
    // LIST + PAGINATION
    public function index()
    {
        $how_tos = how_tos::orderBy('created_at', 'desc')
                       ->paginate(5);

        return response()->json([
            'status' => true,
            'data' => $how_tos
        ]);
    }

    // SHOW
    public function show($id)
    {
        $how_tos = how_tos::find($id);

        if (!$how_tos) {
            return response()->json([
                'status' => false,
                'message' => 'HowTo not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $how_tos
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $how_tos = how_tos::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'HowTo created successfully',
            'data' => $how_tos
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $how_tos = how_tos::find($id);

        if (!$how_tos) {
            return response()->json([
                'status' => false,
                'message' => 'HowTo not found'
            ], 404);
        }

        $how_tos->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'HowTo updated successfully',
            'data' => $how_tos
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $how_tos = how_tos::find($id);

        if (!$how_tos) {
            return response()->json([
                'status' => false,
                'message' => 'HowTo not found'
            ], 404);
        }

        $how_tos->delete();

        return response()->json([
            'status' => true,
            'message' => 'HowTo deleted successfully'
        ]);
    }
}
