<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // LIST + PAGINATION
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
                     ->paginate(5);

        return response()->json([
            'status' => true,
            'data' => $posts
        ]);
    }

    // SHOW
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $post
        ]);
    }

    // CREATE
    public function store(Request $request)
    {
        $post = Post::create([
            'title'        => $request->title,
            'slug'         => $request->slug,
            'thumbnail'    => $request->thumbnail,
            'content'      => $request->getContent(),
            'excerpt'      => $request->excerpt,
            'is_trending'  => $request->is_trending ?? 0,
            'status'       => $request->status ?? 1,
            'published_at' => $request->published_at,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Post created successfully',
            'data' => $post
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        $post->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Post updated successfully',
            'data' => $post
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found'
            ], 404);
        }

        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'Post deleted successfully'
        ]);
    }
}
