<x-guest-layout>
    <h2 class="form-title">Welcome back</h2>
    <p class="form-subtitle">Sign in to continue your learning journey.</p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email address')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div style="display:flex; align-items:center; justify-content:space-between; margin-top:1rem;">
            <label class="remember-label">
                <input type="checkbox" name="remember" id="remember_me">
                {{ __('Remember me') }}
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="form-links" style="font-size:0.8rem; color:#64748b; text-decoration:none;" onmouseover="this.style.color='#818cf8'" onmouseout="this.style.color='#64748b'">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div style="margin-top:1.5rem;">
            <button type="submit" class="btn-auth">
                {{ __('Sign in') }}
            </button>
        </div>
    </form>

    <div class="form-footer">
        {{ __("Don't have an account?") }}
        <a href="{{ route('register') }}">{{ __('Create one') }}</a>
    </div>
</x-guest-layout>
