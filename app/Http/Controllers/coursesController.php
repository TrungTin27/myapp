<?php

namespace App\Http\Controllers;

use App\Models\courses;
use Illuminate\Http\Request;

class coursesController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $courses = courses::all();
        return view('courses.index', compact('courses'));
    }

    // Form tạo mới
    public function create()
    {
        return view('courses.create');
    }

    // Lưu vào DB
    public function store(Request $request)
    {
        courses::create($request->all());
        return redirect()->route('courses.index');
    }

    // Hiển thị chi tiết
    public function show(courses $courses)
    {
        return view('courses.show', compact('courses'));
    }

    // Form chỉnh sửa
    public function edit(courses $courses)
    {
        return view('courses.edit', compact('courses'));
    }

    // Update sản phẩm
    public function update(Request $request, courses $courses)
    {
        $courses->update($request->all());
        return redirect()->route('courses.index');
    }

    // Xoá sản phẩm
    public function destroy(courses $courses)
    {
        $courses->delete();
        return redirect()->route('courses.index');
    }
}