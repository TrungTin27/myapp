@extends('admin.layout.app')

@section('title', 'Cập nhật product_reviews')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Cập nhật đánh giá sản phẩm</h1>
</div>

<form action="{{ route('product_reviews.update',$product_reviews->id) }}" method="PUT" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.product_reviews.form', [
    "product_id" => $product_review->product_id,
    "user_id" => $product_review->user_id,
    "rating" => $product_review->rating,
    "comment" => $product_review->comment,
    "author_name" => $product_review->author_name,
    ])
</form>
@endsection