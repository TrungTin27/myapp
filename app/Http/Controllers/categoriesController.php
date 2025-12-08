<?php

namespace App\Http\Controllers;

use App\Models\categories;
use Illuminate\Http\Request;

class categoriesController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $categories = categories::all();
        return view('categories.index', compact('categories'));
    }

    // Form tạo mới
    public function create()
    {
        return view('categories.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        categories::create($request->all());
        return redirect()->route('categories.index');
    }

    // Hiển thị chi tiết
    public function show(categories $categories)
    {
        return view('categories.show', compact('categories'));
    }

    // Form chỉnh sửa
    public function edit(categories $categories)
    {
        return view('categories.edit', compact('categories'));
    }

    // Update sản phẩm
    public function update(Request $request, categories $categories)
    {
        $categories->update($request->all());
        return redirect()->route('categories.index');
    }

    // Xoá sản phẩm
    public function destroy(categories $categories)
    {
        $categories->delete();
        return redirect()->route('categories.index');
    }
}
