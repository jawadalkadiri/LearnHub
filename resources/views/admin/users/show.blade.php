@extends('admin.layouts.app')
@section('title','View User')
@section('content')
<div class="py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold">View User</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-6 mb-4 mb-md-0">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-4">User Information</h5>

                    <div class="mb-3">
                        <label class="text-muted small text-uppercase">Name</label>
                        <p class="mb-0 fw-semibold">{{ $user->name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted small text-uppercase">Email</label>
                        <p class="mb-0 fw-semibold">{{ $user->email }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted small text-uppercase">Role</label>
                        <p class="mb-0">
                            <span class="badge {{ $user->role === 'teacher' ? 'bg-primary' : 'bg-secondary' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </p>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil me-1" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168z"/>
                            </svg>
                            Edit User
                        </a>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">Back to Users</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-4">Enrolled Courses</h5>

                    @if($user->enrolledCourses && $user->enrolledCourses->count() > 0)
                        <div class="list-group">
                            @foreach($user->enrolledCourses as $course)
                                <div class="list-group-item">
                                    <div class="d-flex w-100 justify-content-between align-items-start">
                                        <div>
                                            <h6 class="mb-1">{{ $course->title }}</h6>
                                            <p class="mb-0 text-muted small">{{ Str::limit($course->description, 80) }}</p>
                                        </div>
                                        <div class="d-flex gap-1 ms-2">
                                            <a href="{{ route('admin.courses.show', $course->id) }}" class="btn btn-outline-secondary btn-sm">View</a>
                                            <form action="{{ route('admin.enrollments.destroy', [$user->id, $course->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Unenroll this user?')">Unenroll</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-inbox text-muted mb-3" viewBox="0 0 16 16">
                                <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4zm-4.98 0a.5.5 0 0 1 .39.188L3.44 8H1.54l3.05-3.812A.5.5 0 0 1 4.98 4zM13 10H1.54l3.05 3.812a.5.5 0 0 0 .39.188H6a.5.5 0 0 1 0 1 1.5.5 0 0 1-3 0 .5.5 0 0 1-1 0H1.54l3.05 3.812a.5.5 0 0 0 .39.188h9.04l-3.05-3.812a.5.5 0 0 0-.39-.188H10a.5.5 0 0 1 0-1 1.5.5 0 0 1 3 0 .5.5 0 0 1 1 0z"/>
                            </svg>
                            <p class="text-muted">No courses enrolled</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
