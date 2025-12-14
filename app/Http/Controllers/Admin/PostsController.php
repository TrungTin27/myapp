<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class postsController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $posts = posts::all();
        return view('posts.index', compact('posts'));
    }

    // Form tạo mới
    public function create()
    {
        return view('posts.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        posts::create($request->all());
        return redirect()->route('posts.index');
    }

    // Hiển thị chi tiết
    public function show(posts $posts)
    {
        return view('posts.show', compact('posts'));
    }

    // Form chỉnh sửa
    public function edit(posts $posts)
    {
        return view('posts.edit', compact('posts'));
    }

    // Update sản phẩm
    public function update(Request $request, posts $posts)
    {
        $posts->update($request->all());
        return redirect()->route('posts.index');
    }

    // Xoá sản phẩm
    public function destroy(posts $posts)
    {
        $posts->delete();
        return redirect()->route('posts.index');
    }
}