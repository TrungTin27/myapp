<?php

namespace App\Repositories;

use App\Models\Reader_favorites;
use App\Repositories\Interface\Reader_favoritesRepositoryInterface;


class Reader_favoritesRepository implements Reader_favoritesRepositoryInterface
{
    public function create(array $data)
    {
        return Reader_favorites::create($data);
    }
    public function update($id, $data)
    {
        $Reader_favorites = Reader_favorites::findOrFail($id);
        $Reader_favorites->update($data);
        return $Reader_favorites;
    }
    public function delete($id)
    {
        $Posts = Reader_favorites::findOrFail($id);
        return $Posts->delete($id);
    }
    public function search($keyword)
    {
        $query = Reader_favorites::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
