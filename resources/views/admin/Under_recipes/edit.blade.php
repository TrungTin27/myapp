@extends('admin.layout.app')

@section('title', 'Cập nhật công thức')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Cập nhật công thức</h1>
</div>

<form action="{{ route('under_recipes.update', $recipe->id) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    {{-- Form dùng chung --}}
    @include('admin.Under_recipes.form')

</form>
@endsection