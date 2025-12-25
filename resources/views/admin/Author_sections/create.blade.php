@extends('admin.layout.app')

@section('title', 'Thêm ')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Thêm </h1>
</div>

<form action="{{ route('author_sections.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.Author_sections.form', [
    "title" => old('title'),
    "description" => old('description'),
    "image" => old('image'),
    "button_text" => old('button_text'),
    "button_link" => old('button_link'),
    "is_active"=>old("is_active"),
    "sort_order"=>old("sort_order"),
    ])
</form>
@endsection