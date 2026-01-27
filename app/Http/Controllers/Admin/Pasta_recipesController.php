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
    public function __construct(
        public readonly Pasta_recipesService $Pasta_recipesService
    ) {}

    // ================= LIST =================
    public function index(Request $request)
    {
        $query = Pasta_recipes::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
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

    // ================= CREATE =================
    public function create()
    {
        return view('admin.Pasta_recipes.create');
    }

    public function store(Pasta_recipesRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')
                    ->store('avatars', 'public');
            }

            $this->Pasta_recipesService->store($data);

            flash('Thêm thành công')->success();
            return redirect()->route('pasta_recipes.index');

        } catch (\Exception $e) {
            flash('Thêm thất bại')->error();
            return redirect()->back();
        }
    }

    // ================= EDIT =================
    public function edit($id)
    {
        $recipe = Pasta_recipes::findOrFail($id);
        return view('admin.Pasta_recipes.edit', compact('recipe'));
    }

    public function update(Pasta_recipesRequest $request, $id)
    {
        try {
            $recipe = Pasta_recipes::findOrFail($id);
            $data = $request->validated();

            if ($request->hasFile('thumbnail')) {
                if ($recipe->thumbnail) {
                    Storage::disk('public')->delete($recipe->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')
                    ->store('avatars', 'public');
            }

            $recipe->update($data);

            flash('Chỉnh sửa thành công')->success();
            return redirect()->route('pasta_recipes.index');

        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

 public function destroy($id)
{
    $pasta = Pasta_recipes::findOrFail($id);
    $pasta->delete();

    return response()->json(['message' => 'Deleted successfully']);
}


}
