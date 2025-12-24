@extends('admin.layout.app')

@section('title', 'Contact')

@section('content')

<div class="aiz-titlebar mt-2 mb-3">
    <h1 class="h3"><strong>Contact</strong></h1>
</div>

{{-- SEARCH ONLY --}}
<div class="filter mb-3" style="display: flex;">
    <div style="width: 70%">
        <form action="{{ route('contact_messages.index') }}" method="GET">
            <div class="row">
                <div class="col-md-8">
                    <input type="text"
                        name="search"
                        class="form-control"
                        value="{{ request('search') }}"
                        placeholder="Tìm theo First name hoặc Email">
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-1" style="width: 30%;">
        <button type="button"
            class="btn btn-info btn-sm w-100 d-flex justify-content-center align-items-center"
            disabled>
            <i class="las la-search"></i>
        </button>
    </div>
</div>

{{-- TABLE --}}
<div class="card">
    <div class="custom-overflow">
        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th class="w-60">STT</th>
                    <th>First name</th>
                    <th>Email address</th>
                    <th>Tùy chỉnh</th>
                </tr>
            </thead>
            <tbody>
                @php($stt = ($contacts->currentPage() - 1) * $contacts->perPage())
                @forelse ($contacts as $item)
                <tr>
                    <td>{{ ++$stt }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td class="text-center">
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
                    <td colspan="3">Không có dữ liệu</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection