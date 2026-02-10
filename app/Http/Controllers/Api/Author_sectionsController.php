<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\author_sections;
use Illuminate\Http\Request;

class Author_sectionsController extends Controller
{
    // LIST + PAGINATION
    public function index()
    {
        $authors = author_sections::orderBy('created_at', 'desc')
                                 ->paginate(5);

        return response()->json([
            'status' => true,
            'data' => $authors
        ]);
    }

    // SHOW
    public function show($id)
    {
        $author = author_sections::find($id);

        if (!$author) {
            return response()->json([
                'status' => false,
                'message' => 'Author section not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $author
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $author = author_sections::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Author section created successfully',
            'data' => $author
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $author = author_sections::find($id);

        if (!$author) {
            return response()->json([
                'status' => false,
                'message' => 'Author section not found'
            ], 404);
        }

        $author->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Author section updated successfully',
            'data' => $author
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $author = author_sections::find($id);

        if (!$author) {
            return response()->json([
                'status' => false,
                'message' => 'Author section not found'
            ], 404);
        }

        $author->delete();

        return response()->json([
            'status' => true,
            'message' => 'Author section deleted successfully'
        ]);
    }
}
