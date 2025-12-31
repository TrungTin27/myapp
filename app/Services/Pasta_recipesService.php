<?php

namespace App\Services;

use App\Models\Pasta_recipes;
use App\Repositories\Interface\Pasta_recipesRepositoryInterface;


class Pasta_recipesService
{
    protected $Pasta_recipesRepository;

    public function __construct(Pasta_recipesRepositoryInterface $PostsRepository)
    {
        $this->Pasta_recipesRepository = $PostsRepository;
    }
    public function create(array $data)
    {
        return $this->Pasta_recipesRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->Pasta_recipesRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->Pasta_recipesRepository->delete($id);
    }
    public function store($data)
    {
        return Pasta_recipes::create($data);
    }
    public function search($keyword)
    {
        return $this->Pasta_recipesRepository->search($keyword);
    }
}
