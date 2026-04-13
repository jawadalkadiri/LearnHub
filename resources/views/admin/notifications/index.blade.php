@extends('admin.layouts.app')

@section('title', 'Notifications')

@section('content')
<div class="py-4">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h1 class="display-5 fw-bold mb-0">Notifications</h1>
            @if(auth()->user()->unreadNotifications()->count() > 0)
                <form action="{{ route('admin.notifications.read-all') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary">Mark All as Read</button>
                </form>
            @endif
        </div>
    </div>

    @if($notifications->count() > 0)
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="list-group">
                    @foreach($notifications as $notification)
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1">
                                        {{ $notification->data['message'] ?? 'New notification' }}
                                        @if(!$notification->read_at)
                                            <span class="badge bg-primary ms-1">New</span>
                                        @endif
                                    </h6>
                                    <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                </div>
                                <div>
                                    @if(!$notification->read_at)
                                        <form action="{{ route('admin.notifications.update', $notification->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-outline-secondary">Mark as Read</button>
                                        </form>
                                    @endif
                                    @if(isset($notification->data['link']))
                                        <a href="{{ $notification->data['link'] }}" class="btn btn-sm btn-primary ms-1">View</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-3">
            {{ $notifications->links() }}
        </div>
    @else
        <div class="alert alert-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell me-1" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
            </svg>
            No notifications yet!
        </div>
    @endif
</div>
@endsection
