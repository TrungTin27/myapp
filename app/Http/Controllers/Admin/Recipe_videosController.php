<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\recipe_videos;
use Illuminate\Http\Request;

class Recipe_videosController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $recipe_videos = Recipe_videos::paginate(10);
        return view('admin.recipe_videos.index', compact('recipe_videos'));
    }

    // Form tạo mới
    public function create()
    {
        return view('recipe_videos.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        recipe_videos::create($request->all());
        return redirect()->route('recipe_videos.index');
    }

    // Hiển thị chi tiết
    public function show(recipe_videos $recipe_videos)
    {
        return view('recipe_videos.show', compact('recipe_videos'));
    }

    // Form chỉnh sửa
    public function edit(recipe_videos $recipe_videos)
    {
        return view('recipe_videos.edit', compact('recipe_videos'));
    }

    // Update sản phẩm
    public function update(Request $request, recipe_videos $recipe_videos)
    {
        $recipe_videos->update($request->all());
        return redirect()->route('recipe_videos.index');
    }

    // Xoá sản phẩm
    public function destroy(recipe_videos $recipe_videos)
    {
        $recipe_videos->delete();
        return redirect()->route('recipe_videos.index');
    }
}
