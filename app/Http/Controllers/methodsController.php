<?php

namespace App\Http\Controllers;

use App\Models\methods;
use Illuminate\Http\Request;

class methodsController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $methods = methods::all();
        return view('methods.index', compact('methods'));
    }

    // Form tạo mới
    public function create()
    {
        return view('methods.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        methods::create($request->all());
        return redirect()->route('methods.index');
    }

    // Hiển thị chi tiết
    public function show(methods $methods)
    {
        return view('methods.show', compact('methods'));
    }

    // Form chỉnh sửa
    public function edit(methods $methods)
    {
        return view('methods.edit', compact('methods'));
    }

    // Update sản phẩm
    public function update(Request $request, methods $methods)
    {
        $methods->update($request->all());
        return redirect()->route('methods.index');
    }

    // Xoá sản phẩm
    public function destroy(methods $methods)
    {
        $methods->delete();
        return redirect()->route('methods.index');
    }
}