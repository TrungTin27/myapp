<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author_sections;
use Illuminate\Http\Request;
use App\Services\Author_sectionsService;
use App\Http\Requests\Author_sectionsRequest;
use Illuminate\Support\Facades\Storage;

class Author_sectionsController extends Controller
{
    public function __construct(public readonly Author_sectionsService $author_sectionsService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $Author_sections = Author_sections::latest()->paginate(10);
        return view('admin.Author_sections.index', compact('Author_sections'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.Author_sections.create');
    }

    // Lưu vào DB
    public function store(Author_sectionsRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }
            $Author_sections = $this->author_sectionsService->store($data);
            if ($Author_sections) {
                flash('Thêm thành công')->success();
                return redirect()->route('author_sections.index');
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
        $recipe = Author_sections::findOrFail($id);

        return view('admin.Author_sections.edit', compact('recipe'));
    }

    // Update sản phẩm
    public function update(Author_sectionsRequest $request, $id)
    {
        try {
            $Author_sections = Author_sections::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                if ($Author_sections->thumbnail) {
                    Storage::disk('public')->delete($Author_sections->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }

            $Author_sections->update($data);
            flash('Chỉnh sửa  thành công')->success();
            return redirect()->route('Author_sections.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function destroy(Author_sections $Author_sections)
    {
        $Author_sections->delete();
        return redirect()->route('Author_sections.index');
    }
}
