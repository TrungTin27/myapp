<?php

namespace App\Repositories;

use App\Models\Author_sections;
use App\Repositories\Interface\Author_sectionsRepositoryInterface;

class Author_sectionsRepository implements Author_sectionsRepositoryInterface
{
    public function create(array $data)
    {
        return Author_sections::create($data);
    }
    public function update($id, $data)
    {
        $Author_sections = Author_sections::findOrFail($id);
        $Author_sections->update($data);
        return $Author_sections;
    }
    public function delete($id)
    {
        $Author_sections = Author_sections::findOrFail($id);
        return $Author_sections->delete($id);
    }
    public function search($keyword)
    {
        $query = Author_sections::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
