@extends('layouts.app')

@section('title', 'Order Details')

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

    .ord-wrap { max-width: 760px; margin: 0 auto; }

    .ord-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        margin-bottom: 2rem;
        flex-wrap: wrap;
        gap: 1rem;
        border-bottom: 1px solid var(--line);
        padding-bottom: 1.25rem;
    }
    .ord-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.35rem;
    }
    .ord-header h1 {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.7rem;
        letter-spacing: -0.02em;
        margin: 0;
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

    .ord-card {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 12px;
        margin-bottom: 1.5rem;
        overflow: hidden;
    }
    .ord-card-header {
        padding: 1.1rem 1.5rem;
        border-bottom: 1px solid var(--line);
        background: var(--paper);
    }
    .ord-card-header h3 {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.05rem;
        margin: 0;
    }
    .ord-card-body { padding: 1.3rem 1.5rem; }

    .ord-card-body p {
        margin: 0.4rem 0;
        font-size: 0.9rem;
        color: var(--ink);
    }
    .ord-card-body p strong {
        color: var(--muted);
        font-weight: 600;
        margin-right: 0.3rem;
    }

    .ord-section-title {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.2rem;
        margin: 0 0 1rem;
        color: var(--ink);
    }

    .ord-item-card {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 10px;
        padding: 1.1rem 1.3rem;
        margin-bottom: 0.85rem;
    }
    .ord-item-card p {
        margin: 0.3rem 0;
        font-size: 0.88rem;
        color: var(--ink);
    }
    .ord-item-card p strong {
        color: var(--muted);
        font-weight: 600;
        margin-right: 0.3rem;
    }

    .ord-alert-info {
        background: #EEF2FF;
        border: 1px solid #C7D2FE;
        color: var(--info);
        padding: 0.85rem 1.1rem;
        border-radius: 8px;
        font-size: 0.9rem;
        margin-bottom: 1rem;
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<div class="ord-scope">
    <div class="ord-wrap">

        <div class="ord-header">
            <div>
                <div class="ord-eyebrow">Order</div>
                <h1>Order #{{ $order->id }}</h1>
            </div>

            <a href="{{ route('orders.index') }}"
               class="ord-btn">
                Back to My Orders
            </a>
        </div>


        {{-- Order Information --}}
        <div class="ord-card">

            <div class="ord-card-header">
                <h3>Order Information</h3>
            </div>

            <div class="ord-card-body">

                <p>
                    <strong>Status:</strong>
                    {{ $order->status }}
                </p>

                <p>
                    <strong>Total:</strong>
                    ${{ $order->total }}
                </p>

                <p>
                    <strong>Shipping Address:</strong>
                    {{ $order->shipping_address }}
                </p>

                <p>
                    <strong>Phone:</strong>
                    {{ $order->phone }}
                </p>

            </div>

        </div>


        {{-- Order Items --}}
        <h2 class="ord-section-title">Order Items</h2>

        @if($order->orderItems->count() > 0)

            @foreach($order->orderItems as $item)

                <div class="ord-item-card">

                    <p>
                        <strong>Product ID:</strong>
                        {{ $item->prodact_id }}
                    </p>

                    <p>
                        <strong>Quantity:</strong>
                        {{ $item->quantity }}
                    </p>

                    <p>
                        <strong>Price:</strong>
                        ${{ $item->price }}
                    </p>

                </div>

            @endforeach

        @else

            <div class="ord-alert-info">
                No items found for this order.
            </div>

        @endif


        <a href="{{ route('orders.index') }}"
           class="ord-btn">
            Back to My Orders
        </a>

    </div>
</div>

@endsection