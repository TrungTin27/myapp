@extends('admin.layout.app')

@section('title', 'Thêm bài viết ')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm bài viết </h1>
</div>

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.Posts.form', [
    "title" => old('title'),
    "slug" => old('slug'),
    "thumbnail" => old('thumbnail'),
    "content" => old('content'),
    "excerpt" => old('excerpt'),
    "is_trending"=>old("is_trending"),
    "status"=>old("status"),
    "published_at"=>old("published_at"),
    ])
</form>
@endsection