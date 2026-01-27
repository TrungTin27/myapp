<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post; // ✅ MODEL ĐÚNG
use App\Services\PostsService;
use App\Http\Requests\PostsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(public readonly PostsService $PostsService) {}

    // LIST
    public function index(Request $request)
    {
        $query = Post::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->when($request->filled('start_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->start_date);
            })
            ->when($request->filled('end_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->end_date);
            });

        $Posts = $query->latest()->paginate(10);
        return view('admin.Posts.index', compact('Posts'));
    }

    // CREATE
    public function create()
    {
        return view('admin.Posts.create');
    }

    // STORE
    public function store(PostsRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
        }

        $this->PostsService->store($data);

        flash('Thêm thành công')->success();
        return redirect()->route('posts.index');
    }

    // EDIT
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.Posts.edit', compact('post'));
    }

    // UPDATE
    public function update(PostsRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
        }

        $post->update($data);

        flash('Chỉnh sửa thành công')->success();
        return redirect()->route('posts.index');
    }

    // DELETE (AJAX)
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(['success' => true]); // ✅ AJAX CHUẨN
    }
}
