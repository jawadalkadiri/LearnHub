@extends('user.layouts.app')
@section('title','My Courses')
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
            <h1 class="display-5 fw-bold">My Courses</h1>
        </div>
    </div>

    @if($enrollments->count() > 0)
        <div class="row">
            @foreach($enrollments as $enrollment)
                <div class="col-12 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="row g-0 h-100">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $enrollment->course->img_path) }}" class="img-fluid rounded-start w-100 h-100" style="object-fit: cover; min-height: 200px;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">{{ $enrollment->course->title }}</h4>
                                    <p class="card-text text-muted flex-grow-1">{{ Str::limit($enrollment->course->description, 120) }}</p>
                                    <div class="mt-auto">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('user.courses.show', $enrollment->course->id) }}" class="btn btn-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-play-circle me-1" viewBox="0 0 16 16">
                                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                                    <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"/>
                                                </svg>
                                                Start Learning
                                            </a>
                                            <a href="{{ route('user.reviews.create', $enrollment->course->id) }}" class="btn btn-outline-primary btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-star me-1" viewBox="0 0 16 16">
                                                    <path d="M3.612 15.366c-.385.199-.82-.193-.707-.636a4.982 4.982 0 0 1 .54-2.57C4.875 9.577 6.845 8.29 9 8.29c2.155 0 4.125 1.287 4.875 3.03a4.982 4.982 0 0 1 .54 2.57c.113.443-.322.835-.707.636L9 12l-5.388 3.366z"/>
                                                </svg>
                                                Add Review
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="card shadow-sm border-0">
            <div class="card-body text-center py-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-book text-muted mb-3" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687z"/>
                </svg>
                <h4 class="text-muted">No Courses Enrolled</h4>
                <p class="text-muted">You haven't enrolled in any courses yet. Browse our available courses to get started!</p>
                <a href="{{ route('user.courses.index') }}" class="btn btn-primary">Browse Courses</a>
            </div>
        </div>
    @endif
</div>
@endsection
