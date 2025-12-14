<?php
namespace App\Repositories;
use App\Models\Banner;
use App\Repositories\Interface\BannerRepositoryInterface;
class BannerRepository implements BannerRepositoryInterface
{
    public function create(array $data)
    {
        return Banner::create($data);
    }
    public function update($id, $data)
    {
        $banner = Banner::findOrFail($id);
        $banner->update($data);
        return $banner;
    }
    public function delete($id)
    {
        $banner = Banner::findOrFail($id);
        return $banner->delete($id);
    }
    public function search($keyword){
        $query = Banner::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}