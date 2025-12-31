<?php

namespace App\Repositories;

use App\Models\Under_recipes;
use App\Repositories\Interface\Under_recipesRepositoryInterface;


class Under_recipesRepository implements Under_recipesRepositoryInterface
{
    public function create(array $data)
    {
        return Under_recipes::create($data);
    }
    public function update($id, $data)
    {
        $Under_recipes = Under_recipes::findOrFail($id);
        $Under_recipes->update($data);
        return $Under_recipes;
    }
    public function delete($id)
    {
        $Under_recipes = Under_recipes::findOrFail($id);
        return $Under_recipes->delete($id);
    }
    public function search($keyword)
    {
        $query = Under_recipes::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
