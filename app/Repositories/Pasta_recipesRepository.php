<?php

namespace App\Repositories;

use App\Models\Pasta_recipes;
use App\Repositories\Interface\Pasta_recipesRepositoryInterface;


class Pasta_recipesRepository implements Pasta_recipesRepositoryInterface
{
    public function create(array $data)
    {
        return Pasta_recipes::create($data);
    }
    public function update($id, $data)
    {
        $Pasta_recipes = Pasta_recipes::findOrFail($id);
        $Pasta_recipes->update($data);
        return $Pasta_recipes;
    }
    public function delete($id)
    {
        $Pasta_recipes = Pasta_recipes::findOrFail($id);
        return $Pasta_recipes->delete($id);
    }
    public function search($keyword)
    {
        $query = Pasta_recipes::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
