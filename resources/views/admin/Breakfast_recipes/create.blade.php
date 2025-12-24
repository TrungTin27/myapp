@extends('admin.layout.app')

@section('title', 'Thêm ')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm </h1>
</div>

<form action="{{ route('breakfast_recipes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.Breakfast_recipes.form', [
    "title" => old('title'),
    "slug" => old('slug'),
    "thumbnail" => old('thumbnail'),
    "recipe_price" => old('recipe_price'),
    "serving_price" => old('serving_price'),
    "is_featured"=>old("is_featured"),
    "status"=>old("status"),
    ])
</form>
@endsection