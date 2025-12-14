@extends('admin.layout.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Create New Course</h2>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter Course Title" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="3" placeholder="Enter short description"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Price (đ)</label>
                        <input type="number" name="price" class="form-control" placeholder="Enter price">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Level</label>
                        <select name="level" class="form-control">
                            <option value="">Select level</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-semibold">Duration</label>
                        <input type="text" name="duration" class="form-control" placeholder="Ex: 10 hours">
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">Create Course</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection