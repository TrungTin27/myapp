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
        $Banner = Banner::findOrFail($id);
        $Banner->update($data);
        return $Banner;
    }
    public function delete($id)
    {
        $Banner = Banner::findOrFail($id);
        return $Banner->delete($id);
    }
    public function search($keyword)
    {
        $query = Banner::query();

        if (!empty($keyword)) {
            $query->where('title', 'like', "%{$keyword}%");
        }

        return $query->paginate(10);
    }
}
