@extends('admin.layout.app')

@section('title', 'Thêm sản phẩm')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm sản phẩm</h1>
</div>

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="card p-3">
        <div class="form-group">
            <label>Tên món ăn</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label>Hình ảnh</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="form-group mt-3">
            <label>Giá</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Thời gian nấu</label>
            <input type="text" name="cook_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mô tả ngắn (1,2 câu)</label>
            <input type="text" name="short_description" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mô tả chi tiết</label>
            <input type="text" name="description" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Điểm rating trung bình</label>
            <input type="text" name="rating	" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tổng số lượt đánh giá</label>
            <input type="text" name="rating_count" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Số lượt xem</label>
            <input type="text" name="views" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Đánh dấu món nổi bật</label>
            <input type="text" name="is_featured	
" class="form-control" required>
        </div>


        <button class="btn btn-info mt-4 w-100">Lưu</button>
    </div>
</form>
@endsection