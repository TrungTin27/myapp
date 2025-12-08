<?php

namespace App\Http\Controllers;

use App\Models\product_reviews;
use Illuminate\Http\Request;

class product_reviewsController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $product_reviews = product_reviews::all();
        return view('product_reviews.index', compact('product_reviews'));
    }

    // Form tạo mới
    public function create()
    {
        return view('product_reviews.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        product_reviews::create($request->all());
        return redirect()->route('product_reviews.index');
    }

    // Hiển thị chi tiết
    public function show(product_reviews $product_reviews)
    {
        return view('product_reviews.show', compact('product_reviews'));
    }

    // Form chỉnh sửa
    public function edit(product_reviews $product_reviews)
    {
        return view('product_reviews.edit', compact('product_reviews'));
    }

    // Update sản phẩm
    public function update(Request $request, product_reviews $product_reviews)
    {
        $product_reviews->update($request->all());
        return redirect()->route('product_reviews.index');
    }

    // Xoá sản phẩm
    public function destroy(product_reviews $product_reviews)
    {
        $product_reviews->delete();
        return redirect()->route('product_reviews.index');
    }
}
