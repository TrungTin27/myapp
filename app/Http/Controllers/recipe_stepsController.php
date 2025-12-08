<?php

namespace App\Http\Controllers;

use App\Models\recipe_steps;
use Illuminate\Http\Request;

class recipe_stepsController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $recipe_steps = recipe_steps::all();
        return view('recipe_steps.index', compact('recipe_steps'));
    }

    // Form tạo mới
    public function create()
    {
        return view('recipe_steps.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        recipe_steps::create($request->all());
        return redirect()->route('recipe_steps.index');
    }

    // Hiển thị chi tiết
    public function show(recipe_steps $recipe_steps)
    {
        return view('recipe_steps.show', compact('recipe_steps'));
    }

    // Form chỉnh sửa
    public function edit(recipe_steps $recipe_steps)
    {
        return view('recipe_steps.edit', compact('recipe_steps'));
    }

    // Update sản phẩm
    public function update(Request $request, recipe_steps $recipe_steps)
    {
        $recipe_steps->update($request->all());
        return redirect()->route('recipe_steps.index');
    }

    // Xoá sản phẩm
    public function destroy(recipe_steps $recipe_steps)
    {
        $recipe_steps->delete();
        return redirect()->route('recipe_steps.index');
    }
}