@extends('layouts.app')

@section('content')

<style>
    .auth-scope {
        --ink: #16212D;
        --muted: #6B7684;
        --surface: #FFFFFF;
        --line: #E1E5EA;
        --accent: #0E7C6B;
        --accent-dark: #0A5F52;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
        color: var(--ink);
        background: #ECEFF2;
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1.5rem;
    }
    .auth-scope * { box-sizing: border-box; }

    .auth-card {
        width: 100%;
        max-width: 480px;
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 14px;
        padding: 2.5rem;
        box-shadow: 0 8px 24px rgba(22, 33, 45, 0.06);
        text-align: center;
    }

    .auth-icon {
        width: 56px;
        height: 56px;
        margin: 0 auto 1.25rem;
        border-radius: 50%;
        background: #E9F5F1;
        color: var(--accent-dark);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .auth-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.35rem;
    }

    .auth-title {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.4rem;
        margin: 0 0 1rem;
    }

    .auth-alert-success {
        background: #E9F5F1;
        border: 1px solid #BFE3D6;
        color: var(--accent-dark);
        padding: 0.75rem 1rem;
        border-radius: 8px;
        font-size: 0.88rem;
        margin-bottom: 1.25rem;
    }

    .auth-body {
        color: var(--muted);
        line-height: 1.65;
        font-size: 0.92rem;
    }

    .auth-resend-btn {
        background: none;
        border: none;
        padding: 0;
        font-family: inherit;
        font-weight: 600;
        font-size: inherit;
        color: var(--accent-dark);
        text-decoration: underline;
        cursor: pointer;
    }
    .auth-resend-btn:hover { color: var(--accent); }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<div class="auth-scope">
    <div class="auth-card">

        <div class="auth-icon">
            <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <rect x="3" y="5" width="18" height="14" rx="2"/><path d="M3 7l9 6 9-6"/>
            </svg>
        </div>

        <div class="auth-eyebrow">One More Step</div>
        <h1 class="auth-title">{{ __('Verify Your Email Address') }}</h1>

        @if (session('resent'))
            <div class="auth-alert-success">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <p class="auth-body">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="auth-resend-btn">{{ __('click here to request another') }}</button>.
            </form>
        </p>

    </div>
</div>
@endsection
