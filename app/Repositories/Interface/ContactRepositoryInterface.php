<?php
namespace App\Repositories\Interface;
interface ContactRepositoryInterface{
    public function create(array $data);
    public function delete($id);
}