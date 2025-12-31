<?php

namespace App\Services;

use App\Models\Posts;
use App\Repositories\Interface\PostsRepositoryInterface;


class PostsService
{
    protected $PostsRepository;

    public function __construct(PostsRepositoryInterface $PostsRepository)
    {
        $this->PostsRepository = $PostsRepository;
    }
    public function create(array $data)
    {
        return $this->PostsRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->PostsRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->PostsRepository->delete($id);
    }
    public function store($data)
    {
        return Posts::create($data);
    }
    public function search($keyword)
    {
        return $this->PostsRepository->search($keyword);

    }
}
