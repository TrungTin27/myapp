@extends('admin.layout.app')

@section('title', 'Thêm video hướng dẫn')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm video hướng dẫn</h1>
</div>

<form action="{{ route('recipe_videos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.recipe_videos.form', [
    "title" => old('title'),
    "link" => old('link'),
    "is_active" => old('is_active'),
    "image" => old('image'),
    "subtitle" => old('subtitle'),
    "sort_order"=>old("sort_order"),
    ])
</form>
@endsection