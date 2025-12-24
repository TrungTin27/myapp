<?php

namespace App\Repositories;

use App\Models\Posts;
use App\Repositories\Interface\PostsRepositoryInterface;


class PostsRepository implements PostsRepositoryInterface
{
    public function create(array $data)
    {
        return Posts::create($data);
    }
    public function update($id, $data)
    {
        $Posts = Posts::findOrFail($id);
        $Posts->update($data);
        return $Posts;
    }
    public function delete($id)
    {
        $Posts = Posts::findOrFail($id);
        return $Posts->delete($id);
    }
    public function search($keyword)
    {
        $query = Posts::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
