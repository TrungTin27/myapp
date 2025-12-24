<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Breakfast_recipes;
use Illuminate\Http\Request;
use App\Services\Breakfast_recipesService;
use App\Http\Requests\Breakfast_recipesRequest;
use Illuminate\Support\Facades\Storage;

class Breakfast_recipesController extends Controller
{
    public function __construct(public readonly Breakfast_recipesService $breakfast_recipesService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $Breakfast_recipes = Breakfast_recipes::latest()->paginate(10);
        return view('admin.Breakfast_recipes.index', compact('Breakfast_recipes'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.Breakfast_recipes.create');
    }

    // Lưu vào DB
    public function store(Breakfast_recipesRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }
            $Breakfast_recipes = $this->breakfast_recipesService->store($data);
            if ($Breakfast_recipes) {
                flash('Thêm thành công')->success();
                return redirect()->route('breakfast_recipes.index');
            }
            flash('Thêm  thất bại')->error();
            return redirect()->back();
        } catch (\Exception $e) {
            flash('Thêm thất bại')->error();
            return redirect()->back();
        }
    }

    // Hiển thị chi tiết


    // Form chỉnh sửa
    public function edit($id)
    {
        $recipe = Breakfast_recipes::findOrFail($id);

        return view('admin.Breakfast_recipes.edit', compact('recipe'));
    }

    // Update sản phẩm
    public function update(Breakfast_recipesRequest $request, $id)
    {
        try {
            $Breakfast_recipes = Breakfast_recipes::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                if ($Breakfast_recipes->thumbnail) {
                    Storage::disk('public')->delete($Breakfast_recipes->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }

            $Breakfast_recipes->update($data);
            flash('Chỉnh sửa  thành công')->success();
            return redirect()->route('Breakfast_recipes.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function destroy(Breakfast_recipes $Breakfast_recipes)
    {
        $Breakfast_recipes->delete();
        return redirect()->route('Breakfast_recipes.index');
    }
}
