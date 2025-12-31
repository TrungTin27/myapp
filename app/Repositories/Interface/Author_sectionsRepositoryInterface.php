<?php

namespace App\Repositories\Interface;

interface Author_sectionsRepositoryInterface
{
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
    public function search($keyword);
}
