<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use App\Services\PostsService;
use App\Http\Requests\PostsRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct(public readonly PostsService $PostsService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $Posts = Posts::latest()->paginate(10);
        return view('admin.Posts.index', compact('Posts'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.Posts.create');
    }

    // Lưu vào DB
    public function store(PostsRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }
            $Posts = $this->PostsService->store($data);
            if ($Posts) {
                flash('Thêm thành công')->success();
                return redirect()->route('posts.index');
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
        $recipe = Posts::findOrFail($id);

        return view('admin.Posts.edit', compact('recipe'));
    }

    // Update sản phẩm
    public function update(PostsRequest $request, $id)
    {
        try {
            $Posts = Posts::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                if ($Posts->thumbnail) {
                    Storage::disk('public')->delete($Posts->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }

            $Posts->update($data);
            flash('Chỉnh sửa  thành công')->success();
            return redirect()->route('Posts.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function destroy(Posts $Posts)
    {
        $Posts->delete();
        return redirect()->route('Posts.index');
    }
}
