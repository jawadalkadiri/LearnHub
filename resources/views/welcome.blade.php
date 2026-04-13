@extends('user.layouts.app')
@section('title','Home Page')
@section('content')
<div class="py-5">
    <div class="row mb-5">
        <div class="col-12 text-center py-4">
            <h1 class="display-3 fw-bold" style="color:#38bdf8; letter-spacing:-1px;">LearnHub</h1>
            <p class="lead text-muted mb-4">Your gateway to online learning — explore, enroll, and grow.</p>
            <a href="{{ route('user.courses.index') }}" class="btn btn-primary px-4 py-2 me-2">Browse Courses</a>
            <a href="{{ route('user.enrollments.index') }}" class="btn btn-outline-secondary px-4 py-2">My Courses</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-12 col-md-4">
            <div class="card h-100 border-0 text-center p-4" style="background:linear-gradient(135deg,#1e293b,#162032);">
                <div class="card-body">
                    <div class="mb-3 p-3 rounded-circle d-inline-flex" style="background:rgba(56,189,248,0.12);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#38bdf8" class="bi bi-book" viewBox="0 0 16 16">
                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687z"/>
                        </svg>
                    </div>
                    <h4 class="card-title fw-semibold">Browse Courses</h4>
                    <p class="card-text text-muted small">Explore our wide range of courses taught by expert instructors.</p>
                    <a href="{{ route('user.courses.index') }}" class="btn btn-primary btn-sm px-4">View Courses</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card h-100 border-0 text-center p-4" style="background:linear-gradient(135deg,#1e293b,#162032);">
                <div class="card-body">
                    <div class="mb-3 p-3 rounded-circle d-inline-flex" style="background:rgba(52,211,153,0.12);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#34d399" class="bi bi-play-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M6.271 5.055a.5.5 0 0 1 .52.038l3.5 2.5a.5.5 0 0 1 0 .814l-3.5 2.5A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .271-.445"/>
                        </svg>
                    </div>
                    <h4 class="card-title fw-semibold">My Courses</h4>
                    <p class="card-text text-muted small">Access your enrolled courses and continue learning at your pace.</p>
                    <a href="{{ route('user.enrollments.index') }}" class="btn btn-success btn-sm px-4">My Courses</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="card h-100 border-0 text-center p-4" style="background:linear-gradient(135deg,#1e293b,#162032);">
                <div class="card-body">
                    <div class="mb-3 p-3 rounded-circle d-inline-flex" style="background:rgba(251,191,36,0.12);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#fbbf24" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                        </svg>
                    </div>
                    <h4 class="card-title fw-semibold">My Profile</h4>
                    <p class="card-text text-muted small">Manage your account settings and personal information.</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary btn-sm px-4">Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
