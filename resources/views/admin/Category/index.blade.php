@extends('admin.layout.app')

@section('title')
@lang('Danh mục')
@endsection

@section('content')

<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><strong>@lang('Danh sách danh mục')</strong></h1>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- FILTER --}}
<div class="filter mb-3">
    <form class="">
        <div class="row gutters-5 align-items-center">

            {{-- SEARCH --}}
            <div class="col-md-6 d-flex search">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-6 w-6 search_icon"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>

                <input type="text"
                    class="form-control res-placeholder res-FormControl"
                    placeholder="@lang('Tìm kiếm danh mục')"
                    disabled>
            </div>

            {{-- ADD --}}
            <div class="col-md-3">
                <a href="{{ route('category.create') }}"
                    class="btn btn-info btn-sm w-100 d-flex justify-content-center align-items-center">
                    <i class="las la-plus mr-1"></i>
                    <span>@lang('Thêm mới')</span>
                </a>
            </div>

            {{-- SEARCH BUTTON --}}
            <div class="col-md-1">
                <button type="button"
                    class="btn btn-info btn-sm w-100 d-flex justify-content-center align-items-center"
                    disabled>
                    <i class="las la-search"></i>
                </button>
            </div>

            {{-- RESET --}}
            <div class="col-md-1">
                <button type="button"
                    class="btn btn-secondary btn-sm w-100 d-flex justify-content-center align-items-center"
                    disabled>
                    <i class="las la-redo-alt"></i>
                </button>
            </div>

        </div>
    </form>
</div>

{{-- TABLE --}}
<div class="card">
    <div class="custom-overflow repon">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th width="5%">ID</th>
                    <th>@lang('Tên')</th>
                    <th>@lang('Slug')</th>
                    <th>@lang('Icon')</th>
                    <th>@lang('Mô tả')</th>
                    <th width="15%">@lang('Điều chỉnh')</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories ?? [] as $item)
                <tr class="text-center">
                    <td>{{ $item->id }}</td>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">{{ $item->slug }}</td>
                    <td class="align-middle">
                        @if($item->icon)
                        <img src="{{ asset('storage/'.$item->icon) }}" width="36">
                        @endif
                    </td>
                    <td class="align-middle">{{ $item->description }}</td>
                    <td class="text-center">
                        <form action="{{ route('category.destroy', $item->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-soft-danger btn-icon btn-circle btn-sm">
                                <i class="las la-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-3 text-muted">
                        @lang('Không có dữ liệu.')
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection