<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\recipe_sections;
use App\Models\Recipe_sections as ModelsRecipe_sections;
use Illuminate\Http\Request;

class recipe_sectionsController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $recipe_sections = Recipe_sections::paginate(10); // hoặc 5, 15

        return view('admin.recipe_sections.index', compact('recipe_sections'));
    }

    // Form tạo mới
    public function create()
    {
        return view('recipe_sections.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        recipe_sections::create($request->all());
        return redirect()->route('recipe_sections.index');
    }

    // Hiển thị chi tiết
    public function show(recipe_sections $recipe_sections)
    {
        return view('recipe_sections.show', compact('recipe_sections'));
    }

    // Form chỉnh sửa
    public function edit(recipe_sections $recipe_sections)
    {
        return view('recipe_sections.edit', compact('recipe_sections'));
    }

    // Update sản phẩm
    public function update(Request $request, recipe_sections $recipe_sections)
    {
        $recipe_sections->update($request->all());
        return redirect()->route('recipe_sections.index');
    }

    // Xoá sản phẩm
    public function destroy(recipe_sections $recipe_sections)
    {
        $recipe_sections->delete();
        return redirect()->route('recipe_sections.index');
    }
}
