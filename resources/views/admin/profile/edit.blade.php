@extends('admin.layouts.app')
@section('title','Admin Profile')
@section('content')
<div class="py-4">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="display-5 fw-bold">Profile Settings</h1>
            <p class="text-muted">Manage your account information and security settings</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header py-3">
                    <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person me-1" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2.5 7a4.5 4.5 0 1 0-5 0z"/>
                        </svg>
                        Profile Information
                    </h6>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header py-3">
                    <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key me-1" viewBox="0 0 16 16">
                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.5a.5.5 0 0 1-.5-.5V9.207l-.646.647a.5.5 0 0 1-.707-.707L7.293 8.5H7.5A.5.5 0 0 1 8 9v.293l.854-.854A.5.5 0 0 1 9 8.5h5.293l.854-.854A.5.5 0 0 1 15.5 8h.5v.5a.5.5 0 0 1-.5.5zM4 8a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                        </svg>
                        Update Password
                    </h6>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card shadow-sm border-0 border-danger">
                <div class="card-header bg-danger text-white py-3">
                    <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle me-1" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.054l6.857 11.667a.14.14 0 0 1-.054.195.13.13 0 0 1-.063.016H1.146a.14.14 0 0 1-.106-.054.14.14 0 0 1 .004-.195L7.875 2.07a.146.146 0 0 1 .063-.054"/>
                        </svg>
                        Delete Account
                    </h6>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
