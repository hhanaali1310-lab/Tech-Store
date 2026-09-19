@extends('layouts.app')

@section('title', 'Order History')

@section('content')

<style>
    .ord-scope {
        --ink: #16212D;
        --muted: #6B7684;
        --paper: #F4F6F8;
        --surface: #FFFFFF;
        --line: #E1E5EA;
        --accent: #0E7C6B;
        --accent-dark: #0A5F52;
        --info: #2563EB;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
        color: var(--ink);
        background: #ECEFF2;
        min-height: 100vh;
        padding: 2.5rem 1.5rem 4rem;
    }
    .ord-scope * { box-sizing: border-box; }

    .ord-wrap { max-width: 900px; margin: 0 auto; }

    .ord-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.35rem;
    }
    .ord-wrap h1 {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.9rem;
        letter-spacing: -0.02em;
        margin: 0 0 2rem;
        padding-bottom: 1.25rem;
        border-bottom: 1px solid var(--line);
    }

    .ord-btn {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        padding: 0.55rem 1.1rem;
        border-radius: 6px;
        border: 1px solid var(--line);
        color: var(--ink);
        background: var(--surface);
        display: inline-block;
    }
    .ord-btn:hover { border-color: var(--accent); color: var(--accent-dark); }

    .ord-btn-primary {
        background: var(--accent);
        color: #fff;
        border: none;
    }
    .ord-btn-primary:hover { background: var(--accent-dark); color: #fff; }

    .ord-card {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.1rem;
        transition: box-shadow 0.15s ease;
    }
    .ord-card:hover { box-shadow: 0 6px 16px rgba(22, 33, 45, 0.06); }

    .ord-card h3 {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.1rem;
        margin: 0 0 0.9rem;
    }

    .ord-card p {
        margin: 0.35rem 0;
        font-size: 0.9rem;
        color: var(--ink);
    }
    .ord-card p strong {
        color: var(--muted);
        font-weight: 600;
        margin-right: 0.3rem;
    }

    .ord-actions {
        margin-top: 1.1rem;
        padding-top: 1.1rem;
        border-top: 1px solid var(--line);
    }

    .ord-alert-info {
        background: #EEF2FF;
        border: 1px solid #C7D2FE;
        color: var(--info);
        padding: 0.85rem 1.1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        margin-bottom: 1.5rem;
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<div class="ord-scope">
    <div class="ord-wrap">

        <div class="ord-eyebrow">Account</div>
        <h1>Order History</h1>

        @if($orders->count() > 0)

            @foreach($orders as $order)

                <div class="ord-card">

                    <h3>
                        Order #{{ $order->id }}
                    </h3>

                    <p>
                        <strong>Total:</strong>
                        ${{ $order->total }}
                    </p>

                    <p>
                        <strong>Status:</strong>
                        {{ $order->status }}
                    </p>

                    <p>
                        <strong>Shipping Address:</strong>
                        {{ $order->shipping_address }}
                    </p>

                    <div class="ord-actions">
                        <a
                            href="{{ route('orders.show', $order->id) }}"
                            class="ord-btn ord-btn-primary"
                        >
                            Order Details
                        </a>
                    </div>

                </div>

            @endforeach

        @else

            <div class="ord-alert-info">
                You don't have any order history yet.
            </div>

        @endif

        <a
            href="{{ route('orders.index') }}"
            class="ord-btn"
        >
            Back to My Orders
        </a>

    </div>
</div>

@endsection