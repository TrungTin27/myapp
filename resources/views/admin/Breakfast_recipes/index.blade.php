@extends('admin.layout.app')

@section('title')
@lang('Breakfast_recipes')
@endsection

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><strong>@lang('Breakfast_recipes')</strong></h1>
    </div>
</div>

{{-- FILTER --}}
<div class="filter mb-3">
    <form action="{{ route('breakfast_recipes.index') }}" method="GET">

        {{-- HÀNG 1 --}}
        <div class="row mb-2 align-items-end">
            {{-- SEARCH --}}
            <div class="col-md-8">
                <label class="small mb-1">@lang('Tìm kiếm')</label>
                <input type="text"
                    class="form-control"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="@lang('Tìm theo tên món')">
            </div>

            {{-- ADD NEW --}}
            <div class="col-md-4 text-end">
                <a href="{{ route('breakfast_recipes.create') }}"
                    class="btn btn-info w-100">
                    ➕ @lang('Thêm mới')
                </a>
            </div>
        </div>

        {{-- HÀNG 2 --}}
        <div class="row align-items-end">
            {{-- DATE FILTER (THẲNG CỘT SEARCH) --}}
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

            {{-- ACTION BUTTON (THẲNG CỘT ADD NEW) --}}
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
                    <th>@lang('Tên món')</th>
                    <th>@lang('URL')</th>
                    <th>@lang('Ảnh')</th>
                    <th>@lang('Giá công thức')</th>
                    <th>@lang('Giá serving')</th>
                    <th>@lang('Trạng thái')</th>
                    <th style="width:15%">@lang('Điều chỉnh')</th>
                </tr>
            </thead>

            <tbody>
                @php
                $stt = ($Breakfast_recipes->currentPage() - 1) * $Breakfast_recipes->perPage();
                @endphp

                @forelse ($Breakfast_recipes as $item)
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

                    <td>{{ $item->recipe_price ?? '—' }}</td>

                    <td>{{ $item->serving_price ?? '—' }}</td>

                    <td>{{ ucfirst($item->status) }}</td>

                    <td>
                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                            href="{{ route('breakfast_recipes.edit', $item->id) }}">
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

    if (!confirm('Bạn có chắc chắn muốn xóa món này?')) return;

    $.ajax({
        url: "{{ url('admin/breakfast_recipes') }}/" + id,
        type: "POST",
        data: {
            _method: "DELETE",
            _token: "{{ csrf_token() }}"
        },
        success: function () {
            location.reload();
        },
        error: function (err) {
            console.error(err);
            alert('Xóa thất bại');
        }
    });
});
</script>

@endsection
