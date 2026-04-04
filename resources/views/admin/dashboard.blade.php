@extends('admin.layouts.app')
@section('title','Admin Dashboard')
@section('content')
<div class="py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold">Admin Dashboard</h1>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-2">Total Courses</h5>
                            <h2 class="mb-0">{{ $courses->count() }}</h2>
                        </div>
                        <div class="fs-1 text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title text-muted mb-2">Total Users</h5>
                            <h2 class="mb-0">{{ $users->where('role','user')->count() }}</h2>
                        </div>
                        <div class="fs-1 text-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.001.002-.002.001-.003.001-.004.001-.005.001zm.46-6.001A3.5 3.5 0 1 0 4 4.99a3.5 3.5 0 0 0 3.488 3.01z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0">Course Statistics</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" class="py-3">Course</th>
                            <th scope="col" class="py-3">Students</th>
                            <th scope="col" class="py-3">Teachers</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td class="py-3">{{ $course->title }}</td>
                            <td class="py-3">
                                <span class="badge bg-success">{{ $course->enrolledBy()->count() }}</span>
                            </td>
                            <td class="py-3">
                                <span class="badge bg-primary">{{ $course->teachedBy()->count() }}</span>
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
