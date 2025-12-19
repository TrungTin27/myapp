@extends('admin.layout.app')

@section('title', 'Thêm nguyên liệu công thức')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm nguyên liệu công thức</h1>
</div>

<form action="{{ route('recipe_ingredients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.recipe_ingredients.form', [
    "title" => old('title'),
    "link" => old('link'),
    "is_active" => old('is_active'),
    "image" => old('image'),
    "subtitle" => old('subtitle'),
    "sort_order"=>old("sort_order"),
    ])
</form>
@endsection