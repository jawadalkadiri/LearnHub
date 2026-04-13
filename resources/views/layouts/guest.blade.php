<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LearnHub') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            * { box-sizing: border-box; }

            body {
                margin: 0;
                font-family: 'Figtree', sans-serif;
                background-color: #0f172a;
                color: #e2e8f0;
                min-height: 100vh;
            }

            .auth-wrapper {
                display: flex;
                min-height: 100vh;
            }

            /* ── Left branding panel ── */
            .auth-brand {
                display: none;
                flex-direction: column;
                justify-content: center;
                padding: 3rem;
                background: linear-gradient(135deg, #1e1b4b 0%, #312e81 40%, #4c1d95 100%);
                position: relative;
                overflow: hidden;
            }

            @media (min-width: 1024px) {
                .auth-brand { display: flex; width: 45%; }
            }

            .auth-brand::before {
                content: '';
                position: absolute;
                top: -120px; right: -120px;
                width: 380px; height: 380px;
                background: rgba(129, 140, 248, 0.15);
                border-radius: 50%;
            }

            .auth-brand::after {
                content: '';
                position: absolute;
                bottom: -80px; left: -80px;
                width: 280px; height: 280px;
                background: rgba(167, 139, 250, 0.1);
                border-radius: 50%;
            }

            .brand-content { position: relative; z-index: 1; }

            .brand-logo {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                margin-bottom: 3rem;
            }

            .brand-logo-icon {
                width: 44px; height: 44px;
                background: rgba(129, 140, 248, 0.2);
                border: 1px solid rgba(129, 140, 248, 0.4);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .brand-logo-text {
                font-size: 1.5rem;
                font-weight: 700;
                color: #fff;
                letter-spacing: -0.5px;
            }

            .brand-logo-text span { color: #a5b4fc; }

            .brand-headline {
                font-size: 2.25rem;
                font-weight: 700;
                color: #fff;
                line-height: 1.25;
                margin-bottom: 1rem;
                letter-spacing: -0.5px;
            }

            .brand-subline {
                font-size: 1rem;
                color: #c7d2fe;
                line-height: 1.6;
                margin-bottom: 2.5rem;
            }

            .brand-features { list-style: none; margin: 0; padding: 0; display: flex; flex-direction: column; gap: 1rem; }

            .brand-features li {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                color: #e0e7ff;
                font-size: 0.9rem;
            }

            .feature-dot {
                width: 8px; height: 8px;
                background: #818cf8;
                border-radius: 50%;
                flex-shrink: 0;
            }

            /* ── Right form panel ── */
            .auth-form-panel {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem 1.5rem;
                background-color: #0f172a;
            }

            .auth-card {
                width: 100%;
                max-width: 420px;
            }

            /* Mobile logo (shows when brand panel is hidden) */
            .mobile-logo {
                display: flex;
                align-items: center;
                gap: 0.6rem;
                justify-content: center;
                margin-bottom: 2rem;
            }

            @media (min-width: 1024px) {
                .mobile-logo { display: none; }
            }

            .mobile-logo-icon {
                width: 36px; height: 36px;
                background: rgba(129, 140, 248, 0.2);
                border: 1px solid rgba(129, 140, 248, 0.4);
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .mobile-logo-text {
                font-size: 1.25rem;
                font-weight: 700;
                color: #fff;
                letter-spacing: -0.3px;
            }

            .mobile-logo-text span { color: #a5b4fc; }

            /* Form card styling */
            .form-card {
                background: #1e293b;
                border: 1px solid rgba(255, 255, 255, 0.07);
                border-radius: 16px;
                padding: 2rem;
                box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
            }

            .form-title {
                font-size: 1.5rem;
                font-weight: 700;
                color: #f1f5f9;
                margin: 0 0 0.4rem 0;
                letter-spacing: -0.3px;
            }

            .form-subtitle {
                font-size: 0.875rem;
                color: #94a3b8;
                margin: 0 0 1.75rem 0;
            }

            /* Override Tailwind input/label styles inside card */
            .form-card label {
                color: #cbd5e1 !important;
                font-size: 0.82rem !important;
                font-weight: 500 !important;
            }

            .form-card input[type="email"],
            .form-card input[type="password"],
            .form-card input[type="text"] {
                background: #0f172a !important;
                border: 1px solid rgba(255,255,255,0.1) !important;
                border-radius: 8px !important;
                color: #e2e8f0 !important;
                padding: 0.6rem 0.9rem !important;
                font-size: 0.9rem !important;
                width: 100% !important;
                transition: border-color 0.2s, box-shadow 0.2s !important;
                outline: none !important;
            }

            .form-card input:focus {
                border-color: #818cf8 !important;
                box-shadow: 0 0 0 3px rgba(129, 140, 248, 0.15) !important;
            }

            .form-card input::placeholder { color: #475569 !important; }

            /* Submit button */
            .btn-auth {
                display: block;
                width: 100%;
                padding: 0.7rem 1.25rem;
                background: linear-gradient(135deg, #818cf8, #6366f1);
                color: #fff;
                border: none;
                border-radius: 8px;
                font-size: 0.9rem;
                font-weight: 600;
                cursor: pointer;
                transition: opacity 0.2s, transform 0.1s;
                text-align: center;
                letter-spacing: 0.2px;
            }

            .btn-auth:hover { opacity: 0.9; transform: translateY(-1px); }
            .btn-auth:active { transform: translateY(0); }

            .auth-divider {
                display: flex;
                align-items: center;
                gap: 0.75rem;
                margin: 1.5rem 0;
            }

            .auth-divider-line {
                flex: 1;
                height: 1px;
                background: rgba(255,255,255,0.08);
            }

            .form-footer {
                text-align: center;
                margin-top: 1.5rem;
                font-size: 0.85rem;
                color: #64748b;
            }

            .form-footer a {
                color: #818cf8;
                text-decoration: none;
                font-weight: 500;
            }

            .form-footer a:hover { text-decoration: underline; }

            .form-links {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-top: 1.25rem;
            }

            .form-links a {
                font-size: 0.8rem;
                color: #64748b;
                text-decoration: none;
            }

            .form-links a:hover { color: #818cf8; }

            .remember-label {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                font-size: 0.82rem !important;
                color: #94a3b8 !important;
                cursor: pointer;
            }

            .remember-label input[type="checkbox"] {
                width: 15px !important;
                height: 15px !important;
                accent-color: #818cf8;
                border-radius: 4px !important;
                padding: 0 !important;
            }

            /* Error messages */
            .form-card .text-red-600,
            .form-card .text-red-500 {
                color: #f87171 !important;
                font-size: 0.8rem !important;
            }
        </style>
    </head>
    <body>
        <div class="auth-wrapper">

            {{-- Left branding panel --}}
            <div class="auth-brand">
                <div class="brand-content">
                    <div class="brand-logo">
                        <div class="brand-logo-icon">
                            <svg width="22" height="22" fill="none" stroke="#a5b4fc" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <span class="brand-logo-text">Learn<span>Hub</span></span>
                    </div>

                    <h1 class="brand-headline">Expand your skills,<br>shape your future.</h1>
                    <p class="brand-subline">Access expert-led courses, track your progress,<br>and learn at your own pace — all in one place.</p>

                    <ul class="brand-features">
                        <li><span class="feature-dot"></span> Hundreds of courses across all disciplines</li>
                        <li><span class="feature-dot"></span> Learn from industry professionals</li>
                        <li><span class="feature-dot"></span> Track progress with detailed analytics</li>
                        <li><span class="feature-dot"></span> Earn certificates upon completion</li>
                    </ul>
                </div>
            </div>

            {{-- Right form panel --}}
            <div class="auth-form-panel">
                <div class="auth-card">

                    {{-- Mobile logo --}}
                    <div class="mobile-logo">
                        <div class="mobile-logo-icon">
                            <svg width="18" height="18" fill="none" stroke="#a5b4fc" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                            </svg>
                        </div>
                        <span class="mobile-logo-text">Learn<span>Hub</span></span>
                    </div>

                    <div class="form-card">
                        {{ $slot }}
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
