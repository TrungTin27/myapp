@extends('admin.layout.app')

@section('title', 'Thêm bài viết')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm bài viết</h1>
</div>

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    @include('admin.Posts.form', [
        'post' => null
    ])

</form>
@endsection
