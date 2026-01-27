@extends('admin.layout.app')

@section('title', 'Author section')

@section('content')
<form method="POST"
    action="{{ isset($item) ? route('author_sections.update', $item->id) : route('author_sections.store') }}"
    enctype="multipart/form-data">

    @csrf
    @isset($item) @method('PUT') @endisset

    <div class="card p-3">

        <div class="form-group">
            <label>Tiêu đề</label>
            <input type="text"
                name="title"
                class="form-control"
                value="{{ old('title', $item->title ?? '') }}"
                required>
        </div>

        <div class="form-group mt-3">
            <label>Mô tả</label>
            <textarea name="description"
                class="form-control"
                rows="4">{{ old('description', $item->description ?? '') }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label>Hình ảnh</label>
            <input type="file" name="image" class="form-control">

            @if(!empty($item->image))
                <img src="{{ asset('storage/'.$item->image) }}" width="120" class="mt-2">
            @endif
        </div>

        <div class="form-group mt-3">
            <label>
                <input type="checkbox"
                    name="is_active"
                    value="1"
                    {{ old('is_active', $item->is_active ?? true) ? 'checked' : '' }}>
                Hiển thị ngoài website
            </label>
        </div>

        <button class="btn btn-info mt-4 w-100">
            💾 Lưu tác giả
        </button>

    </div>
</form>
@endsection
