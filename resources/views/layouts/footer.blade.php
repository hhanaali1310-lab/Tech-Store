{{-- ================================================= --}}
{{-- FOOTER --}}
{{-- ================================================= --}}
<style>
    .ft-scope {
        --ink: #16212D;
        --muted: #6B7684;
        --paper: #F4F6F8;
        --line: #E1E5EA;
        --accent: #0E7C6B;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
        background: var(--paper);
        border-top: 1px solid var(--line);
        padding: 2.5rem 1.5rem 1.5rem;
    }
    .ft-wrap {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 2rem;
    }
    .ft-brand {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.3rem;
        color: var(--ink);
        margin: 0 0 0.5rem;
    }
    .ft-tagline {
        color: var(--muted);
        font-size: 0.88rem;
        max-width: 260px;
        line-height: 1.6;
    }
    .ft-col h6 {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.9rem;
    }
    .ft-col a {
        display: block;
        color: var(--ink);
        text-decoration: none;
        font-size: 0.9rem;
        margin-bottom: 0.6rem;
        transition: color 0.15s ease;
    }
    .ft-col a:hover { color: var(--accent); }
    .ft-bottom {
        max-width: 1200px;
        margin: 2rem auto 0;
        padding-top: 1.25rem;
        border-top: 1px solid var(--line);
        text-align: center;
        color: var(--muted);
        font-size: 0.8rem;
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<footer class="ft-scope">
    <div class="ft-wrap">

        <div>
            <p class="ft-brand">Tech Store</p>
            <p class="ft-tagline">Laptops, mobiles &amp; accessories for work, study, and everyday life.</p>
        </div>

        <div class="ft-col">
            <h6>Shop</h6>
            <a href="{{ url('/products') }}">Products</a>
            @if(auth()->check() && auth()->user()->role == 'admin')
            <a href="{{ url('/categories') }}">Categories</a>
            <a href="{{ url('/dashboard') }}">Dashboard</a>

            @endif
            @if(auth()->check() && auth()->user()->role == 'customer')
            <a href="{{ url('/cart') }}">Cart</a>
            <a href="{{ url('/orders') }}">Orders</a>
            @endif  
        </div>

        <div class="ft-col">
            <h6>Company</h6>
            <a href="{{ url('/') }}">About Us</a>
            <a href="{{ url('/') }}">Contact</a>
        </div>


    </div>

    <div class="ft-bottom">
        &copy; {{ date('Y') }} Tech Store. All rights reserved.
    </div>
</footer>