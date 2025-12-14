<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Services\BannerService;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Storage;
class BannersController extends Controller
{
    public function __construct(public readonly BannerService $bannerService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $banners = Banner::latest()->paginate(10);
        return view('admin.Banners.index', compact('banners'));
    }

    // Form tạo mới
    public function create()
    {
        return view('admin.Banners.create');
    }

    // Lưu vào DB
    public function store(BannerRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('avatars', 'public');
            }
            $banner = $this->bannerService->store($data);
            if ($banner) {
                flash('Thêm banner thành công')->success();
                return redirect()->route('banners.index');
            }
            flash('Thêm banner thất bại')->error();
            return redirect()->back();
        } catch (\Exception $e) {
            flash('Thêm banner thất bại')->error();
            return redirect()->back();
        }
    }

    // Hiển thị chi tiết


    // Form chỉnh sửa
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('admin.Banners.edit', compact('banner'));
    }

    // Update sản phẩm
    public function update(BannerRequest $request, $id)
    {
        try {
            $banner = Banner::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('image')) {
                if ($banner->image) {
                    Storage::disk('public')->delete($banner->image);
                }
                $data['image'] = $request->file('image')->store('avatars', 'public');
            }

            $banner->update($data);
            flash('Chỉnh sửa sản phẩm thành công')->success();
            return redirect()->route('banners.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa sản phẩm thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function destroy(banner $banners)
    {
        $banners->delete();
        return redirect()->route('banners.index');
    }
}
