@extends('layouts.app')

@section('title', $category->name)

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
        --amber: #B9720F;
        --danger: #B23A2E;
        --danger-dark: #8F2E24;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
        color: var(--ink);
        background: #ECEFF2;
        min-height: 100vh;
        padding: 2.5rem 1.5rem 4rem;
    }
    .cat-scope * { box-sizing: border-box; }

    .cat-wrap { max-width: 1100px; margin: 0 auto; }

    .cat-alert-success {
        background: #E9F5F1;
        border: 1px solid #BFE3D6;
        color: var(--accent-dark);
        padding: 0.85rem 1.1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }

    .cat-hero {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 14px;
        overflow: hidden;
        display: grid;
        grid-template-columns: 42% 1fr;
        margin-bottom: 2.5rem;
        box-shadow: 0 4px 16px rgba(22, 33, 45, 0.05);
    }
    @media (max-width: 768px) {
        .cat-hero { grid-template-columns: 1fr; }
    }

    .cat-hero-img {
        width: 100%;
        height: 100%;
        min-height: 280px;
        object-fit: contain;
        background: var(--paper);
        padding: 1.5rem;
        display: block;
    }
    .cat-hero-placeholder {
        background: var(--paper);
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 280px;
        font-size: 2.5rem;
    }

    .cat-hero-body { padding: 2rem; }

    .cat-hero-body h1 {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.8rem;
        letter-spacing: -0.02em;
        margin: 0 0 0.75rem;
    }

    .cat-hero-body p {
        color: var(--muted);
        line-height: 1.6;
        margin: 0;
    }

    .cat-hero-actions {
        margin-top: 1.5rem;
        display: flex;
        gap: 0.75rem;
    }

    .cat-btn-warning {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.85rem;
        background: #fff;
        color: var(--amber);
        border: 1px solid #ffffff;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        text-decoration: none;
        transition: background 0.15s ease;
    }

    .cat-btn-danger {
        font-family: 'Google Sans Flex', sans-serif;
        font-size: 0.85rem;
        cursor: pointer;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        border: 1px solid #fff;
        color: var(--danger);
        font-weight: 600;
        background: #fff;
        transition: background 0.15s ease;
    }

    .cat-section-title {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.4rem;
        margin: 0 0 1.5rem;
        color: var(--ink);
    }

    .cat-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 1.25rem;
    }

    .cat-product-card {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 10px;
        padding: 1.1rem 1.3rem;
        transition: box-shadow 0.15s ease, transform 0.15s ease;
    }
    .cat-product-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(22, 33, 45, 0.06);
    }

    .cat-product-name {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1rem;
        margin: 0 0 0.4rem;
        color: var(--ink);
    }

    .cat-product-price {
        font-family: 'Google Sans Flex', monospace;
        font-weight: 600;
        color: var(--accent-dark);
        margin: 0;
    }

    .cat-alert-info {
        background: #EEF2FF;
        border: 1px solid #C7D2FE;
        color: #2563EB;
        padding: 0.85rem 1.1rem;
        border-radius: 8px;
        font-size: 0.9rem;
    }
    .ct-img,
.ct-img-placeholder {
    width: 200px;
    height: 200px;
    object-fit: contain;
    background: var(--paper);
    border-radius: 8px;
    flex-shrink: 0;
}

.ct-img-placeholder {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.55rem;
    color: var(--muted);
    text-align: center;
}
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<div class="cat-scope">
    <div class="cat-wrap">

        @if(session('success'))
            <div class="cat-alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="cat-hero">

            @if($category->image)
                <img src="{{ asset('storage/' . $category->image) }}"
                     class="cat-hero-img">
            @else
                <div class="cat-hero-placeholder">
                    <span></span>
                </div>
            @endif

            <div class="cat-hero-body">

                <h1>
                    {{ $category->name }}
                </h1>

                <p>
                    {{ $category->description }}
                </p>

                <div class="cat-hero-actions">

                    <a href="{{ route('categories.edit', $category) }}"
                       class="cat-btn-warning">
                        Edit Category
                    </a>

                    <form action="{{ route('categories.destroy', $category) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="cat-btn-danger"
                                onclick="return confirm('Are you sure you want to delete this category?')">
                            Delete Category
                        </button>

                    </form>

                </div>

            </div>

        </div>


        <h2 class="cat-section-title">
            Products in {{ $category->name }}
        </h2>

        <div class="cat-products-grid">

            @forelse($products as $product)

                <div class="cat-product-card">

                     @if ($product->image)
                            <img class="ct-img" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        @else
                            <div class="ct-img-placeholder">NO IMAGE</div>
                        @endif 
                    <h5 class="cat-product-name">
                        {{ $product->name }}
                    </h5>

                    <p class="cat-product-price">
                        ${{ $product->price }}
                    </p>

                </div>

            @empty

                <div class="cat-alert-info">
                    No products in this category yet.
                </div>

            @endforelse

        </div>

    </div>
</div>

@endsection