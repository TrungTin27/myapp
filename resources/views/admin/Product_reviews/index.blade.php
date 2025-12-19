@extends('admin.layout.app')
@section('title')
@lang('Đánh giá sản phẩm')
@endsection
@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><strong>@lang('Đánh giá sản phẩm')</strong></h1>
    </div>
</div>
<div class="filter">
    <form class="" id="food" action="{{ route('product_reviews.index') }}" method="GET">
        <div class="row gutters-5 mb-2 gap-4" style="row-gap: 10px">
            <div class="col-md-8 d-flex search">
                <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6 search_icon" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" class="form-control res-placeholder res-FormControl" id="search" name="search"
                    value="{{ request('search') }}" placeholder="@lang('Tìm kiếm theo tên')">
            </div>
            <div class="col-md-4 text-md-right add-new ">
                <a href="{{ route('product_reviews.create') }}"
                    class="btn btn-info btn-add-food d-flex justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>@lang('Thêm mới')</span>
                </a>
            </div>
            <div class="col-md-2">
                <input type="date" onkeypress='return event.charCode >=48 && event.charCode<=57' autocomplete="off"
                    class="form-control custom-placeholder" name="joined_date" id="joined_date"
                    placeholder="{{ __('Ngày tạo') }}" value="{{ request('joined_date') }}">
            </div>
            <div class="col-md-2">
                <input type="date" onkeypress='return event.charCode >=48 && event.charCode<=57' autocomplete="off"
                    class="form-control custom-placeholder" name="end_date" id="end_date"
                    placeholder="{{ __('Ngày kết thúc') }}" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-2 res-status">
                <button type="submit" class="pl-0 pr-0 btn btn-info w-100 d-flex btn-responsive justify-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span class="custom-FontSize">@lang('Tìm kiếm')</span>
                </button>
            </div>
            <div class="col-md-2 res-status">
                <a href="{{ url()->current() }}"
                    class="pl-0 pr-0 w-25 btn btn-info d-flex btn-responsive justify-content-center w-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span class="custom-FontSize">@lang('Làm mới')</span>
                </a>
            </div>

        </div>
    </form>
</div>
<form action="" id="form-import" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" accept=".csv,.xls,.xlsx" hidden name="file" class="form-control" id="file">
</form>
<div class="card">
    <div class="custom-overflow repon">
        <table class="table ">
            <thead>
                <tr class="text-center">
                    <th class="w-60 font-weight-800">STT</th>
                    <th>@lang('Thuộc sản phẩm')</th>
                    <th>@lang('Id user')</th>
                    <th>@lang('Số sao')</th>
                    <th>@lang('Nội dung đánh giá')</th>
                    <th>@lang('Tên người đánh giá')</th>
                    <th class="w-140">@lang('Trạng thái')</th>
                    <th class="" style="width: 15%;">@lang('Điều chỉnh')</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php($stt = ($products->currentPage() - 1) * $products->perPage())--}}
                @php($stt = ($product_reviews->currentPage() - 1) * $product_reviews->perPage())
                @forelse ($product_reviews as $key => $item)
                <tr class="text-center">
                    <td>{{ ++$stt }}</td>
                    <td class="font-weight-400 align-middle"><img src="{{ asset('storage/' . $item->image) }}" alt="image" width="100"></td>
                    <td class="font-weight-400 align-middle text-overflow">{{ $item->title }}</td>
                    <td class="font-weight-400 align-middle">{{ $item->subtitle}}</td>
                    <td class="font-weight-400 align-middle">{{$item->link}}</td>
                    <td class="font-weight-400 align-middle">{{$item->sort_order}}</td>

                    <td>{{ $item->is_active == 0 ? 'Không hoạt động' : 'Hoạt động' }}</td>
                    <td class="text-center">

                        <a class="btn mb-1 btn-soft-primary btn-icon btn-circle btn-sm"
                            href="{{ route('banners.edit', $item->id) }}" title="@lang('Chỉnh sửa')">
                            <i class="las la-edit"></i>
                        </a>
                        <a class="btn mb-1 btn-soft-danger btn-icon btn-circle click-modal-delete btn-sm" data-id="{{ $item->id }}"
                            href="javascript:void(0);" title="@lang('Xóa')">
                            <i class="las la-trash"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">Không có dữ liệu.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).on('click', '.click-modal-delete', function() {
        let id = $(this).attr('data-id');
        useConfim({
            title: "Xóa sản phẩm",
            text: "{{ __('Bạn có chắc chắn muốn xóa phần từ này không?') }}"
        }).then((result) => {
            $.ajax({
                url: "/admin/product_reviews/" + id,
                type: "POST",
                data: {
                    _method: "DELETE",
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: (res) => {
                    location.reload();
                },
                error: function(err) {
                    console.error(err);
                }
            });
        });
    });
</script>
@endsection