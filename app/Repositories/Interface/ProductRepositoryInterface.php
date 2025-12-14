<?php
namespace App\Repositories\Interface;
interface ProductRepositoryInterface{
    public function create(array $data);
    public function update(array $data, $id);
    public function delete($id);
    public function search($keyword);
    public function show($id);
}