@extends('user.layouts.app')
@section('title','View Courses')
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
            <h1 class="display-5 fw-bold">Available Courses</h1>
        </div>
    </div>

    <div class="row">
        @foreach($courses as $course)
            <div class="col-md-6 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="row g-0 h-100">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $course->img_path) }}" class="img-fluid rounded-start w-100 h-100" style="object-fit: cover; min-height: 200px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body d-flex flex-column">
                                <h4 class="card-title">{{ $course->title }}</h4>
                                <p class="card-text text-muted flex-grow-1">{{ Str::limit($course->description, 120) }}</p>

                                <div class="mb-3">
                                    <h6 class="text-muted text-uppercase small mb-2">Teachers</h6>
                                    <div class="d-flex flex-wrap gap-1">
                                        @forelse($course->teachedBy as $teacher)
                                            <span class="badge rounded-pill bg-primary">{{ $teacher->name }}</span>
                                        @empty
                                            <span class="text-muted fst-italic small">No teachers assigned</span>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('user.courses.show', $course->id) }}" class="btn btn-outline-primary btn-sm">View</a>
                                    <form method="POST" action="{{ route('user.enrollments.store', $course->id) }}" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Enroll</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
