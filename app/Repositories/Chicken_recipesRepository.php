<?php

namespace App\Repositories;

use App\Models\Chicken_recipes;
use App\Repositories\Interface\Chicken_recipesRepositoryInterface;


class Chicken_recipesRepository implements Chicken_recipesRepositoryInterface
{
    public function create(array $data)
    {
        return Chicken_recipes::create($data);
    }
    public function update($id, $data)
    {
        $Chicken_recipes = Chicken_recipes::findOrFail($id);
        $Chicken_recipes->update($data);
        return $Chicken_recipes;
    }
    public function delete($id)
    {
        $Chicken_recipes = Chicken_recipes::findOrFail($id);
        return $Chicken_recipes->delete($id);
    }
    public function search($keyword)
    {
        $query = Chicken_recipes::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
