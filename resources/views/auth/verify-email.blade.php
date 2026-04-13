<x-guest-layout>
    <div style="text-align:center; margin-bottom:1.5rem;">
        <div style="display:inline-flex; align-items:center; justify-content:center; width:56px; height:56px; background:rgba(129,140,248,0.15); border:1px solid rgba(129,140,248,0.3); border-radius:14px; margin-bottom:1rem;">
            <svg width="26" height="26" fill="none" stroke="#818cf8" stroke-width="1.8" viewBox="0 0 24 24">
                <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <h2 class="form-title" style="margin-bottom:0.4rem;">Check your inbox</h2>
        <p class="form-subtitle" style="margin-bottom:0;">
            We sent a verification link to your email.<br>Click it to activate your account.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div style="background:rgba(34,197,94,0.1); border:1px solid rgba(34,197,94,0.25); border-radius:8px; padding:0.75rem 1rem; margin-bottom:1.25rem; font-size:0.85rem; color:#4ade80; text-align:center;">
            A new verification link has been sent to your email address.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" style="margin-bottom:1rem;">
        @csrf
        <button type="submit" class="btn-auth">
            Resend verification email
        </button>
    </form>

    <div class="form-footer">
        Wrong account?
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" style="background:none; border:none; padding:0; color:#818cf8; font-size:0.85rem; font-weight:500; cursor:pointer; font-family:inherit;">
                Sign out
            </button>
        </form>
    </div>
</x-guest-layout>
