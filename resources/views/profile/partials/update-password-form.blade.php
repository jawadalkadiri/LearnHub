<section>
    <p class="text-muted small mb-4">Use a long, random password to keep your account secure.</p>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label fw-medium">Current Password</label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="form-control @if($errors->updatePassword->get('current_password')) is-invalid @endif"
                autocomplete="current-password"
                placeholder="••••••••"
                style="background:#0f172a; border-color:rgba(255,255,255,0.12); color:#e2e8f0;"
            >
            @if($errors->updatePassword->get('current_password'))
                <div class="invalid-feedback">{{ $errors->updatePassword->first('current_password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label fw-medium">New Password</label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                class="form-control @if($errors->updatePassword->get('password')) is-invalid @endif"
                autocomplete="new-password"
                placeholder="Min. 8 characters"
                style="background:#0f172a; border-color:rgba(255,255,255,0.12); color:#e2e8f0;"
            >
            @if($errors->updatePassword->get('password'))
                <div class="invalid-feedback">{{ $errors->updatePassword->first('password') }}</div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label fw-medium">Confirm New Password</label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-control @if($errors->updatePassword->get('password_confirmation')) is-invalid @endif"
                autocomplete="new-password"
                placeholder="Repeat new password"
                style="background:#0f172a; border-color:rgba(255,255,255,0.12); color:#e2e8f0;"
            >
            @if($errors->updatePassword->get('password_confirmation'))
                <div class="invalid-feedback">{{ $errors->updatePassword->first('password_confirmation') }}</div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary px-4">Update Password</button>
            @if (session('status') === 'password-updated')
                <span class="text-success small">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-check-circle-fill me-1" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                    Password updated
                </span>
            @endif
        </div>
    </form>
</section>
