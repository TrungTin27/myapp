<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\How_tos;
use Illuminate\Http\Request;
use App\Services\How_tosService;
use App\Http\Requests\How_tosRequest;
use Illuminate\Support\Facades\Storage;

class How_tosController extends Controller
{
    public function __construct(public readonly How_tosService $how_tosService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $How_tos = How_tos::latest()->paginate(10);
        return view('admin.How_tos.index', compact('How_tos'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.How_tos.create');
    }

    // Lưu vào DB
    public function store(How_tosRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }
            $How_tos = $this->how_tosService->store($data);
            if ($How_tos) {
                flash('Thêm thành công')->success();
                return redirect()->route('how_tos.index');
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
        $recipe = How_tos::findOrFail($id);

        return view('admin.How_tos.edit', compact('recipe'));
    }

    // Update sản phẩm
    public function update(How_tosRequest $request, $id)
    {
        try {
            $How_tos = How_tos::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                if ($How_tos->thumbnail) {
                    Storage::disk('public')->delete($How_tos->thumbnail);
                }
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }

            $How_tos->update($data);
            flash('Chỉnh sửa  thành công')->success();
            return redirect()->route('How_tos.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function destroy(How_tos $How_tos)
    {
        $How_tos->delete();
        return redirect()->route('How_tos.index');
    }
}
