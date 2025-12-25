@extends('admin.layout.app')

@section('title', 'Thêm ')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm </h1>
</div>

<form action="{{ route('reader_favorites.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.Reader_favorites.form', [
    "title" => old('title'),
    "slug" => old('slug'),
    "thumbnail" => old('thumbnail'),
    "rating" => old('rating'),
    "excerpt" => old('excerpt'),
    "is_active"=>old("is_active"),
    "sort_order"=>old("sort_order"),
    ])
</form>
@endsection