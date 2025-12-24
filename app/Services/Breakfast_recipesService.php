<?php

namespace App\Services;

use App\Models\Breakfast_recipes;
use App\Repositories\Interface\Breakfast_recipesRepositoryInterface;

class Breakfast_recipesService
{
    protected $Breakfast_recipesRepository;

    public function __construct(Breakfast_recipesRepositoryInterface $Breakfast_recipesRepository)
    {
        $this->Breakfast_recipesRepository = $Breakfast_recipesRepository;
    }
    public function create(array $data)
    {
        return $this->Breakfast_recipesRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->Breakfast_recipesRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->Breakfast_recipesRepository->delete($id);
    }
    public function store($data)
    {
        return Breakfast_recipes::create($data);
    }
}
