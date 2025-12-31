<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Under_recipes;
use App\Services\Under_recipesService;
use App\Http\Requests\Under_recipesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Under_recipesController extends Controller
{
    public function __construct(public readonly Under_recipesService $PostsService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index(Request $request)
    {
        $query = Under_recipes::query()
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

        $Under_recipes = $query->latest()->paginate(10);
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
            $Posts = $this->PostsService->store($data);
            if ($Posts) {
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
            return redirect()->route('Posts.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function delete($id)
    {

        $Under_recipes = Under_recipes::findOrFail($id);
        $Under_recipes->delete();
        return redirect()->back();
    }
}
