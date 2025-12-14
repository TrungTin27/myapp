@extends('admin.layout.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Edit Course</h2>
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

            <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Title</label>
                    <input type="text" name="title" value="{{ $course->title }}" class="form-control">
                </div>

                {{-- Slug --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Slug</label>
                    <input type="text" name="slug" value="{{ $course->slug }}" class="form-control">
                </div>

                {{-- Short Description --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Short Description</label>
                    <textarea name="short_description" class="form-control" rows="2">{{ $course->short_description }}</textarea>
                </div>

                {{-- Long Description --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Long Description</label>
                    <textarea name="long_description" class="form-control" rows="4">{{ $course->long_description }}</textarea>
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Price</label>
                    <input type="number" name="price" value="{{ $course->price }}" class="form-control">
                </div>

                {{-- Level --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Level</label>
                    <input type="text" name="level" value="{{ $course->level }}" class="form-control">
                </div>

                {{-- Duration --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Duration</label>
                    <input type="text" name="duration" value="{{ $course->duration }}" class="form-control">
                </div>

                {{-- Image --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">Course Image</label>
                    <input type="file" name="image" class="form-control">

                    @if($course->image)
                    <p class="mt-2">Current Image:</p>
                    <img src="{{ asset('uploads/courses/'.$course->image) }}" width="120" class="rounded shadow-sm">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update Course</button>

            </form>

        </div>
    </div>

</div>
@endsection