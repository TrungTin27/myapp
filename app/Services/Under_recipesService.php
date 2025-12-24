<?php

namespace App\Services;

use App\Models\Under_recipes;
use App\Repositories\Interface\Under_recipesRepositoryInterface;

class Under_recipesService
{
    protected $Under_recipesRepository;

    public function __construct(Under_recipesRepositoryInterface $Under_recipesRepository)
    {
        $this->Under_recipesRepository = $Under_recipesRepository;
    }
    public function create(array $data)
    {
        return $this->Under_recipesRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->Under_recipesRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->Under_recipesRepository->delete($id);
    }
    public function store($data)
    {
        return Under_recipes::create($data);
    }
}
