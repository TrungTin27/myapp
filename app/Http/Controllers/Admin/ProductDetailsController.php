<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\product_details;
use App\Models\ProductDetails;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    // Hiển thị danh sách
    public function index()
    {
        $productDetails = product_details::latest()->paginate(10);
        return view('admin.Product_details.index', compact('productDetails'));
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

        return redirect()
            ->route('product_details.index')
            ->with('success', 'Thêm chi tiết sản phẩm thành công');
    }

    // Hiển thị chi tiết
    public function show(product_details $productDetails)
    {
        return view('product_details.show', compact('productDetails'));
    }

    // Form chỉnh sửa
    public function edit(product_details $productDetails)
    {
        return view('product_details.edit', compact('productDetails'));
    }

    // Update
    public function update(Request $request, product_details $productDetails)
    {
        $productDetails->update($request->all());

        return redirect()
            ->route('product_details.index')
            ->with('success', 'Cập nhật thành công');
    }

    // Xoá
    public function destroy(product_details $productDetails)
    {
        $productDetails->delete();

        return redirect()
            ->route('product_details.index')
            ->with('success', 'Xoá thành công');
    }
}
