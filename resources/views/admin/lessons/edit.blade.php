@extends('admin.layouts.app')
@section('title','Edit Lesson')
@section('content')
<div class="py-4">
    @session('success')
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession

    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold">Edit Lesson</h1>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.lessons.update', $lesson->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="form-label fw-semibold">Lesson Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $lesson->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $lesson->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="video_path" class="form-label fw-semibold">Upload New Video</label>
                    @if($lesson->video_path)
                        <div class="mb-2">
                            <video controls class="rounded" style="max-width: 300px; max-height: 200px;">
                                <source src="{{ asset('storage/' . $lesson->video_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('video_path') is-invalid @enderror" id="video_path" name="video_path" accept="video/*">
                    @error('video_path')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Leave empty to keep current video. Upload new video to replace.</div>
                </div>

                <div class="mb-4">
                    <label for="course_id" class="form-label fw-semibold">Course</label>
                    <select class="form-select @error('course_id') is-invalid @enderror" id="course_id" name="course_id">
                        <option value="" selected disabled>Choose Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}" {{ $lesson->course_id == $course->id ? 'selected' : '' }}>{{ $course->title }}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg me-1" viewBox="0 0 16 16">
                            <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0z"/>
                        </svg>
                        Update
                    </button>
                    <a href="{{ route('admin.lessons.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
