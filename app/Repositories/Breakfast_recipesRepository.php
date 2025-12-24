<?php

namespace App\Repositories;

use App\Models\Breakfast_recipes;
use App\Repositories\Interface\Breakfast_recipesRepositoryInterface;

class Breakfast_recipesRepository implements Breakfast_recipesRepositoryInterface
{
    public function create(array $data)
    {
        return Breakfast_recipes::create($data);
    }
    public function update($id, $data)
    {
        $Breakfast_recipes = Breakfast_recipes::findOrFail($id);
        $Breakfast_recipes->update($data);
        return $Breakfast_recipes;
    }
    public function delete($id)
    {
        $Breakfast_recipes = Breakfast_recipes::findOrFail($id);
        return $Breakfast_recipes->delete($id);
    }
    public function search($keyword)
    {
        $query = Breakfast_recipes::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
