<?php

namespace App\Http\Controllers;

use App\Models\partners;
use Illuminate\Http\Request;

class partnersController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $partners = partners::all();
        return view('partners.index', compact('partners'));
    }

    // Form tạo mới
    public function create()
    {
        return view('partners.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        partners::create($request->all());
        return redirect()->route('partners.index');
    }

    // Hiển thị chi tiết
    public function show(partners $partners)
    {
        return view('partners.show', compact('partners'));
    }

    // Form chỉnh sửa
    public function edit(partners $partners)
    {
        return view('partners.edit', compact('partners'));
    }

    // Update sản phẩm
    public function update(Request $request, partners $partners)
    {
        $partners->update($request->all());
        return redirect()->route('partners.index');
    }

    // Xoá sản phẩm
    public function destroy(partners $partners)
    {
        $partners->delete();
        return redirect()->route('partners.index');
    }
}