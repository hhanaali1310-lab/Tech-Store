@extends('layouts.app')

@section('content')

<style>
    .page-scope {
        background: #ECEFF2;
    }
    .slider-img {
        height: 300px;
        width: 100%;
        object-fit: contain;
    }
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1) grayscale(100%);
    }
</style>

<div class="page-scope">

{{-- ================================================= --}}
{{-- TRUST BADGES --}}
{{-- ================================================= --}}
<style>
    .tb-scope {
        background: transparent;
        padding: 1.4rem 1.5rem;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
    }
    .tb-wrap {
        max-width: 1100px;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 2.5rem;
    }
    .tb-item {
        display: flex;
        align-items: center;
        gap: 0.65rem;
    }
    .tb-icon {
        color: #7C8794;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .tb-title {
        font-size: 0.85rem;
        font-weight: 500;
        color: #384250;
        margin: 0;
    }
    .tb-sub {
        font-size: 0.75rem;
        color: #9AA3AE;
        margin: 0;
    }
</style>

<section class="tb-scope">
    <div class="tb-wrap">

        <div class="tb-item">
            <div class="tb-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><path d="M3 12h13l4 4v4H3z"/><circle cx="7" cy="20" r="1"/><circle cx="17" cy="20" r="1"/></svg>
            </div>
            <div>
                <p class="tb-title">Free Delivery</p>
                <p class="tb-sub">Orders above $150</p>
            </div>
        </div>

        <div class="tb-item">
            <div class="tb-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6z"/></svg>
            </div>
            <div>
                <p class="tb-title">2-Year Warranty</p>
                <p class="tb-sub">Genuine guarantee</p>
            </div>
        </div>

        <div class="tb-item">
            <div class="tb-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/></svg>
            </div>
            <div>
                <p class="tb-title">30-Day Returns</p>
                <p class="tb-sub">Full refund policy</p>
            </div>
        </div>

        <div class="tb-item">
            <div class="tb-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.6" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20z"/><path d="M12 6v6l4 2"/></svg>
            </div>
            <div>
                <p class="tb-title">24/7 Support</p>
                <p class="tb-sub">Certified specialists</p>
            </div>
        </div>

    </div>
</section>

{{-- ================================================= --}}
{{-- SLIDER --}}
{{-- ================================================= --}}
<section class="mb-5">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="row align-items-center bg-light g-0 p-4 p-md-5">

                    <div class="col-md-4 text-center">
                        <img src="{{ asset('images/brands/d7d79b63-5631-4460-8382-19a56091e839-removebg-preview.png') }}" alt="Headphone" class="slider-img">
                    </div>

                    <div class="col-md-4 text-center">
                        <h1 class="fw-bold">TECH ESSENTIALS BUNDLE</h1>
                        <p class="text-secondary">Laptops, Mobiles &amp; Accessories — Everything You Need</p>
                        <a href="{{ url('/products') }}" class="btn btn-dark px-4 shop-btn">Shop Now</a>
                    </div>

                    <div class="col-md-4 text-center d-none d-md-block">
                        <img src="{{ asset('images/brands/download__13_-removebg-preview.png') }}" alt="Model wearing headphones" class="slider-img">
                    </div>

                </div>
            </div>

            {{-- add more .carousel-item blocks here for additional slides --}}

        </div>
    </div>
</section>

