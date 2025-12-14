@extends('admin.layout.app')


@section('content')
<div class="container mt-4">
    <h2>Thêm Danh Mục Mới</h2>

    <form action="{{ route('category.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Tên danh mục</label>
            <input type="text" name="name" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Icon (tùy chọn)</label>
            <input type="text" name="icon" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Mô tả</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Tạo danh mục</button>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm mới</a>

    </form>
</div>