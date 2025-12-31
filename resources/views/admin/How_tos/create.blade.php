@extends('admin.layout.app')

@section('title', 'Thêm ')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm </h1>
</div>

<form action="{{ route('how_tos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.How_tos.form', [
    "title" => old('title'),
    "slug" => old('slug'),
    "thumbnail" => old('thumbnail'),
    "is_active" => old('is_active'),
    "sort_order" => old('sort_order'),
    ])
</form>
@endsection