{{-- ================================================= --}}
{{-- BEST SELLER --}}
{{-- ================================================= --}}
<style>
    .bs-scope {
        --ink: #16212D;
        --muted: #6B7684;
        --paper: #F4F6F8;
        --surface: #FFFFFF;
        --line: #E1E5EA;
        --accent: #0E7C6B;
        --accent-dark: #0A5F52;
        --amber: #B9720F;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
        padding: 2.5rem 1.5rem;
        background: transparent;
    }
    .bs-header {
        max-width: 1200px;
        margin: 0 auto 2rem;
        text-align: center;
    }
    .bs-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.35rem;
    }
    .bs-header h2 {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 2rem;
        letter-spacing: -0.02em;
        color: var(--ink);
        margin: 0;
    }
    .bs-filters {
        max-width: 1200px;
        margin: 0 auto 1.5rem;
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    .bs-pill {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.78rem;
        padding: 0.45rem 0.9rem;
        border-radius: 20px;
        border: 1px solid var(--line);
        background: #fff;
        color: var(--muted);
        cursor: pointer;
        transition: all 0.15s ease;
    }
    .bs-pill.active,
    .bs-pill:hover {
        background: var(--ink);
        color: #fff;
        border-color: var(--ink);
    }
    .bs-grid {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
        gap: 1.5rem;
    }
    .bs-card {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 12px;
        overflow: hidden;
        position: relative;
        display: flex;
        flex-direction: column;
        transition: transform 0.18s ease, box-shadow 0.18s ease;
    }
    .bs-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 24px rgba(22, 33, 45, 0.1);
    }
    .bs-badge {
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        background: var(--ink);
        color: #fff;
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.68rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.25rem 0.6rem;
        border-radius: 20px;
        z-index: 1;
    }
    .bs-card-img {
        width: 100%;
        aspect-ratio: 4 / 3;
        object-fit: contain;
        background: #F4F6F8;
        padding: 0.75rem;
        display: block;
    }
    .bs-card-body {
        padding: 1.1rem 1.2rem 1.3rem;
        display: flex;
        flex-direction: column;
        gap: 0.65rem;
    }
    .bs-card-title {
        font-family: 'Google Sans Flex', sans-serif;
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--ink);
        margin: 0;
    }
    .bs-tags {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }
    .bs-tag {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.78rem;
        padding: 0.2rem 0.55rem;
        border-radius: 5px;
        border: 1px solid var(--line);
    }
    .bs-tag-price { color: var(--amber); border-color: #ECD5A8; background: #FBF3E6; }
    .bs-tag-stock { color: var(--accent-dark); border-color: #BFE3D6; background: #EAF6F2; }
    .bs-card-actions {
        margin-top: 0.3rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding-top: 0.7rem;
        border-top: 1px solid var(--line);
    }
    .bs-link {
        font-size: 0.85rem;
        font-weight: 600;
        text-decoration: none;
        color: var(--ink);
    }
    .bs-link:hover { color: var(--accent); }
    .bs-cart-btn {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.82rem;
        background: var(--accent);
        color: #fff;
        border: none;
        padding: 0.4rem 0.85rem;
        border-radius: 6px;
        text-decoration: none;
        margin-left: auto;
        transition: background 0.15s ease;
    }
    .bs-cart-btn:hover { background: var(--accent-dark); color: #fff; }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<section class="bs-scope">

    <div class="bs-header">
        <div class="bs-eyebrow">Handpicked</div>
        <h2>Best Seller</h2>
    </div>

    @php
        $bestSellers = [
            ['name' => 'iPhone 15',        'price' => 1099.00, 'stock' => 20, 'image' => 'Iphone 15.jpg',       'category' => 'smartphones'],
            ['name' => 'Acer Aspire 14 AI Copilot',       'price' => 4999.00, 'stock' => 10, 'image' => '61kp09SeFyL._AC_SY300_SX300_QL70_FMwebp_.webp', 'category' => 'laptops'],
            ['name' => 'AirPods Pro',           'price' => 299.00,  'stock' => 50, 'image' => 'AirPods_Pro_2nd-Gen-1.png', 'category' => 'headphones'],
            ['name' => 'Samsung Galaxy S23 Ultra',  'price' => 1499.00,  'stock' => 30, 'image' => '1787845794.jpg', 'category' => 'smartphones'],
        ];
    @endphp

    <div class="bs-filters">
        <button class="bs-pill active" data-filter="all">All Devices</button>
        <button class="bs-pill" data-filter="smartphones">Smartphones</button>
        <button class="bs-pill" data-filter="headphones">Headphones</button>
        <button class="bs-pill" data-filter="laptops">Laptops</button>
    </div>

    <div class="bs-grid">
        @foreach ($bestSellers as $product)
            <div class="bs-card" data-category="{{ $product['category'] }}">
                <span class="bs-badge">Sale</span>
                <img class="bs-card-img"
                     src="{{ asset('images/brands/' . $product['image']) }}"
                     alt="{{ $product['name'] }}">
                <div class="bs-card-body">
                    <h3 class="bs-card-title">{{ $product['name'] }}</h3>
                        <div class=" card-subtitle">${{ number_format($product['price'], 2) }}</div>
                        <div class=" card-text">{{ $product['stock'] }} in stock</div>
        
                </div>
            </div>
        @endforeach
    </div>

</section>

<script>
    document.querySelectorAll('.bs-pill').forEach(pill => {
        pill.addEventListener('click', () => {
            document.querySelectorAll('.bs-pill').forEach(p => p.classList.remove('active'));
            pill.classList.add('active');
            const filter = pill.dataset.filter;
            document.querySelectorAll('.bs-card').forEach(card => {
                card.style.display = (filter === 'all' || card.dataset.category === filter) ? '' : 'none';
            });
        });
    });
</script>

{{-- ================================================= --}}
{{-- FEATURED COLLECTIONS --}}
{{-- ================================================= --}}
<style>
    .fc-scope {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 1.5rem;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
    }
    .fc-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
    }
    .fc-header h2 {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.8rem;
        color: #16212D;
        margin: 0;
    }
    .fc-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #6B7684;
        margin-bottom: 0.35rem;
    }
    .fc-see-all {
        font-size: 0.85rem;
        font-weight: 600;
        color: #0E7C6B;
        text-decoration: none;
    }
    .fc-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.25rem;
    }
    @media (max-width: 768px) {
        .fc-grid { grid-template-columns: repeat(2, 1fr); }
    }
    .fc-card {
        background: #fff;
        border: 1px solid #E1E5EA;
        border-radius: 12px;
        padding: 1.2rem;
        text-decoration: none;
        display: block;
        transition: transform 0.15s ease, box-shadow 0.15s ease;
    }
    .fc-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(22, 33, 45, 0.08);
    }
    .fc-icon {
        width: 38px;
        height: 38px;
        border-radius: 8px;
        background: #F4F6F8;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 0.8rem;
        color: #16212D;
    }
    .fc-name {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1rem;
        color: #16212D;
        margin: 0 0 0.3rem;
    }
    .fc-desc {
        font-size: 0.82rem;
        color: #6B7684;
        margin: 0;
        line-height: 1.5;
    }
