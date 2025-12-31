<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pasta_recipes;
use App\Services\Pasta_recipesService;
use App\Http\Requests\Pasta_recipesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Pasta_recipesController extends Controller
{
    public function __construct(public readonly Pasta_recipesService $Pasta_recipesService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index(Request $request)
    {
        $query = Pasta_recipes::query()
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

        $Pasta_recipes = $query->latest()->paginate(10);
        return view('admin.Pasta_recipes.index', compact('Pasta_recipes'));
    }
    // Form tạo mới
    public function create()
    {
        return view('admin.Pasta_recipes.create');
    }

    // Lưu vào DB
    public function store(Pasta_recipesRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }
            $Pasta_recipes = $this->Pasta_recipesService->store($data);
            if ($Pasta_recipes) {
                flash('Thêm thành công')->success();
                return redirect()->route('pasta_recipes.index');
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
        $recipe = Pasta_recipes::findOrFail($id);

        return view('admin.Pasta_recipes.edit', compact('recipe'));
    }

    // Update sản phẩm
    public function update(Pasta_recipesRequest $request, $id)
    {
        try {
            $Pasta_recipes = Pasta_recipes::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                if ($Pasta_recipes->thumbnail) {
                    Storage::disk('public')->delete($Pasta_recipes->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }

            $Pasta_recipes->update($data);
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

        $Pasta_recipes = Pasta_recipes::findOrFail($id);
        $Pasta_recipes->delete();
        return redirect()->back();
    }
}
