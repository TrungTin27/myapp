@extends('admin.layout.app')

@section('title')
@lang('Posts')
@endsection

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><strong>@lang('Posts')</strong></h1>
    </div>
</div>

{{-- FILTER --}}
<div class="filter mb-3">
    <form action="{{ route('posts.index') }}" method="GET">

        {{-- HÀNG 1 --}}
        <div class="row mb-2 align-items-end">
            {{-- SEARCH --}}
            <div class="col-md-8">
                <label class="small mb-1">@lang('Tìm kiếm')</label>
                <input type="text"
                    class="form-control"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="@lang('Tìm theo tiêu đề bài viết')">
            </div>

            {{-- ADD NEW --}}
            <div class="col-md-4 text-end">
                <a href="{{ route('posts.create') }}"
                    class="btn btn-info w-100">
                    ➕ @lang('Thêm mới')
                </a>
            </div>
        </div>

        {{-- HÀNG 2 --}}
        <div class="row align-items-end">
            {{-- DATE FILTER (GIỮ FORM, KHÔNG DÙNG HIỂN THỊ) --}}
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <label class="small mb-1">@lang('Từ ngày')</label>
                        <input type="date"
                            class="form-control"
                            name="start_date"
                            value="{{ request('start_date') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1">@lang('Đến ngày')</label>
                        <input type="date"
                            class="form-control"
                            name="end_date"
                            value="{{ request('end_date') }}">
                    </div>
                </div>
            </div>

            {{-- ACTION --}}
            <div class="col-md-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-50">
                        🔍 @lang('Tìm kiếm')
                    </button>

                    <a href="{{ url()->current() }}"
                        class="btn btn-secondary w-50">
                        ♻ @lang('Làm mới')
                    </a>
                </div>
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
                    <th style="width:60px">STT</th>
                    <th>@lang('Tiêu đề')</th>
                    <th>@lang('Slug')</th>
                    <th>@lang('Ảnh')</th>
                    <th>@lang('Trending')</th>
                    <th>@lang('Trạng thái')</th>
                    <th style="width:15%">@lang('Điều chỉnh')</th>
                </tr>
            </thead>

            <tbody>
                @php
                $stt = ($Posts->currentPage() - 1) * $Posts->perPage();
                @endphp

                @forelse ($Posts as $item)
                <tr class="text-center">

                    {{-- STT --}}
                    <td>{{ ++$stt }}</td>

                    {{-- TITLE --}}
                    <td class="text-start">{{ $item->title }}</td>

                    {{-- SLUG --}}
                    <td>{{ $item->slug }}</td>

                    {{-- THUMBNAIL --}}
                    <td>
                        @if ($item->thumbnail)
                            <img src="{{ asset('storage/'.$item->thumbnail) }}" width="80">
                        @else
                            —
                        @endif
                    </td>

                    {{-- TRENDING --}}
                    <td>
                        {{ $item->is_trending ? 'Có' : 'Không' }}
                    </td>

                    {{-- STATUS --}}
                    <td>
                        {{ ucfirst($item->status) }}
                    </td>

                    {{-- ACTION --}}
                    <td>
                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                            href="{{ route('posts.edit', $item->id) }}">
                            <i class="las la-edit"></i>
                        </a>

                        <a class="btn mb-1 btn-soft-danger btn-icon btn-circle click-modal-delete btn-sm"
                           data-id="{{ $item->id }}"
                           href="javascript:void(0);" title="@lang('Xóa')">
                            <i class="las la-trash"></i>
                        </a>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="7">Không có dữ liệu</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).on('click', '.click-modal-delete', function () {
    let id = $(this).data('id');

    if (!confirm('Bạn có chắc chắn muốn xóa bài viết này?')) return;

    $.ajax({
        url: "/posts/" + id + "/delete", // ✅ ĐÚNG ROUTE
        type: "POST",
        data: {
            _method: "DELETE",
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function () {
            location.reload();
        },
        error: function (xhr) {
            console.error(xhr.responseText);
            alert('Xóa thất bại');
        }
    });
});
</script>

@endsection
