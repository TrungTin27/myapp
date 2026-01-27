@extends('admin.layout.app')

@section('title')
@lang('Author_sections')
@endsection

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><strong>@lang('Author_sections')</strong></h1>
    </div>
</div>

{{-- ================= FILTER ================= --}}
<div class="filter mb-3">
    <form action="{{ route('author_sections.index') }}" method="GET">

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
                <a href="{{ route('author_sections.create') }}"
                    class="btn btn-info w-100">
                    ➕ @lang('Thêm mới')
                </a>
            </div>
        </div>

        {{-- HÀNG 2 --}}
        <div class="row align-items-end">
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

{{-- ================= TABLE ================= --}}
<div class="card">
    <div class="custom-overflow repon">
        <table class="table">
            <thead>
                <tr class="text-center">
                    <th style="width:60px">STT</th>
                    <th>@lang('Tiêu đề')</th>
                    <th>@lang('Ảnh')</th>
                    <th>@lang('Mô tả')</th>
                    <th>@lang('Hiển thị')</th>
                    <th style="width:15%">@lang('Điều chỉnh')</th>
                </tr>
            </thead>

            <tbody>
                @php
                    $stt = ($Author_sections->currentPage() - 1) * $Author_sections->perPage();
                @endphp

                @forelse ($Author_sections as $item)
                <tr class="text-center">
                    <td>{{ ++$stt }}</td>

                    <td>{{ $item->title }}</td>

                    <td>
                        @if ($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}" width="80">
                        @else
                            —
                        @endif
                    </td>

                    <td>{{ Str::limit($item->description, 50) }}</td>

                    <td>{{ $item->is_active ? 'Bật' : 'Tắt' }}</td>

                    <td>
                        {{-- EDIT --}}
                        <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                            href="{{ route('author_sections.edit', $item->id) }}">
                            <i class="las la-edit"></i>
                        </a>

                        {{-- DELETE --}}
                        <a class="btn btn-soft-danger btn-icon btn-circle btn-sm click-modal-delete"
                            data-id="{{ $item->id }}"
                            href="javascript:void(0);">
                            <i class="las la-trash"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">Không có dữ liệu</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script> $(document).on('click', '.click-modal-delete', function (

) 
{ let id = $(this).data('id');
 if (!confirm('Bạn có chắc chắn muốn xóa mục này?')) 
    return;
  $.ajax({ url: "{{ route('author_sections.destroy', ':id') }}"
  .replace(':id', id), 
  type: "POST", 
  data: { _method: "DELETE", _token: "{{ csrf_token() }}" }, 
  success: function (res) { location.reload(); }, 
  error: function (err) { console.error(err); alert('Xóa thất bại'); 

  } 
}); 
}); 

</script>
@endsection
