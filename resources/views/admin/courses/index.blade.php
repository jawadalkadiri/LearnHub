@extends('admin.layouts.app')
@section('title', 'Courses')
@section('content')
<div class="py-4">
    @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="display-5 fw-bold mb-0">Courses</h1>
            <a href="{{ route('admin.courses.create') }}" class="btn btn-outline-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg me-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                Add Course
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="py-3">ID</th>
                            <th scope="col" class="py-3">Image</th>
                            <th scope="col" class="py-3">Title</th>
                            <th scope="col" class="py-3">Category</th>
                            <th scope="col" class="py-3">Description</th>
                            <th scope="col" class="py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr>
                                <td class="py-3">{{ $course->id }}</td>
                                <td class="py-3">
                                    <img src="{{ asset('storage/' . $course->img_path) }}"
                                        class="rounded img-fluid"
                                        style="width:60px; height:60px; object-fit:cover;">
                                </td>
                                <td class="py-3">{{ $course->title }}</td>
                                <td class="py-3">
                                    {{ $course->category?->name ?? '—' }}
                                </td>
                                <td class="py-3">{{ Str::limit($course->description, 50) }}</td>
                                <td class="py-3">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-outline-success btn-sm">View</a>
                                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
