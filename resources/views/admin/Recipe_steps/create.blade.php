@extends('admin.layout.app')

@section('title', 'Thêm các bước công thức')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm các bước công thức</h1>
</div>

<form action="{{ route('recipe_steps.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.recipe_steps.form', [
    "title" => old('title'),
    "link" => old('link'),
    "is_active" => old('is_active'),
    "image" => old('image'),
    "subtitle" => old('subtitle'),
    "sort_order"=>old("sort_order"),
    ])
</form>
@endsection