@extends('admin.layouts.app')
@section('title', 'Lessons')
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
            <h1 class="display-5 fw-bold mb-0">Lessons</h1>
            <a href="{{ route('admin.lessons.create') }}" class="btn btn-outline-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg me-1" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                </svg>
                Add Lesson
            </a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="py-3">ID</th>
                            <th scope="col" class="py-3">Course</th>
                            <th scope="col" class="py-3">Title</th>
                            <th scope="col" class="py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <td class="py-3">{{ $lesson->id }}</td>
                                <td class="py-3">{{ $lesson->course->title }}</td>
                                <td class="py-3">{{ $lesson->title }}</td>
                                <td class="py-3">
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('admin.lessons.show', $lesson->id) }}" class="btn btn-outline-success btn-sm">View</a>
                                        <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
