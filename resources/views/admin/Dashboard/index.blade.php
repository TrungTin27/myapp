@extends('admin.layout.app')

@section('title', 'Dashboard')

@section('content')

{{-- 🔹 CARD THỐNG KÊ --}}
<div class="row mb-4">
    <div class="col-md-3">Banner: {{ $bannerCount }}</div>
    <div class="col-md-3">Posts: {{ $postCount }}</div>
    <div class="col-md-3">Recipes: {{ $recipeCount }}</div>
    <div class="col-md-3">Messages: {{ $unreadContacts->count() }}</div>
</div>

{{-- 🔹 CONTACT MESSAGES --}}
<div class="card mb-4">
    <div class="card-header">
        <h5>📩 Contact mới</h5>
    </div>
    <div class="card-body">
        <ul>
            @forelse($unreadContacts as $msg)
            <li>
                <strong>{{ $msg->name }}</strong> –
                {{ Str::limit($msg->message, 30) }}
            </li>
            @empty
            <li>Không có tin nhắn mới</li>
            @endforelse
        </ul>
    </div>
</div>

{{-- 🔹 TRẠNG THÁI SECTION --}}
<div class="card">
    <div class="card-header">
        <h5>⚙ Trạng thái section</h5>
    </div>
    <div class="card-body">
        <ul>
            <li>Author: {{ $authorActive ? 'Bật' : 'Tắt' }}</li>
            <li>Learn How To: {{ $howToActive ? 'Bật' : 'Tắt' }}</li>
        </ul>
    </div>
</div>

@endsection