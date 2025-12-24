<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Under_recipes;

use Illuminate\Http\Request;
use App\Services\Under_recipesService;
use App\Http\Requests\Under_recipesRequest;
use Illuminate\Support\Facades\Storage;

class Under_recipesController extends Controller
{
    public function __construct(public readonly Under_recipesService $Under_recipesService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $Under_recipes = Under_recipes::latest()->paginate(10);
        return view('admin.Under_recipes.index', compact('Under_recipes'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.Under_recipes.create');
    }

    // Lưu vào DB
    public function store(Under_recipesRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }
            $Under_recipes = $this->Under_recipesService->store($data);
            if ($Under_recipes) {
                flash('Thêm thành công')->success();
                return redirect()->route('under_recipes.index');
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
        $recipe = Under_recipes::findOrFail($id);

        return view('admin.Under_recipes.edit', compact('recipe'));
    }

    // Update sản phẩm
    public function update(Under_recipesRequest $request, $id)
    {
        try {
            $Under_recipes = Under_recipes::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                if ($Under_recipes->thumbnail) {
                    Storage::disk('public')->delete($Under_recipes->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }

            $Under_recipes->update($data);
            flash('Chỉnh sửa  thành công')->success();
            return redirect()->route('Pasta_recipes.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function destroy(Under_recipes $Under_recipes)
    {
        $Under_recipes->delete();
        return redirect()->route('Under_recipes.index');
    }
}
