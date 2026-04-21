@extends('user.layouts.app')
@section('title','Home Page')
@section('content')

{{-- Hero Section --}}
<div class="py-5 mb-4 rounded-3" style="background:linear-gradient(135deg,#1e293b,#162032);">
    <div class="container py-3 text-center">
        <h1 class="display-4 fw-bold mb-3" style="color:#38bdf8;">Learn Without Limits</h1>
        <p class="lead text-muted mb-4">Expand your skills with expert-led courses. Learn at your own pace, anytime, anywhere.</p>
        <form action="{{ route('user.courses.index') }}" method="GET" class="d-flex justify-content-center">
            <div class="input-group" style="max-width:500px;">
                <input type="text" name="search"  class="form-control form-control-lg" placeholder="Search for anything...">
                <button class="btn btn-primary px-4" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.099zm-5.242 1.656a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Stats Bar --}}
<div class="row g-0 mb-5 text-center rounded-3 overflow-hidden" style="background:linear-gradient(135deg,#1e293b,#162032);">
    <div class="col-4 py-3 border-end border-secondary">
        <h4 class="fw-bold mb-0" style="color:#38bdf8;">{{ $totalCourses }}+</h4>
        <small class="text-muted">Courses</small>
    </div>
    <div class="col-4 py-3 border-end border-secondary">
        <h4 class="fw-bold mb-0" style="color:#34d399;">{{ $totalStudents }}+</h4>
        <small class="text-muted">Students</small>
    </div>
    <div class="col-4 py-3">
        <h4 class="fw-bold mb-0" style="color:#fbbf24;">{{ $totalCategories }}+</h4>
        <small class="text-muted">Categories</small>
    </div>
</div>

{{-- Courses by Category --}}
@foreach($categories as $category)
    @if($category->courses->count())
        <div class="mb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold mb-0">{{ $category->name }}</h4>
                <a href="{{ route('user.courses.index', ['category' => $category->id]) }}" class="btn btn-outline-primary btn-sm">
                    See all
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-arrow-right ms-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                    </svg>
                </a>
            </div>
            <div class="row g-3">
                @foreach($category->courses->take(4) as $course)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="card h-100 border-0 shadow-sm" style="background:linear-gradient(135deg,#1e293b,#162032);">
                            <img src="{{ asset('storage/' . $course->img_path) }}" class="card-img-top" style="height:160px; object-fit:cover;">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-semibold mb-1">{{ $course->title }}</h6>
                                <p class="card-text text-muted small mb-2">{{ Str::limit($course->description, 60) }}</p>
                                <div class="d-flex align-items-center gap-2 mb-3 mt-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#34d399" class="bi bi-people-fill" viewBox="0 0 16 16">
                                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                    </svg>
                                    <small class="text-muted">{{ $course->enrolledBy->count() }} students</small>
                                </div>
                                <a href="{{ route('user.courses.show', $course->id) }}" class="btn btn-primary btn-sm w-100">View Course</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endforeach

{{-- Empty State --}}
@if($categories->isEmpty())
    <div class="text-center py-5">
        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="#38bdf8" class="bi bi-journal-x mb-3 opacity-50" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6.146 6.146a.5.5 0 0 1 .708 0L8 7.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 8l1.147 1.146a.5.5 0 0 1-.708.708L8 8.707 6.854 9.854a.5.5 0 0 1-.708-.708L7.293 8 6.146 6.854a.5.5 0 0 1 0-.708"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
        </svg>
        <h5 class="text-muted">No courses available yet</h5>
        <p class="text-muted small">Check back soon for new content.</p>
    </div>
@endif

@endsection
