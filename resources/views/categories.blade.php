@extends('layouts.app')

@section('title', 'Categories')

@section('content')

<style>
    .ci-scope {
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
        padding: 2.5rem 1.5rem 4rem;
    }
    .ci-scope * { box-sizing: border-box; }
    .ci-wrap { max-width: 1200px; margin: 0 auto; }

    .ci-header {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 1rem;
        border-bottom: 1px solid var(--line);
        padding-bottom: 1.25rem;
        margin-bottom: 2rem;
    }
    .ci-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.35rem;
    }
    .ci-header h1 {
        font-family: 'Google Sans Flex', sans-serif;
        font-size: 2rem;
        font-weight: 600;
        letter-spacing: -0.02em;
        margin: 0;
    }
    .ci-header p {
        color: var(--muted);
        margin: 0.35rem 0 0;
    }

    .ci-add-btn {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        background: var(--accent);
        color: #fff;
        border: none;
        padding: 0.7rem 1.3rem;
        border-radius: 6px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: background 0.15s ease;
    }
    .ci-add-btn:hover { background: var(--accent-dark); color: #fff; }

    .ci-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .ci-card {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }
    .ci-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(22, 33, 45, 0.08);
    }

    .ci-card-img {
        width: 100%;
        aspect-ratio: 16 / 9;
        object-fit: contain;
        background: var(--paper);
        padding: 1rem;
        display: block;
    }
    .ci-card-img-placeholder {
        width: 100%;
        aspect-ratio: 16 / 9;
        background: var(--paper);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.25rem;
    }

    .ci-card-body {
        padding: 1.25rem 1.4rem 1.4rem;
        display: flex;
        flex-direction: column;
        gap: 0.6rem;
        flex: 1;
    }
    .ci-card-title {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.1rem;
        margin: 0;
    }
    .ci-card-desc {
        color: var(--muted);
        font-size: 0.88rem;
        line-height: 1.55;
        margin: 0;
        flex: 1;
    }

    .ci-card-link {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.85rem;
        color: var(--accent-dark);
        text-decoration: none;
        margin-top: 0.4rem;
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
    }
    .ci-card-link:hover { color: var(--accent); }

    .ci-empty {
        background: var(--surface);
        border: 1px dashed var(--line);
        border-radius: 12px;
        padding: 3rem 1.5rem;
        text-align: center;
        color: var(--muted);
        grid-column: 1 / -1;
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<div class="ci-scope">
    <div class="ci-wrap">

        <div class="ci-header">
            <div>
                <div class="ci-eyebrow">Inventory</div>
                <h1>Categories</h1>
                <p>Choose a category to browse its products</p>
            </div>

            <a href="{{ route('categories.create') }}" class="ci-add-btn">+ Add Category</a>
        </div>

        <div class="ci-grid">

            @forelse($categories as $category)

                <div class="ci-card">

                    @if($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" class="ci-card-img" alt="{{ $category->name }}">
                    @else
                        <div class="ci-card-img-placeholder">💻</div>
                    @endif

                    <div class="ci-card-body">
                        <h3 class="ci-card-title">{{ $category->name }}</h3>
                        <p class="ci-card-desc">{{ $category->description }}</p>

                        <a href="{{ route('categories.show', $category->id) }}" class="ci-card-link">View Category &rarr;</a>
                    </div>

                </div>

            @empty

                <div class="ci-empty">No categories yet. Add your first category to get started.</div>

            @endforelse

        </div>

    </div>
</div>

@endsection
