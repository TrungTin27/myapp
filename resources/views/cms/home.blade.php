@extends('layouts.app')

@section('title', 'Trang chủ')

@section('banner')
@if($banners->count())
    @foreach($banners as $banner)
        <img
            src="/storage/{{ $banner->image }}"
            alt="{{ $banner->title ?? 'Banner' }}"
            class="main-food-img"
        >

        <div class="food-box">
            <h2>{{ $banner->title }}</h2>
            <p>{{ $banner->subtitle }}</p>
        </div>
    @endforeach
@else
    <img src="{{ asset('images/banner.png') }}" class="main-food-img">
@endif
@endsection
