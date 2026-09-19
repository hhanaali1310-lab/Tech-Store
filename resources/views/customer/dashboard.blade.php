@extends('layouts.app')

@section('title', 'My Dashboard')

@section('content')

<style>
    .dash-scope {
        --ink: #16212D;
        --muted: #6B7684;
        --paper: #F4F6F8;
        --surface: #FFFFFF;
        --line: #E1E5EA;
        --accent: #0E7C6B;
        --accent-dark: #0A5F52;
        --amber: #B9720F;
        font-family: 'Google Sans Flex', system-ui, sans-serif;
        color: var(--ink);
        background: #ECEFF2;
        min-height: 100vh;
        padding: 2.5rem 1.5rem 4rem;
    }
    .dash-scope * { box-sizing: border-box; }
    .dash-wrap { max-width: 900px; margin: 0 auto; }

    .dash-header { margin-bottom: 2rem; }
    .dash-eyebrow {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.35rem;
    }
    .dash-header h1 {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.9rem;
        letter-spacing: -0.02em;
        margin: 0;
    }

    .dash-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1.1rem;
        margin-bottom: 2rem;
    }
    .dash-stat {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 12px;
        padding: 1.4rem 1.5rem;
    }
    .dash-stat-label {
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 0.5rem;
    }
    .dash-stat-value {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 700;
        font-size: 1.8rem;
        color: var(--ink);
    }

    .dash-quick-links {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
        margin-bottom: 2.5rem;
    }
    .dash-link-btn {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 0.85rem;
        text-decoration: none;
        padding: 0.6rem 1.1rem;
        border-radius: 6px;
        border: 1px solid var(--line);
        color: var(--ink);
        background: var(--surface);
    }
    .dash-link-btn:hover { border-color: var(--accent); color: var(--accent-dark); }
    .dash-link-btn-primary { background: var(--accent); color: #fff; border: none; }
    .dash-link-btn-primary:hover { background: var(--accent-dark); color: #fff; }

    .dash-section-title {
        font-family: 'Google Sans Flex', sans-serif;
        font-weight: 600;
        font-size: 1.2rem;
        margin: 0 0 1.1rem;
    }

    .dash-table-card {
        background: var(--surface);
        border: 1px solid var(--line);
        border-radius: 12px;
        overflow-x: auto;
    }
    table.dash-table { width: 100%; min-width: 480px; border-collapse: collapse; font-size: 0.9rem; }
    table.dash-table th {
        text-align: left;
        font-family: 'Google Sans Flex', monospace;
        font-size: 0.7rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--muted);
        background: var(--paper);
        padding: 0.75rem 1.25rem;
        border-bottom: 1px solid var(--line);
    }
    table.dash-table td {
        padding: 0.85rem 1.25rem;
        border-bottom: 1px solid var(--line);
        vertical-align: middle;
    }
    table.dash-table tr:last-child td { border-bottom: none; }
    table.dash-table a { color: var(--accent-dark); text-decoration: none; font-weight: 600; font-size: 0.85rem; }
    table.dash-table a:hover { color: var(--accent); }

    .dash-badge {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 600;
        padding: 0.25rem 0.6rem;
        border-radius: 20px;
        text-transform: capitalize;
    }
    .dash-badge-pending { background: #FBF3E6; color: var(--amber); }
    .dash-badge-completed,
    .dash-badge-delivered { background: #E9F5F1; color: var(--accent-dark); }
    .dash-badge-cancelled { background: #FCEEEC; color: #B23A2E; }
    .dash-badge-default { background: #EEF2FF; color: #2563EB; }

    .dash-empty {
        padding: 2.5rem 1.5rem;
        text-align: center;
        color: var(--muted);
        font-size: 0.9rem;
    }
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&display=swap" rel="stylesheet">

<div class="dash-scope">
    <div class="dash-wrap">

        <div class="dash-header">
            <div class="dash-eyebrow">Account</div>
            <h1>Welcome back, {{ auth()->user()->name }}</h1>
        </div>

        <div class="dash-stats">
            <div class="dash-stat">
                <div class="dash-stat-label">Total Orders</div>
                <div class="dash-stat-value">{{ $totalOrders }}</div>
            </div>
            <div class="dash-stat">
                <div class="dash-stat-label">In Progress</div>
                <div class="dash-stat-value">{{ $pendingOrders }}</div>
            </div>
        </div>

        <div class="dash-quick-links">
            <a href="{{ route('products.index') }}" class="dash-link-btn dash-link-btn-primary">Browse Products</a>
            <a href="{{ route('cart.index') }}" class="dash-link-btn">View Cart</a>
            <a href="{{ route('orders.history') }}" class="dash-link-btn">Order History</a>
        </div>

        <h2 class="dash-section-title">Recent Orders</h2>

        <div class="dash-table-card">
            @if($recentOrders->count() > 0)
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>${{ number_format((float) $order->total, 2) }}</td>
                                <td>
                                    @php
                                        $badgeClass = match($order->status) {
                                            'pending' => 'dash-badge-pending',
                                            'completed', 'delivered' => 'dash-badge-completed',
                                            'cancelled' => 'dash-badge-cancelled',
                                            default => 'dash-badge-default',
                                        };
                                    @endphp
                                    <span class="dash-badge {{ $badgeClass }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td><a href="{{ route('orders.show', $order->id) }}">View &rarr;</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="dash-empty">You haven't placed any orders yet.</div>
            @endif
        </div>

    </div>
</div>
@endsection
