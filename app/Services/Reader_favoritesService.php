<?php

namespace App\Services;

use App\Models\Reader_favorites;
use App\Repositories\Interface\Reader_favoritesRepositoryInterface;


class Reader_favoritesService
{
    protected $Reader_favoritesRepository;

    public function __construct(Reader_favoritesRepositoryInterface $Reader_favoritesRepository)
    {
        $this->Reader_favoritesRepository = $Reader_favoritesRepository;
    }
    public function create(array $data)
    {
        return $this->Reader_favoritesRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->Reader_favoritesRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->Reader_favoritesRepository->delete($id);
    }
    public function store($data)
    {
        return Reader_favorites::create($data);
    }
    public function search($keyword)
    {
        return $this->Reader_favoritesRepository->search($keyword);
    }
}
