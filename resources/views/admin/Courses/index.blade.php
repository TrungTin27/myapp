@extends('admin.layout.app')


@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold">Courses List</h2>
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add New Course</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Short Description</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Level</th>
                        <th>Duration</th>
                        <th>Created At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->slug }}</td>
                        <td>{{ Str::limit($course->short_description, 50) }}</td>
                        <td>
                            @if($course->image)
                            <img src="{{ asset('uploads/courses/'.$course->image) }}" width="70" class="rounded">
                            @else
                            <span class="text-muted">No image</span>
                            @endif
                        </td>
                        <td>{{ number_format($course->price) }} đ</td>
                        <td>{{ $course->level ?? 'N/A' }}</td>
                        <td>{{ $course->duration ?? 'N/A' }}</td>
                        <td>{{ $course->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this course?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center py-3 text-muted">No courses found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection