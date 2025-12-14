<?php
namespace App\Repositories\Interface;
interface EmployeeRepositoryInterface{
    public function create(array $data);
    public function update($id,array $data);
    public function delete($id);
}