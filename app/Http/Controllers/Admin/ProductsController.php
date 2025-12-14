<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function __construct(public readonly ProductService $productService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.Products.index', compact('products'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.Products.create');
    }

    // Lưu vào DB
    public function store(ProductRequest $request)
    {

        try {

            $data = $request->validated();
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('avatars', 'public');
            }
            $product = $this->productService->store($data);
            if ($product) {
                flash('Thêm sản phẩm thành công')->success();
                return redirect()->route('product.index');
            }
            flash('Thêm sản phẩm thất bại')->error();
            return redirect()->back();
        } catch (\Exception $e) {
            flash('Thêm sản phẩm thất bại')->error();
            return redirect()->back();
        }
    }

    // Hiển thị chi tiết
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // Form chỉnh sửa
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update sản phẩm
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    // Xoá sản phẩm
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