</style>

<section class="fc-scope">

    <div class="fc-header">
        <div>
            <div class="fc-eyebrow">Hardware Directory</div>
            <h2>Featured Collections</h2>
        </div>
        <a href="{{ route('products.index') }}" class="fc-see-all">Browse All Products →</a>
    </div>

    <div class="fc-grid">

        <a href="{{ route('products.index') }}" class="fc-card">
            <div class="fc-icon">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="12" rx="2"/><path d="M6 20h12"/></svg>
            </div>
            <h3 class="fc-name">Laptops &amp; Mac</h3>
            <p class="fc-desc">Powerful laptops and Macs for work, study, and entertainment.</p>
        </a>

        <a href="{{ route('products.index') }}" class="fc-card">
            <div class="fc-icon">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="7" y="2" width="10" height="20" rx="2"/><path d="M11 18h2"/></svg>
            </div>
            <h3 class="fc-name">Smartphones</h3>
            <p class="fc-desc">Explore the latest smartphones for every budget and lifestyle.</p>
        </a>

        <a href="{{ route('products.index') }}" class="fc-card">
            <div class="fc-icon">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1v-6h3z"/><path d="M3 19a2 2 0 0 0 2 2h1v-6H3z"/></svg>
            </div>
            <h3 class="fc-name">Audio &amp; Acoustics</h3>
            <p class="fc-desc">Headphones, earbuds, and speakers for an immersive experience.</p>
        </a>

        <a href="{{ route('products.index') }}" class="fc-card">
            <div class="fc-icon">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M12 2v4M12 18v4M4.9 4.9l2.8 2.8M16.3 16.3l2.8 2.8M2 12h4M18 12h4M4.9 19.1l2.8-2.8M16.3 7.7l2.8-2.8"/></svg>
            </div>
            <h3 class="fc-name">Smart Accessories</h3>
            <p class="fc-desc">Smartwatches, hubs, chargers, and essential tech accessories.</p>
        </a>

    </div>
