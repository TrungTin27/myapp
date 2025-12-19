@extends('admin.layout.app')

@section('title', 'Thêm khóa học')

@section('content')

<div class="aiz-titlebar mt-2 mb-3 d-flex justify-content-between align-items-center">
    <h1 class="h3">Thêm khóa học</h1>
    <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-sm">
        Quay lại
    </a>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card p-3">

        <div class="form-group">
            <label>Tiêu đề khóa học</label>
            <input type="text"
                name="title"
                class="form-control"
                placeholder="Nhập tiêu đề khóa học"
                required>
        </div>

        <div class="form-group mt-3">
            <label>Mô tả ngắn</label>
            <textarea name="short_description"
                class="form-control"
                rows="3"
                placeholder="Mô tả ngắn về khóa học"></textarea>
        </div>

        <div class="form-group mt-3">
            <label>Hình ảnh</label>
            <input type="file"
                name="image"
                class="form-control">
        </div>

        <div class="form-group mt-3">
            <label>Giá (đ)</label>
            <input type="number"
                name="price"
                class="form-control"
                placeholder="Nhập giá khóa học">
        </div>

        <div class="form-group mt-3">
            <label>Cấp độ</label>
            <select name="level" class="form-control">
                <option value="">-- Chọn cấp độ --</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Thời lượng</label>
            <input type="text"
                name="duration"
                class="form-control"
                placeholder="Ví dụ: 10 giờ">
        </div>

        <button class="btn btn-info mt-4 w-100">
            Lưu
        </button>

    </div>
</form>

@endsection