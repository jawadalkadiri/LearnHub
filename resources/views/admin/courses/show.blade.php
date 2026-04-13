@extends('admin.layouts.app')
@section('title','View Course')
@section('content')
<div class="py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold">View Course</h1>
        </div>
    </div>

    {{-- Course Info --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="{{ asset('storage/' . $course->img_path) }}" class="img-fluid rounded-start w-100 h-100" style="object-fit: cover; min-height: 200px;">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h4 class="card-title">{{ $course->title }}</h4>
                    <p class="card-text text-muted">{{ $course->description }}</p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('admin.courses.edit', $course->id) }}" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-pencil me-1" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.527 3.821 3.821-1.527.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                            </svg>
                            Edit Course
                        </a>
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-secondary btn-sm">Back to Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Students & Teachers --}}
    <div class="row mb-4">
        <div class="col-md-6 mb-3 mb-md-0">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people me-1" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.001.002-.002.001-.003.001-.004.001-.005.001zm.46-6.001A3.5 3.5 0 1 0 4 4.99a3.5 3.5 0 0 0 3.488 3.01z"/>
                        </svg>
                        Enrolled Students ({{ $course->enrolledBy->count() }})
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        @forelse($course->enrolledBy as $enrolled)
                            <span class="badge rounded-pill bg-success">{{ $enrolled->name }}</span>
                        @empty
                            <span class="text-muted fst-italic">No students enrolled yet</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge me-1" viewBox="0 0 16 16">
                            <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 11 1zm-5.5 0A.5.5 0 0 0 5 1.5v1a.5.5 0 0 0 1 0v-1A.5.5 0 0 0 5.5 1zM3 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 1 0v-1A.5.5 0 0 0 3 1zM1.5 5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm11 0a.5.5 0 0 0 .5-.5h-1a.5.5 0 0 0 0 1h1a.5.5 0 0 0 .5-.5zM1 8a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 0-1h-1A.5.5 0 0 0 1 8zm13 0a.5.5 0 0 1 .5.5h-1a.5.5 0 0 1 0-1h1a.5.5 0 0 1 .5.5zM2.5 11a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zM12.5 11a.5.5 0 1 0 0 1h1a.5.5 0 0 0 0-1z"/>
                            <path d="M4.5 3a1.5 1.5 0 0 0-1 2.736V13A1.5 1.5 0 0 0 5 14.5h6a1.5 1.5 0 0 0 1.5-1.5V5.736A1.5 1.5 0 0 0 11.5 3zM6 12V5h4v7z"/>
                        </svg>
                        Teachers ({{ $course->teachedBy->count() }})
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        @forelse($course->teachedBy as $teacher)
                            <span class="badge rounded-pill bg-primary">{{ $teacher->name }}</span>
                        @empty
                            <span class="text-muted fst-italic">No teachers assigned yet</span>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Enrollment --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header py-3">
            <h6 class="mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus me-1" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s3 0 5-3c1.798 0 3.183 1.745 3.5 2.194.293.416.5.959.5 1.806s-.207 1.39-.5 1.806c-.317.45-1.702 2.194-3.5 2.194s-5-3-5-3"/>
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                </svg>
                Add Enrollment
            </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.enrollments.store', $course->id) }}">
                @csrf
                <div class="row g-2 align-items-center">
                    <div class="col-12 col-md-10">
                        <select class="form-select" name="user_id[]" multiple size="5">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}"
                                    {{ in_array($user->id, $course->enrolledBy->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $user->name }} ({{ $user->email }})
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Hold Ctrl/Cmd to select multiple users</div>
                    </div>
                    <div class="col-12 col-md-2">
                        <button class="btn btn-primary w-100">Add Selected</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Add Teacher --}}
    <div class="card shadow-sm border-0">
        <div class="card-header py-3">
            <h6 class="mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge me-1" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-1 0v-1A.5.5 0 0 1 11 1zm-5.5 0A.5.5 0 0 0 5 1.5v1a.5.5 0 0 0 1 0v-1A.5.5 0 0 0 5.5 1zM3 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 1 0v-1A.5.5 0 0 0 3 1zM1.5 5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm11 0a.5.5 0 0 0 .5-.5h-1a.5.5 0 0 0 0 1h1a.5.5 0 0 0 .5-.5zM1 8a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 0-1h-1A.5.5 0 0 0 1 8zm13 0a.5.5 0 0 1 .5.5h-1a.5.5 0 0 1 0-1h1a.5.5 0 0 1 .5.5zM2.5 11a.5.5 0 0 0 0 1h1a.5.5 0 0 0 0-1zM12.5 11a.5.5 0 1 0 0 1h1a.5.5 0 0 0 0-1z"/>
                    <path d="M4.5 3a1.5 1.5 0 0 0-1 2.736V13A1.5 1.5 0 0 0 5 14.5h6a1.5 1.5 0 0 0 1.5-1.5V5.736A1.5 1.5 0 0 0 11.5 3zM6 12V5h4v7z"/>
                </svg>
                Add Teacher
            </h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.teachers.store', $course->id) }}">
                @csrf
                <div class="row g-2 align-items-center">
                    <div class="col-12 col-md-10">
                        <select class="form-select" name="teacher_id[]" multiple size="5">
                            @foreach($users->where('role', 'teacher') as $user)
                                <option value="{{ $user->id }}"
                                    {{ in_array($user->id, $course->teachedBy->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Hold Ctrl/Cmd to select multiple teachers</div>
                    </div>
                    <div class="col-12 col-md-2">
                        <button class="btn btn-primary w-100">Add Selected</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
