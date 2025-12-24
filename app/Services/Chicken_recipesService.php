<?php

namespace App\Services;

use App\Models\Chicken_recipes;
use App\Repositories\Interface\Chicken_recipesRepositoryInterface;

class Chicken_recipesService
{
    protected $Chicken_recipesRepository;

    public function __construct(Chicken_recipesRepositoryInterface $Chicken_recipesRepository)
    {
        $this->Chicken_recipesRepository = $Chicken_recipesRepository;
    }
    public function create(array $data)
    {
        return $this->Chicken_recipesRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->Chicken_recipesRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->Chicken_recipesRepository->delete($id);
    }
    public function store($data)
    {
        return Chicken_recipes::create($data);
    }
}
