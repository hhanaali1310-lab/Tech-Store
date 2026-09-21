@extends('layouts.app')

@section('content')

<style>
    .auth-scope {
        --ink: #16212D;
        --muted: #6B7684;
        --paper: #F4F6F8;
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
    }

    .auth-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        text-align: center;
        margin-bottom: 0.35rem;
    }

    .auth-title {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.6rem;
        text-align: center;
        margin: 0 0 2rem;
    }

    .auth-field { margin-bottom: 1.1rem; }
    .auth-field label {
        display: block;
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 0.4rem;
    }
    .auth-field .form-control {
        width: 100%;
        border: 1px solid var(--line);
        border-radius: 8px;
        padding: 0.65rem 0.9rem;
        font-family: 'Inter', sans-serif;
        font-size: 0.92rem;
        color: var(--ink);
        background: var(--surface);
    }
    .auth-field .form-control:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(14, 124, 107, 0.12);
    }
    .auth-field .invalid-feedback {
        display: block;
        font-size: 0.8rem;
        margin-top: 0.35rem;
    }

    .auth-submit {
        width: 100%;
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.95rem;
        background: var(--accent);
        color: #fff;
        border: none;
        padding: 0.75rem 1.4rem;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.15s ease;
    }
    .auth-submit:hover { background: var(--accent-dark); color: #fff; }

    .auth-links {
        text-align: center;
        margin-top: 1.25rem;
        font-size: 0.85rem;
    }
    .auth-links a {
        color: var(--accent-dark);
        text-decoration: none;
        font-weight: 600;
    }
    .auth-links a:hover { color: var(--accent); }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<div class="auth-scope">
    <div class="auth-card">

        <div class="auth-eyebrow">Get Started</div>
        <h1 class="auth-title">{{ __('Create an Account') }}</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="auth-field">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="email">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="auth-field">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="auth-field">
                <label for="role">{{ __('Account Type') }}</label>

                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <button type="submit" class="auth-submit">
                {{ __('Register') }}
            </button>

            <div class="auth-links">
                {{ __('Already have an account?') }} <a href="{{ route('login') }}">{{ __('Sign in') }}</a>
            </div>
        </form>

    </div>
</div>
@endsection
