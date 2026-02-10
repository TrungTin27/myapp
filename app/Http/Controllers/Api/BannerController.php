<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    // GET /api/banners
    public function index()
    {
        $banners = Banner::latest()->paginate(5);

        return response()->json([
            'status' => true,
            'data' => $banners
        ]);
    }

    // POST /api/banners
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|string'
        ]);

        $banner = Banner::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Banner created successfully',
            'data' => $banner
        ]);
    }

    // GET /api/banners/{id}
    public function show($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return response()->json([
                'status' => false,
                'message' => 'Banner not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $banner
        ]);
    }

    // PUT /api/banners/{id}
    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return response()->json([
                'status' => false,
                'message' => 'Banner not found'
            ], 404);
        }

        $banner->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Banner updated successfully',
            'data' => $banner
        ]);
    }

    // DELETE /api/banners/{id}
    public function destroy($id)
    {
        $banner = Banner::find($id);

        if (!$banner) {
            return response()->json([
                'status' => false,
                'message' => 'Banner not found'
            ], 404);
        }

        $banner->delete();

        return response()->json([
            'status' => true,
            'message' => 'Banner deleted successfully'
        ]);
    }
}
