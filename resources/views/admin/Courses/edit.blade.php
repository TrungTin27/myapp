@extends('admin.layout.app')

@section('title', 'Chỉnh sửa khóa học')

@section('content')

<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Chỉnh sửa khóa học</h1>
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

<form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card p-3">

        <div class="form-group">
            <label>Tiêu đề khóa học</label>
            <input type="text"
                name="title"
                class="form-control"
                value="{{ $course->title }}"
                required>
        </div>

        <div class="form-group mt-3">
            <label>Slug</label>
            <input type="text"
                name="slug"
                class="form-control"
                value="{{ $course->slug }}">
        </div>

        <div class="form-group mt-3">
            <label>Mô tả ngắn</label>
            <textarea name="short_description"
                class="form-control"
                rows="2">{{ $course->short_description }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label>Mô tả chi tiết</label>
            <textarea name="long_description"
                class="form-control"
                rows="4">{{ $course->long_description }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label>Giá</label>
            <input type="number"
                name="price"
                class="form-control"
                value="{{ $course->price }}">
        </div>

        <div class="form-group mt-3">
            <label>Cấp độ</label>
            <input type="text"
                name="level"
                class="form-control"
                value="{{ $course->level }}">
        </div>

        <div class="form-group mt-3">
            <label>Thời lượng</label>
            <input type="text"
                name="duration"
                class="form-control"
                value="{{ $course->duration }}">
        </div>

        <div class="form-group mt-3">
            <label>Hình ảnh (nếu đổi)</label>
            <input type="file"
                name="image"
                class="form-control">

            @if($course->image)
            <img src="{{ asset('uploads/courses/'.$course->image) }}"
                width="120"
                class="mt-2">
            @endif
        </div>

        <button class="btn btn-info mt-4 w-100">
            Cập nhật
        </button>

    </div>
</form>

@endsection