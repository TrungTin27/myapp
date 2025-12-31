@extends('admin.layout.app')

@section('title', 'Dashboard')

@section('content')

<div class="row mb-4">
    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h6>Posts</h6>
            <h3>{{ $postCount }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h6>Recipes</h6>
            <h3>{{ $recipeCount }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h6>How Tos</h6>
            <h3>{{ $howToCount }}</h3>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center">
            <h6>Contacts</h6>
            <h3>{{ $contactCount }}</h3>
        </div>
    </div>
</div>

<div class="card p-3">
    <h6>Contact mới</h6>
    <ul class="list-group">
        @forelse($latestContacts as $item)
        <li class="list-group-item">
            <strong>{{ $item->name }}</strong> –
            {{ \Illuminate\Support\Str::limit($item->message, 40) }}
        </li>
        @empty
        <li class="list-group-item text-muted">
            Không có contact mới
        </li>
        @endforelse
    </ul>
</div>

@endsection