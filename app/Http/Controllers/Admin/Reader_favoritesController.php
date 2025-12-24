<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reader_favorites;
use Illuminate\Http\Request;
use App\Services\Reader_favoritesService;
use App\Http\Requests\Reader_favoritesRequest;
use Illuminate\Support\Facades\Storage;

class Reader_favoritesController extends Controller
{
    public function __construct(public readonly Reader_favoritesService $reader_favoritesService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $Reader_favorites = Reader_favorites::latest()->paginate(10);
        return view('admin.Reader_favorites.index', compact('Reader_favorites'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.Reader_favorites.create');
    }

    // Lưu vào DB
    public function store(Reader_favoritesRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }
            $Reader_favorites = $this->reader_favoritesService->store($data);
            if ($Reader_favorites) {
                flash('Thêm thành công')->success();
                return redirect()->route('reader_favorites.index');
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
        $recipe = Reader_favorites::findOrFail($id);

        return view('admin.Reader_favorites.edit', compact('recipe'));
    }

    // Update sản phẩm
    public function update(Reader_favoritesRequest $request, $id)
    {
        try {
            $Reader_favorites = Reader_favorites::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                if ($Reader_favorites->thumbnail) {
                    Storage::disk('public')->delete($Reader_favorites->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }

            $Reader_favorites->update($data);
            flash('Chỉnh sửa  thành công')->success();
            return redirect()->route('Reader_favorites.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function destroy(Reader_favorites $Reader_favorites)
    {
        $Reader_favorites->delete();
        return redirect()->route('Reader_favorites.index');
    }
}
