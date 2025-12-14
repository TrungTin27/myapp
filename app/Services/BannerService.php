<?php
namespace App\Services;

use App\Models\Banner;
use App\Repositories\Interface\BannerRepositoryInterface;
class BannerService
{
    protected $bannerRepository;

    public function __construct(BannerRepositoryInterface $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }
    public function create(array $data)
    {
        return $this->bannerRepository->create($data);

    }

    public function update($id, array $data)
    {
        return $this->bannerRepository->update($id,$data);

    }

    public function delete($id)
    {
        return $this->bannerRepository->delete($id);

    }
    public function store($data)
    {
        return Banner::create($data);
    }
    
}
