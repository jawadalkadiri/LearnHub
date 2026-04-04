@extends('admin.layouts.app')
@section('title','View Lesson')
@section('content')
<div class="py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold">View Lesson</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body p-0">
                    <video class="w-100 rounded" style="max-height: 400px; object-fit: contain;" controls>
                        <source src="{{ asset('storage/' . $lesson->video_path) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-muted mb-3">Lesson Details</h5>

                    <div class="mb-3">
                        <label class="text-muted small text-uppercase">Title</label>
                        <h6 class="mb-0 fw-semibold">{{ $lesson->title }}</h6>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted small text-uppercase">Description</label>
                        <p class="mb-0">{{ $lesson->description }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="text-muted small text-uppercase">Course</label>
                        <p class="mb-0">
                            <span class="badge bg-primary">{{ $lesson->course->title }}</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column gap-2">
                <a href="{{ route('admin.lessons.edit', $lesson->id) }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil me-1" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168z"/>
                    </svg>
                    Edit Lesson
                </a>
                <a href="{{ route('admin.lessons.index') }}" class="btn btn-outline-secondary">Back to Lessons</a>
            </div>
        </div>
    </div>
</div>
@endsection
