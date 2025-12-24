<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // Hiển thị toàn bộ sản phẩm
    public function index()
    {
        $courses = Courses::all();
        return view('admin.Courses.index', compact('courses'));
    }

    // Form tạo mới
    public function create()
    {
        return view('Admin.Courses.create');
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
        return view('Courses.show', compact('Courses'));
    }

    // Form chỉnh sửa
    public function edit(Courses $course)
    {
        return view('admin.Courses.edit', compact('course'));
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
