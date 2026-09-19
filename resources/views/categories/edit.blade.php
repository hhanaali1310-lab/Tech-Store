@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')

<style>
    .cat-scope {
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
        min-height: 100vh;
        padding: 3rem 1.5rem;
    }
    .cat-scope * { box-sizing: border-box; }

    .cat-card {
        max-width: 520px;
        margin: 0 auto;
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 14px;
        padding: 2.25rem;
        box-shadow: 0 8px 24px rgba(22, 33, 45, 0.06);
    }

    .cat-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        text-align: center;
        margin-bottom: 0.35rem;
    }

    .cat-title {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.5rem;
        text-align: center;
        margin: 0 0 1.75rem;
        color: var(--ink);
    }

    .cat-label {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.72rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--muted);
        display: block;
        margin-bottom: 0.4rem;
    }

    .cat-input,
    .cat-textarea,
    .cat-file {
        width: 100%;
        padding: 0.7rem 0.9rem;
        margin-bottom: 1.1rem;
        border: 1px solid var(--line);
        border-radius: 8px;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
        font-size: 0.92rem;
        color: var(--ink);
        background: var(--surface);
        transition: border-color 0.15s ease;
    }
    .cat-input:focus,
    .cat-textarea:focus {
        outline: none;
        border-color: var(--accent);
    }

    .cat-current-img {
        border-radius: 8px;
        border: 1px solid var(--line);
        display: block;
        margin-top: 0.4rem;
    }

    .cat-btn-row {
        display: flex;
        gap: 0.75rem;
        margin-top: 0.5rem;
    }

    .cat-btn-primary {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        background: var(--accent);
        color: #fff;
        border: none;
        padding: 0.65rem 1.3rem;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.15s ease;
    }
    .cat-btn-primary:hover { background: var(--accent-dark); color: #fff; }

    .cat-btn-secondary {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        background: var(--surface);
        color: var(--ink);
        border: 1px solid var(--line);
        padding: 0.65rem 1.3rem;
        border-radius: 8px;
        text-decoration: none;
        transition: border-color 0.15s ease;
    }
    .cat-btn-secondary:hover { border-color: var(--accent); color: var(--accent-dark); }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<div class="cat-scope">

    <div class="cat-card">

        <div class="cat-eyebrow">Inventory</div>
        <h2 class="cat-title">Edit Category</h2>

        <form action="{{ route('categories.update', $category) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <label class="cat-label">
                Category Name
            </label>

            <input type="text"
                   name="name"
                   class="cat-input"
                   value="{{ $category->name }}">

            <label class="cat-label">
                Description
            </label>

            <textarea name="description"
                      class="cat-textarea"
                      rows="4">{{ $category->description }}</textarea>

            @if($category->image)

                <div class="mb-3">
                    <label class="cat-label">
                        Current Image
                    </label>

                    <img src="{{ asset('storage/' . $category->image) }}"
                         class="cat-current-img"
                         width="150">
                </div>

            @endif

            <label class="cat-label">
                New Image
            </label>

            <input type="file"
                   name="image"
                   class="cat-file">

            <div class="cat-btn-row">

                <button type="submit"
                        class="cat-btn-primary">
                    Update Category
                </button>

                <a href="{{ route('categories.index') }}"
                   class="cat-btn-secondary">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

@endsection