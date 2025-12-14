<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends AdminController
{
    // Hiển thị toàn bộ danh mục
    public function index()
    {
        $categories = Category::all();
        return view('admin.Category.index', compact('categories'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.Category.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string',
        ]);

        // Tự tạo slug
        $validated['slug'] = Str::slug($validated['name']);

        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Tạo danh mục thành công!');
    }

    // Hiển thị chi tiết
    public function show(Category $category)
    {
        return view('admin.Category.show', compact('category'));
    }

    // Form chỉnh sửa
    public function edit(Category $category)
    {
        return view('admin.Category.edit', compact('category'));
    }

    // Update danh mục
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $category->update($validated);

        return redirect()->route('category.index');
    }

    // Xoá danh mục
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }
}