</section>

{{-- ================================================= --}}
{{-- ABOUT US --}}
{{-- ================================================= --}}
<style>
    .au-scope {
        --ink: #16212D;
        --muted: #6B7684;
        --paper: #F4F6F8;
        --surface: #FFFFFF;
        --line: #E1E5EA;
        --accent: #0E7C6B;
        --accent-dark: #0A5F52;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
        background: transparent;
        padding: 1.5rem 1.5rem 4rem;
    }
    .au-wrap {
        max-width: 1200px;
        margin: 0 auto;
        background: #fff;
        border-radius: 16px;
        padding: 3rem;
        box-shadow: 0 1px 3px rgba(22, 33, 45, 0.06);
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
    }
    @media (max-width: 768px) {
        .au-wrap { grid-template-columns: 1fr; }
    }
    .au-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--accent-dark);
        margin-bottom: 0.5rem;
    }
    .au-content h2 {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 2.1rem;
        letter-spacing: -0.02em;
        color: var(--ink);
        margin: 0 0 1rem;
    }
    .au-content p {
        color: var(--muted);
        line-height: 1.7;
        margin-bottom: 1rem;
    }
    .au-stats {
        display: flex;
        gap: 2rem;
        margin: 1.5rem 0;
        flex-wrap: wrap;
    }
    .au-stat-num {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 700;
        font-size: 1.6rem;
        color: var(--ink);
        display: block;
    }
    .au-stat-label {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.72rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--muted);
    }
    .au-btn {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.9rem;
        background: var(--ink);
        color: #fff;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
        transition: background 0.15s ease;
    }
    .au-btn:hover { background: var(--accent-dark); color: #fff; }
</style>

<section class="au-scope">
    <div class="au-wrap">

        <div>
            <img src="{{ asset('images/brands/1787845822-removebg-preview.png') }}"
                 alt="Store"
                 style="width:100%; border-radius:12px; aspect-ratio:4/3; object-fit:contain; background:#F4F6F8; padding:1rem;">
        </div>

        <div class="au-content">
            <div class="au-eyebrow">Who We Are</div>
            <h2>About Our Store</h2>
            <p>
                We're a store built for people who want the latest tech without the guesswork —
                laptops, mobiles, and accessories curated from trusted brands, at prices that
                actually make sense.
            </p>
            <p>
                Whether you're shopping for work, study, or everyday use, our team picks products
                we'd genuinely recommend to a friend — and we back that up with fast shipping and
                real support after you buy.
            </p>

            <div class="au-stats">
                <div>
                    <span class="au-stat-num">500+</span>
                    <span class="au-stat-label">Products</span>
                </div>
                <div>
                    <span class="au-stat-num">10k+</span>
                    <span class="au-stat-label">Happy Customers</span>
                </div>
                <div>
                    <span class="au-stat-num">24/7</span>
                    <span class="au-stat-label">Support</span>
                </div>
            </div>

            <a href="{{ url('/about') }}" class="au-btn">Learn More About Us</a>
        </div>

    </div>
</section>

</div>

@endsection