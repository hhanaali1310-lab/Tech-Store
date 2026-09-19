@extends('layouts.app')

@section('title', 'Add Category')

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
    .cat-textarea { resize: vertical; min-height: 100px; }

    .cat-btn-primary {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        background: var(--accent);
        color: #fff;
        border: none;
        padding: 0.7rem 1.4rem;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.15s ease;
        width: 100%;
    }
    .cat-btn-primary:hover { background: var(--accent-dark); color: #fff; }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<div class="cat-scope">

    <div class="cat-card">

        <div class="cat-eyebrow">Inventory</div>
        <h2 class="cat-title">Add Category</h2>

        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <input type="text" name="name" class="cat-input" placeholder="Category Name">

            <textarea name="description" class="cat-textarea" placeholder="Description"></textarea>

            <input type="file" name="image" class="cat-file">

            <button type="submit" class="cat-btn-primary">
                Add Category
            </button>

        </form>

    </div>

</div>

@endsection