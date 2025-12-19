@extends('admin.layout.app')

@section('title', 'Thêm chi tiết sản phẩm')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm chi tiết sản phẩm</h1>
</div>

<form action="{{ route('product_details.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.product_details.form', [
    "title" => old('title'),
    "link" => old('link'),
    "is_active" => old('is_active'),
    "image" => old('image'),
    "subtitle" => old('subtitle'),
    "sort_order"=>old("sort_order"),
    ])
</form>
@endsection