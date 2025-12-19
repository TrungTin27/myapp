@extends('admin.layout.app')

@section('title')
@lang('Danh sách khóa học')
@endsection

@section('content')

{{-- TITLE --}}
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><strong>@lang('Danh sách khóa học')</strong></h1>
    </div>
</div>

{{-- FILTER --}}
<div class="filter">
    <form action="{{ route('courses.index') }}" method="GET">
        <div class="row gutters-5 mb-2 align-items-center">

            {{-- SEARCH --}}
            <div class="col-md-8">
                <div class="position-relative">
                    <span class="position-absolute top-50 start-0 translate-middle-y ps-3 text-muted">
                        <i class="las la-search"></i>
                    </span>
                    <input type="text"
                        class="form-control pl-5 res-placeholder res-FormControl"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="@lang('Tìm kiếm theo tiêu đề khóa học')">
                </div>
            </div>

            {{-- ADD --}}
            <div class="col-md-4 text-md-right">
                <a href="{{ route('courses.create') }}"
                    class="btn btn-info btn-sm d-inline-flex align-items-center">
                    <i class="las la-plus mr-1"></i>
                    <span>@lang('Thêm mới')</span>
                </a>
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
                    <th class="w-60 font-weight-800">STT</th>
                    <th>@lang('Ảnh')</th>
                    <th>@lang('Tiêu đề')</th>
                    <th>@lang('Slug')</th>
                    <th>@lang('Giá')</th>
                    <th>@lang('Cấp độ')</th>
                    <th>@lang('Thời lượng')</th>
                    <th class="w-140">@lang('Ngày tạo')</th>
                    <th style="width:15%">@lang('Điều chỉnh')</th>
                </tr>
            </thead>

            <tbody>
                @php($stt = 0)

                @forelse($courses as $course)
                <tr class="text-center">
                    <td>{{ ++$stt }}</td>

                    <td>
                        @if($course->image)
                        <img src="{{ asset('uploads/courses/'.$course->image) }}" width="80">
                        @else
                        <span class="text-muted">No image</span>
                        @endif
                    </td>

                    <td class="text-overflow">{{ $course->title }}</td>
                    <td>{{ $course->slug }}</td>
                    <td>{{ number_format($course->price) }} đ</td>
                    <td>{{ $course->level ?? 'N/A' }}</td>
                    <td>{{ $course->duration ?? 'N/A' }}</td>
                    <td>{{ $course->created_at->format('d/m/Y') }}</td>

                    <td class="text-center">
                        <a class="btn mb-1 btn-soft-primary btn-icon btn-circle btn-sm"
                            href="{{ route('courses.edit', $course->id) }}"
                            title="@lang('Chỉnh sửa')">
                            <i class="las la-edit"></i>
                        </a>

                        <form action="{{ route('courses.destroy', $course->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Delete this course?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn mb-1 btn-soft-danger btn-icon btn-circle btn-sm">
                                <i class="las la-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center">
                        @lang('Không có dữ liệu.')
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection