@extends('admin.layout.app')

@section('title', 'Cập nhật ')

@section('content')
<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3">Cập nhật </h1>
</div>

<form action="{{ route('how_tos.update', $recipe->id) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    {{-- Form dùng chung --}}
    @include('admin.how_tos.form')

</form>
@endsection