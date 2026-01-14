@extends('admin.layout.app')

@section('title')
@lang('Banner')
@endsection

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><strong>@lang('Danh sách banner')</strong></h1>
    </div>
</div>

{{-- FILTER --}}
<div class="filter mb-3">
    <form action="{{ route('banners.index') }}" method="GET">

        {{-- HÀNG 1 --}}
        <div class="row mb-2 align-items-end">

            {{-- SEARCH --}}
            <div class="col-md-8">
                <label class="small mb-1">@lang('Tìm kiếm')</label>
                <input type="text"
                    class="form-control"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="@lang('Tìm theo tên banner')">
            </div>

            {{-- ADD NEW --}}
            <div class="col-md-4 text-end">
                <a href="{{ route('banners.create') }}"
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
                            name="joined_date"
                            value="{{ request('joined_date') }}">
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
                    <th>@lang('Ảnh')</th>
                    <th>@lang('Tên')</th>
                    <th>@lang('Dòng phụ')</th>
                    <th>@lang('Link')</th>
                    <th>@lang('Thứ tự')</th>
                    <th>@lang('Trạng thái')</th>
                    <th style="width:15%">@lang('Điều chỉnh')</th>
                </tr>
            </thead>

            <tbody>
                @php
                $stt = ($Banners->currentPage() - 1) * $Banners->perPage();
                @endphp

                @forelse ($Banners as $item)
                <tr class="text-center">

                    {{-- STT --}}
                    <td>{{ ++$stt }}</td>

                    {{-- IMAGE --}}
                    <td>
                        @if ($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" width="80">
                        @else
                        —
                        @endif
                    </td>

                    {{-- TITLE --}}
                    <td class="text-start">{{ $item->title }}</td>

                    {{-- SUBTITLE --}}
                    <td>{{ $item->subtitle ?? '—' }}</td>

                    {{-- LINK --}}
                    <td>{{ $item->link ?? '—' }}</td>

                    {{-- SORT ORDER --}}
                    <td>{{ $item->sort_order }}</td>

                    {{-- STATUS --}}
                    <td>
                        {{ $item->is_active ? 'Hoạt động' : 'Không hoạt động' }}
                    </td>

                    {{-- ACTION --}}
                    <td>
                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                            href="{{ route('banners.edit', $item->id) }}">
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
                    <td colspan="8">Không có dữ liệu</td>
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

    if (!confirm('Bạn có chắc chắn muốn xóa banner này?')) return;

    $.ajax({
        url: "{{ route('banners.delete', ':id') }}".replace(':id', id),
        type: "POST",
        data: {
            _method: "DELETE",
            _token: "{{ csrf_token() }}"
        },
        success: function (res) {
            location.reload();
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            alert('Xóa thất bại');
        }
    });
});
</script>

@endsection