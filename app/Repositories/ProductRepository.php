<?php
namespace App\Repositories;
use App\Models\Product;
use App\Repositories\Interface\ProductRepositoryInterface;
class ProductRepository implements ProductRepositoryInterface
{
    public function create(array $data)
    {
        return Product::create($data);
    }
    public function update($id, $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        return $product->delete($id);
    }
    public function search($keyword)
    {
        $query = Product::query();

        if (!empty($keyword)) {
            $query->where('name', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $product;
    }
   
}