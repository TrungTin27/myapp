<?php

namespace App\Http\Controllers;

use App\Models\product_details;
use Illuminate\Http\Request;

class product_detailsController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $product_details = product_details::all();
        return view('product_details.index', compact('product_details'));
    }

    // Form tạo mới
    public function create()
    {
        return view('product_details.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        product_details::create($request->all());
        return redirect()->route('product_details.index');
    }

    // Hiển thị chi tiết
    public function show(product_details $product_details)
    {
        return view('product_details.show', compact('product_details'));
    }

    // Form chỉnh sửa
    public function edit(product_details $product_details)
    {
        return view('product_details.edit', compact('product_details'));
    }

    // Update sản phẩm
    public function update(Request $request, product_details $product_details)
    {
        $product_details->update($request->all());
        return redirect()->route('product_details.index');
    }

    // Xoá sản phẩm
    public function destroy(product_details $product_details)
    {
        $product_details->delete();
        return redirect()->route('product_details.index');
    }
}
