<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Services\BannerService;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    public function __construct(public readonly BannerService $BannerService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index(Request $request)
    {
        $query = Banner::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->filled('start_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->start_date);
            })
            ->when($request->filled('end_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->end_date);
            });

        $Banners = $query->latest()->paginate(10);
        return view('admin.Banners.index', compact('Banners'));
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
            $Banner = $this->BannerService->store($data);
            if ($Banner) {
                flash('Thêm thành công')->success();
                return redirect()->route('banners.index');
            }
            flash('Thêm  thất bại')->error();
            return redirect()->back();
        } catch (\Exception $e) {
            flash('Thêm thất bại')->error();
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
            $Banner = Banner::findOrFail($id);
            $data = $request->validated();
            if ($request->hasFile('image')) {
                if ($Banner->image) {
                    Storage::disk('public')->delete($Banner->image);
                }
                $data['image'] = $request->file('image')->store('avatars', 'public');
            }

            $Banner->update($data);
            flash('Chỉnh sửa  thành công')->success();
            return redirect()->route('Banners.index');
        } catch (\Exception $e) {
            flash('Chỉnh sửa thất bại')->error();
            return redirect()->back();
        }
    }

    // Xoá sản phẩm
    public function delete($id)
    {

        $Banner = Banner::findOrFail($id);
        $Banner->delete();
        return redirect()->back();
    }
}
