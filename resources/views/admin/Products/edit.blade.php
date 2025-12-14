@extends('admin.layout.app')

@section('title', 'Chỉnh sửa sản phẩm')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Chỉnh sửa sản phẩm</h1>
</div>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card p-3">
        <div class="form-group">
            <label>Tên món ăn</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>

        <div class="form-group mt-3">
            <label>Hình ảnh (nếu đổi)</label>
            <input type="file" name="image" class="form-control">
            <img src="{{ asset('storage/'.$product->image) }}" width="120" class="mt-2">
        </div>

        <div class="form-group mt-3">
            <label>Giá</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
        </div>

        <div class="form-group mt-3">
            <label>Nhà cung cấp</label>
            <select name="supplier_id" class="form-control" required>
                @foreach($suppliers as $i)
                <option value="{{ $i->id }}" {{ $product->supplier_id == $i->id ? 'selected' : '' }}>
                    {{ $i->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label>Trạng thái</label>
            <select name="stock" class="form-control">
                <option value="1" {{ $product->stock == 1 ? 'selected' : '' }}>Còn hàng</option>
                <option value="0" {{ $product->stock == 0 ? 'selected' : '' }}>Hết hàng</option>
            </select>
        </div>

        <button class="btn btn-info mt-4 w-100">Cập nhật</button>
    </div>
</form>
@endsection