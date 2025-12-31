<?php

namespace App\Services;

use App\Models\Author_sections;
use App\Repositories\Interface\Author_sectionsRepositoryInterface;


class Author_sectionsService
{
    protected $Author_sectionsRepository;

    public function __construct(Author_sectionsRepositoryInterface $Author_sectionsRepository)
    {
        $this->Author_sectionsRepository = $Author_sectionsRepository;
    }
    public function create(array $data)
    {
        return $this->Author_sectionsRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->Author_sectionsRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->Author_sectionsRepository->delete($id);
    }
    public function store($data)
    {
        return Author_sections::create($data);
    }
    public function search($keyword)
    {
        return $this->Author_sectionsRepository->search($keyword);
    }
}
