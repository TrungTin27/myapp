<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Product_reviewRequest;
use App\Http\Controllers\Controller;
use App\Models\product_reviews;
use App\Models\Product_reviews as ModelsProduct_reviews;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class Product_reviewsController extends Controller
{
    // Hiển thị danh sách
    public function index()
    {
        $product_reviews = product_reviews::paginate(10);

        return view('admin.Product_reviews.index', compact('product_reviews'));
    }


    // Form tạo mới
    public function create()
    {
        return view('admin.product_reviews.create');
    }

    // Lưu DB


    public function store(Product_reviewRequest $request)
    {
        product_reviews::create($request->validated());

        return redirect()
            ->route('product_reviews.index')
            ->with('success', 'Thêm đánh giá thành công');
    }


    // Form chỉnh sửa
    public function edit(product_reviews $productReview)
    {
        return view('admin.product_reviews.edit', compact('productReview'));
    }

    // Cập nhật
    public function update(Request $request, product_reviews $productReview)
    {
        $productReview->update($request->all());
        return redirect()->route('product_reviews.index');
    }

    // Xoá
    public function destroy(product_reviews $productReview)
    {
        $productReview->delete();
        return redirect()->route('product_reviews.index');
    }
}
