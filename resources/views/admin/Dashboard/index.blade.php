@extends('admin.layout.app')

@section('title', 'Dashboard')

@section('content')

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h6>Posts</h6>
            <h3>{{ $postCount ?? 0 }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h6>Recipes</h6>
            <h3>{{ $recipeCount ?? 0 }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h6>How Tos</h6>
            <h3>{{ $howToCount ?? 0 }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h6>Contacts</h6>
            <h3>{{ $contactCount ?? 0 }}</h3>
        </div>
    </div>
</div>

<div class="card p-3">
    <h6>Contact mới</h6>

    @if(isset($latestContacts) && $latestContacts->count())
    <ul class="list-group">
        @foreach($latestContacts as $item)
        <li class="list-group-item">
            <strong>{{ $item->name ?? 'No name' }}</strong> –
            {{ \Illuminate\Support\Str::limit($item->message ?? '', 40) }}
        </li>
        @endforeach
    </ul>
    @else
    <div class="text-muted">
        Không có contact mới
    </div>
    @endif
</div>

@endsection