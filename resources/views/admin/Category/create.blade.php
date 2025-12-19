@extends('admin.layout.app')

@section('title', 'Thêm danh mục')

@section('content')

<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm danh mục</h1>
</div>

<form action="{{ route('category.store') }}" method="POST">
    @csrf

    <div class="card p-3">

        {{-- Tên danh mục --}}
        <div class="form-group">
            <label>Tên danh mục</label>
            <input type="text"
                name="name"
                class="form-control"
                required>
            @error('name')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {{-- Icon --}}
        <div class="form-group mt-3">
            <label>Icon (tùy chọn)</label>
            <input type="text"
                name="icon"
                class="form-control"
                placeholder="Ví dụ: las la-home, fa fa-book">
        </div>

        {{-- Mô tả --}}
        <div class="form-group mt-3">
            <label>Mô tả</label>
            <textarea name="description"
                class="form-control"
                rows="3"></textarea>
        </div>

        {{-- BUTTON --}}
        <button class="btn btn-info mt-4 w-100">
            Lưu
        </button>

    </div>
</form>

@endsection