<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chicken_recipes;
use App\Services\Chicken_recipesService;
use App\Http\Requests\Chicken_recipesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Chicken_recipesController extends Controller
{
    public function __construct(public readonly Chicken_recipesService $Chicken_recipesService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index(Request $request)
    {
        $query = Chicken_recipes::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->filled('start_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->start_date);
            })
            ->when($request->filled('end_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->end_date);
            });

        $Chicken_recipes = $query->latest()->paginate(10);
        return view('admin.Chicken_recipes.index', compact('Chicken_recipes'));
    }
    // Form tạo mới
    public function create()
    {
        return view('admin.Chicken_recipes.create');
    }

    // Lưu vào DB
    public function store(Chicken_recipesRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }
            $Chicken_recipes = $this->Chicken_recipesService->store($data);
            if ($Chicken_recipes) {
                flash('Thêm thành công')->success();
                return redirect()->route('chicken_recipes.index');
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
        $recipe = Chicken_recipes::findOrFail($id);

        return view('admin.Chicken_recipes.edit', compact('recipe'));
    }

    // Update sản phẩm
    public function update(Chicken_recipesRequest $request, $id)
    {
        try {
            $Chicken_recipes = Chicken_recipes::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                if ($Chicken_recipes->thumbnail) {
                    Storage::disk('public')->delete($Chicken_recipes->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }

            $Chicken_recipes->update($data);
            flash('Chỉnh sửa  thành công')->success();
            return redirect()->route('Posts.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function delete($id)
    {

        $Chicken_recipes = Chicken_recipes::findOrFail($id);
        $Chicken_recipes->delete();
        return redirect()->back();
    }
}
