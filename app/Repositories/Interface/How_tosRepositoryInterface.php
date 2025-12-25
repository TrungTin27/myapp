<?php

namespace App\Repositories\Interface;

interface How_tosRepositoryInterface
{
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
