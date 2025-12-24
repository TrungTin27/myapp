<?php

namespace App\Repositories\Interface;

interface Breakfast_recipesRepositoryInterface
{
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
