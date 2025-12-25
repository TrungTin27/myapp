<?php

namespace App\Services;

use App\Models\How_tos;
use App\Repositories\Interface\How_tosRepositoryInterface;

class How_tosService
{
    protected $How_tosRepository;

    public function __construct(How_tosRepositoryInterface $How_tosRepository)
    {
        $this->How_tosRepository = $How_tosRepository;
    }
    public function create(array $data)
    {
        return $this->How_tosRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->How_tosRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->How_tosRepository->delete($id);
    }
    public function store($data)
    {
        return How_tos::create($data);
    }
}
