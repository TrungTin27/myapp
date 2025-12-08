<?php

namespace App\Http\Controllers;

use App\Models\searches;
use Illuminate\Http\Request;

class searchesController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $searches = searches::all();
        return view('searches.index', compact('searches'));
    }

    // Form tạo mới
    public function create()
    {
        return view('searches.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        searches::create($request->all());
        return redirect()->route('searches.index');
    }

    // Hiển thị chi tiết
    public function show(searches $searches)
    {
        return view('searches.show', compact('searches'));
    }

    // Form chỉnh sửa
    public function edit(searches $searches)
    {
        return view('searches.edit', compact('searches'));
    }

    // Update sản phẩm
    public function update(Request $request, searches $searches)
    {
        $searches->update($request->all());
        return redirect()->route('searches.index');
    }

    // Xoá sản phẩm
    public function destroy(searches $searches)
    {
        $searches->delete();
        return redirect()->route('searches.index');
    }
}