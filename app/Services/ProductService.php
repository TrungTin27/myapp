<?php
namespace App\Services;
use App\Models\Supplier;
use App\Models\Product;
use App\Repositories\Interface\ProductRepositoryInterface;
class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function create(array $data)
    {
        return $this->productRepository->create($data);

    }

    public function update($id, array $data)
    {
        return $this->productRepository->update($id, $data);

    }

    public function show($id)
    {
        return $this->productRepository->show($id);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
    public function search($keyword)
    {
        return $this->productRepository->search($keyword);

    }
    public function store($data)
    {
        return Product::create($data);
    }
   
}
