@extends('admin.layout.app')

@section('title', 'Thêm bài đánh giá')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm bài đánh giá</h1>
</div>

<form action="{{ route('product_reviews.store') }}" method="POST">
    @csrf

    <div class="card p-3">

        <div class="form-group">
            <label>ID sản phẩm</label>
            <input
                type="number"
                name="product_id"
                class="form-control"
                value="{{ old('product_id') }}"
                required>
        </div>

        <div class="form-group mt-3">
            <label>ID người dùng (có thể để trống)</label>
            <input
                type="number"
                name="user_id"
                class="form-control"
                value="{{ old('user_id') }}">
        </div>

        <div class="form-group mt-3">
            <label>Tên người đánh giá</label>
            <input
                type="text"
                name="author_name"
                class="form-control"
                value="{{ old('author_name') }}"
                required>
        </div>

        <div class="form-group mt-3">
            <label>Điểm đánh giá (1 – 5)</label>
            <input
                type="number"
                name="rating"
                class="form-control"
                min="1"
                max="5"
                value="{{ old('rating') }}"
                required>
        </div>

        <div class="form-group mt-3">
            <label>Nội dung đánh giá</label>
            <textarea
                name="comment"
                class="form-control"
                rows="4"
                required>{{ old('comment') }}</textarea>
        </div>

        <div class="form-group mt-3">
            <label>Tên tác giả</label>
            <textarea
                name="author_name"
                class="form-control"
                rows="4"
                required>{{ old('author_name') }}</textarea>
        </div>

        <button class="btn btn-info mt-4 w-100">
            Lưu
        </button>
    </div>
</form>
@endsection