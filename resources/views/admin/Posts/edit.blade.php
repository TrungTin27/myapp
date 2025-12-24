@extends('admin.layout.app')

@section('title', 'Cập nhật bài viết')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Cập nhật bài viết </h1>
</div>

<form action="{{ route('posts.update', $recipe->id) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    {{-- Form dùng chung --}}
    @include('admin.Posts.form')

</form>
@endsection