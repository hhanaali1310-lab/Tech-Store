@extends('layouts.app')

@section('content')

    <title>Cart</title>

    <style>
        .ct-scope {
            --ink: #16212D;
            --muted: #6B7684;
            --paper: #F4F6F8;
            --surface: #FFFFFF;
            --line: #E1E5EA;
            --accent: #0E7C6B;
            --accent-dark: #0A5F52;
            --danger: #B23A2E;
            --danger-dark: #8F2E24;
            --amber: #B9720F;
            font-family: 'Google Sans Flex', system-ui, sans-serif;
            color: var(--ink);
            background: #ECEFF2;
            min-height: 100vh;
            padding: 2.5rem 1.5rem 4rem;
        }
        .ct-scope * { box-sizing: border-box; }

        .ct-container {
            max-width: 760px;
            margin: 0 auto;
        }

        .ct-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .ct-eyebrow {
            font-family: 'Google Sans Flex', monospace;
            font-size: 0.7rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 0.35rem;
        }
        .ct-header h1 {
            font-family: 'Google Sans Flex', sans-serif;
            font-weight: 600;
            font-size: 1.9rem;
            letter-spacing: -0.02em;
            margin: 0;
        }

        .ct-card {
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: 12px;
            padding: 1.1rem 1.3rem;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            transition: box-shadow 0.15s ease;
        }
        .ct-card:hover {
            box-shadow: 0 6px 16px rgba(22, 33, 45, 0.06);
        }

        .ct-info h3 {
            font-family: 'Google Sans Flex', sans-serif;
            font-weight: 600;
            font-size: 1.05rem;
            margin: 0 0 0.4rem;
            color: var(--ink);
        }
        .ct-info p {
            margin: 0.15rem 0;
            font-size: 0.88rem;
            color: var(--muted);
        }
        .ct-qty {
            font-family: 'Google Sans Flex', monospace;
            font-weight: 600;
            color: var(--ink);
        }

        .ct-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .ct-actions a {
            width: 34px;
            height: 34px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 8px;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 600;
            transition: 0.15s ease;
            border: 1px solid var(--line);
        }
        .ct-plus {
            color: var(--accent-dark);
            background: #EAF6F2;
            border-color: #BFE3D6;
        }
        .ct-plus:hover { background: var(--accent); color: #fff; }

        .ct-minus {
            color: var(--amber);
            background: #FBF3E6;
            border-color: #ECD5A8;
        }
        .ct-minus:hover { background: var(--amber); color: #fff; }

        .ct-delete {
            color: var(--danger);
            background: #FCEEEC;
            border-color: #F0C9C2;
        }
        .ct-delete:hover { background: var(--danger); color: #fff; }

        .ct-total {
            text-align: right;
            font-family: 'Google Sans Flex', sans-serif;
            font-size: 1.3rem;
            font-weight: 600;
            margin-top: 1.5rem;
            color: var(--ink);
        }

        .ct-checkout {
            display: block;
            text-align: center;
            background: var(--accent);
            color: #fff;
            padding: 0.9rem;
            margin-top: 1.25rem;
            border-radius: 10px;
            text-decoration: none;
            font-family: 'Google Sans Flex', sans-serif;
            font-weight: 600;
            font-size: 1rem;
            transition: background 0.15s ease;
        }
        .ct-checkout:hover { background: var(--accent-dark); }

        .ct-empty {
            text-align: center;
            font-size: 0.95rem;
            color: var(--muted);
            margin-top: 3rem;
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

    <div class="ct-scope">
        <div class="ct-container">

            <div class="ct-header">
                <div class="ct-eyebrow">Your Selections</div>
                <h1>🛒 My Cart</h1>
            </div>

            @if($cart->items->isEmpty())

                <p class="ct-empty">Your cart is empty</p>

            @else

                @php
                    $total = 0;
                @endphp

                @foreach($cart->items as $item)

                    @php
                        $total += $item->product->price * $item->quantity;
                    @endphp

                    <div class="ct-card">

                        <div class="ct-info">

                            <h3>
                                {{ $item->product->name }}
                            </h3>

                            <p>
                                Price: {{ $item->product->price }} EGP
                            </p>

                            <p class="ct-qty">
                                Qty: {{ $item->quantity }}
                            </p>

                        </div>

                        <div class="ct-actions">

                            <a
                                class="ct-plus"
                                href="{{ url('/cart/increase/' . $item->product_id) }}">
                                +
                            </a>

                            <a
                                class="ct-minus"
                                href="{{ url('/cart/decrease/' . $item->product_id) }}">
                                -
                            </a>

                            <a
                                class="ct-delete"
                                href="{{ url('/cart/delete/' . $item->product_id) }}">
                                ✖
                            </a>

                        </div>

                    </div>

                @endforeach

                <div class="ct-total">
                    Total: {{ $total }} EGP
                </div>

                <a class="ct-checkout" href="{{ url('/checkout') }}">
                    Checkout
                </a>

            @endif

        </div>
    </div>

@endsection