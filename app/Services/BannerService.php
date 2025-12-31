<?php

namespace App\Services;

use App\Models\Banner;
use App\Repositories\Interface\BannerRepositoryInterface;


class BannerService
{
    protected $BannerRepository;

    public function __construct(BannerRepositoryInterface $BannerRepository)
    {
        $this->BannerRepository = $BannerRepository;
    }
    public function create(array $data)
    {
        return $this->BannerRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->BannerRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->BannerRepository->delete($id);
    }
    public function store($data)
    {
        return Banner::create($data);
    }
    public function search($keyword)
    {
        return $this->BannerRepository->search($keyword);
    }
}
