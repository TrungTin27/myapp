@extends('admin.layout.app')

@section('title', 'Thêm từng phần công thức nấu ăn')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm từng phần công thức nấu ăn</h1>
</div>

<form action="{{ route('recipe_sections.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.recipe_sections.form', [
    "title" => old('title'),
    "link" => old('link'),
    "is_active" => old('is_active'),
    "image" => old('image'),
    "subtitle" => old('subtitle'),
    "sort_order"=>old("sort_order"),
    ])
</form>
@endsection