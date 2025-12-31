<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\How_tos;
use App\Services\How_tosService;
use App\Http\Requests\How_tosRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class How_tosController extends Controller
{
    public function __construct(public readonly How_tosService $How_tosService) {}
    // Hiển thị toàn bộ sản phẩm
    public function index(Request $request)
    {
        $query = How_tos::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('first name', 'like', '%' . $request->search . '%');
                });
            })
            ->when($request->filled('start_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '>=', $request->start_date);
            })
            ->when($request->filled('end_date'), function ($query) use ($request) {
                $query->whereDate('created_at', '<=', $request->end_date);
            });

        $How_tos = $query->latest()->paginate(10);
        return view('admin.How_tos.index', compact('How_tos'));
    }


    // Lưu vào DB
    public function store(How_tosRequest $request)
    {
        try {
            $data = $request->validated();
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $request->file('thumbnail')->store('avatars', 'public');
            }
            $How_tosService = $this->How_tosService->store($data);
            if ($How_tosService) {
                flash('Thêm thành công')->success();
                return redirect()->route('how_tos.index');
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
        $recipe = How_tos::findOrFail($id);

        return view('admin.How_tos.edit', compact('recipe'));
    }



    // Xoá sản phẩm
    public function delete($id)
    {

        $How_tos = How_tos::findOrFail($id);
        $How_tos->delete();
        return redirect()->back();
    }
}
