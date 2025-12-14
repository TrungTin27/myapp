@extends('admin.layout.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between mb-3">
        <h2 class="fw-bold">Category List</h2>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Add New Category</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <table class="table table-bordered table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th width="5%">ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Icon</th>
                        <th>Description</th>
                        <th width="20%" class="text-center">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>






                        <td class="text-center">


                            <form class="d-inline"

                                method="POST"
                                onsubmit="return confirm('Delete this category?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="6" class="text-center py-3 text-muted">
                            No categories found.
                        </td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection