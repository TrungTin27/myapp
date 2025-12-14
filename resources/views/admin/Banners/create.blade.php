@extends('admin.layout.app')

@section('title', 'Thêm banner')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm banner</h1>
</div>

<form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.Banners.form', [
    "title" => old('title'),
    "link" => old('link'),
    "is_active" => old('is_active'),
    "image" => old('image'),
    "subtitle" => old('subtitle'),
    "sort_order"=>old("sort_order"),
    ])
</form>
@endsection