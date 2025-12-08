<?php

namespace App\Http\Controllers;

use App\Models\banners;
use Illuminate\Http\Request;

class bannersController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $banners = banners::all();
        return view('banners.index', compact('banners'));
    }

    // Form tạo mới
    public function create()
    {
        return view('banners.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        banners::create($request->all());
        return redirect()->route('banners.index');
    }

    // Hiển thị chi tiết
    public function show(banners $banners)
    {
        return view('banners.show', compact('banners'));
    }

    // Form chỉnh sửa
    public function edit(banners $banners)
    {
        return view('banners.edit', compact('banners'));
    }

    // Update sản phẩm
    public function update(Request $request, banners $banners)
    {
        $banners->update($request->all());
        return redirect()->route('banners.index');
    }

    // Xoá sản phẩm
    public function destroy(banners $banners)
    {
        $banners->delete();
        return redirect()->route('banners.index');
    }
}
