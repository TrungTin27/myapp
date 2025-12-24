@extends('admin.layout.app')

@section('title', 'Thêm nguyên liệu công thức')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm nguyên liệu công thức</h1>
</div>

<form action="{{ route('recipe_ingredients.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.recipe_ingredients.create', [
    "product_id" => old('title'),
    "products" => old('link'),
    "name" => old('is_active'),
    "amount" => old('image'),
    "order" => old('subtitle'),
    ])
</form>
@endsection