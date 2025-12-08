<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\products;
use Illuminate\Http\Request;

class productsController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $products = products::all();
        return view('products.index', compact('products'));
    }

    // Form tạo mới
    public function create()
    {
        return view('products.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        products::create($request->all());
        return redirect()->route('products.index');
    }

    // Hiển thị chi tiết
    public function show(products $product)
    {
        return view('products.show', compact('product'));
    }

    // Form chỉnh sửa
    public function edit(products $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update sản phẩm
    public function update(Request $request, products $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    // Xoá sản phẩm
    public function destroy(products $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}

