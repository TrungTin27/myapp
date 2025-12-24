@extends('admin.layout.app')

@section('title', 'Cập nhật banner')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Cập nhật banner</h1>
</div>

<form action="{{ route('banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    @include('admin.Banners.form', [
    "title" => $banner->title,
    "link" => $banner->link,
    "is_active" => $banner->is_active,
    "image" => $banner->image,
    "subtitle" => $banner->subtitle,
    "sort_order" => $banner->sort_order,
    ])
</form>

@endsection 