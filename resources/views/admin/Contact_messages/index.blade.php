@extends('admin.layout.app')

@section('title', 'Contact')

@section('content')
<div class="aiz-titlebar text-left mt-2 mb-3">
    <div class="align-items-center">
        <h1 class="h3"><strong>Contact</strong></h1>
    </div>
</div>

{{-- FILTER --}}
<div class="filter mb-3">
    <form action="{{ route('contact_messages.index') }}" method="GET">

        {{-- HÀNG 1 --}}
        <div class="row mb-2 align-items-end">

            {{-- SEARCH --}}
            <div class="col-md-8">
                <label class="small mb-1">Tìm kiếm</label>
                <input type="text"
                    name="search"
                    class="form-control"
                    value="{{ request('search') }}"
                    placeholder="Tìm theo First name hoặc Email">
            </div>

            {{-- EMPTY (KHÔNG ADD NEW) --}}
            <div class="col-md-4"></div>
        </div>

        {{-- HÀNG 2 --}}
        <div class="row align-items-end">

            {{-- DATE FILTER --}}
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <label class="small mb-1">Từ ngày</label>
                        <input type="date"
                            name="start_date"
                            class="form-control"
                            value="{{ request('start_date') }}">
                    </div>

                    <div class="col-md-6">
                        <label class="small mb-1">Đến ngày</label>
                        <input type="date"
                            name="end_date"
                            class="form-control"
                            value="{{ request('end_date') }}">
                    </div>
                </div>
            </div>

            {{-- ACTION --}}
            <div class="col-md-4">
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-50">
                        🔍 Tìm kiếm
                    </button>

                    <a href="{{ url()->current() }}" class="btn btn-secondary w-50">
                        ♻ Làm mới
                    </a>
                </div>
            </div>
        </div>

    </form>
</div>

{{-- TABLE --}}
<div class="card">
    <div class="custom-overflow">
        <table class="table text-center">
            <thead>
                <tr>
                    <th style="width:60px">STT</th>
                    <th>First name</th>
                    <th>Email address</th>
                    <th style="width:120px">Tùy chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @php
                $stt = ($contacts->currentPage() - 1) * $contacts->perPage();
                @endphp

                @forelse ($contacts as $item)
                <tr>
                    <td>{{ ++$stt }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        <form action="{{ route('contact.delete', $item->id) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Bạn chắc chắn muốn xoá?')">
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
                    <td colspan="4">Không có dữ liệu</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection