<?php

namespace App\Repositories;

use App\Models\How_tos;
use App\Repositories\Interface\How_tosRepositoryInterface;

class How_tosRepository implements How_tosRepositoryInterface
{
    public function create(array $data)
    {
        return How_tos::create($data);
    }
    public function update($id, $data)
    {
        $How_tos = How_tos::findOrFail($id);
        $How_tos->update($data);
        return $How_tos;
    }
    public function delete($id)
    {
        $How_tos = How_tos::findOrFail($id);
        return $How_tos->delete($id);
    }
    public function search($keyword)
    {
        $query = How_tos::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
