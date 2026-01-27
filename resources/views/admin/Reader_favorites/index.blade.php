@extends('admin.layout.app')

@section('title')
@lang('Reader_favorites')
@endsection

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><strong>@lang('Reader_favorites')</strong></h1>
    </div>
</div>

{{-- FILTER --}}
<div class="filter mb-3">
    <form action="{{ route('reader_favorites.index') }}" method="GET">

        {{-- HÀNG 1 --}}
        <div class="row mb-2 align-items-end">
            {{-- SEARCH --}}
            <div class="col-md-8">
                <label class="small mb-1">@lang('Tìm kiếm')</label>
                <input type="text"
                    class="form-control"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="@lang('Tìm theo tiêu đề')">
            </div>

            {{-- ADD NEW --}}
            <div class="col-md-4 text-end">
                <a href="{{ route('reader_favorites.create') }}"
                    class="btn btn-info w-100">
                    ➕ @lang('Thêm mới')
                </a>
            </div>
        </div>

        {{-- HÀNG 2 --}}
        <div class="row align-items-end">
            {{-- DATE FILTER --}}
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <label class="small mb-1">@lang('Từ ngày')</label>
                        <input type="date"
                            class="form-control"
                            name="from_date"
                            value="{{ request('from_date') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="small mb-1">@lang('Đến ngày')</label>
                        <input type="date"
                            class="form-control"
                            name="to_date"
                            value="{{ request('to_date') }}">
                    </div>
                </div>
            </div>

            {{-- ACTION BUTTON --}}
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
                    <th>@lang('Rating')</th>
                    <th>@lang('Mô tả')</th>
                    <th>@lang('Hiển thị')</th>
                    <th style="width:15%">@lang('Điều chỉnh')</th>
                </tr>
            </thead>

            <tbody>
                @php
                $stt = ($Reader_favorites->currentPage() - 1) * $Reader_favorites->perPage();
                @endphp

                @forelse ($Reader_favorites as $item)
                <tr class="text-center">

                    <td>{{ ++$stt }}</td>

                    <td>{{ $item->title }}</td>

                    <td>{{ $item->slug }}</td>

                    <td>
                        @if ($item->thumbnail)
                        <img src="{{ asset('storage/'.$item->thumbnail) }}" width="80">
                        @else
                        —
                        @endif
                    </td>

                    <td>{{ number_format($item->rating, 1) }} ⭐</td>

                    <td class="text-start">
                        {{ Str::limit($item->excerpt, 80) }}
                    </td>

                    <td>
                        {{ $item->is_active ? 'Hiển thị' : 'Ẩn' }}
                    </td>

                    <td>
                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                            href="{{ route('reader_favorites.edit', $item->id) }}">
                            <i class="las la-edit"></i>
                        </a>

                        <a class="btn btn-soft-danger btn-icon btn-circle btn-sm click-modal-delete"
                            data-id="{{ $item->id }}"
                            href="javascript:void(0);">
                            <i class="las la-trash"></i>
                        </a>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="9">Không có dữ liệu</td>
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

    if (!confirm('Bạn có chắc chắn muốn xóa mục này?')) return;

    $.ajax({
        url: "{{ route('reader_favorites.destroy', ':id') }}".replace(':id', id),
        type: "POST",
        data: {
            _method: "DELETE",
            _token: "{{ csrf_token() }}"
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