<?php

namespace App\Http\Controllers;

use App\Models\recipe_ingredients;
use Illuminate\Http\Request;

class recipe_ingredientsController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $recipe_ingredients = recipe_ingredients::all();
        return view('recipe_ingredients.index', compact('recipe_ingredients'));
    }

    // Form tạo mới
    public function create()
    {
        return view('recipe_ingredients.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        recipe_ingredients::create($request->all());
        return redirect()->route('recipe_ingredients.index');
    }

    // Hiển thị chi tiết
    public function show(recipe_ingredients $recipe_ingredients)
    {
        return view('recipe_ingredients.show', compact('recipe_ingredients'));
    }

    // Form chỉnh sửa
    public function edit(recipe_ingredients $recipe_ingredients)
    {
        return view('recipe_ingredients.edit', compact('recipe_ingredients'));
    }

    // Update sản phẩm
    public function update(Request $request, recipe_ingredients $recipe_ingredients)
    {
        $recipe_ingredients->update($request->all());
        return redirect()->route('recipe_ingredients.index');
    }

    // Xoá sản phẩm
    public function destroy(recipe_ingredients $recipe_ingredients)
    {
        $recipe_ingredients->delete();
        return redirect()->route('recipe_ingredients.index');
    }
}