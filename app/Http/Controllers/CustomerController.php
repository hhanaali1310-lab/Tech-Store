<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;

        $totalOrders = Order::where('user_id', $userId)->count();
        $pendingOrders = Order::where('user_id', $userId)
            ->whereNotIn('status', ['cancelled', 'completed', 'delivered'])
            ->count();

        $recentOrders = Order::where('user_id', $userId)->latest()->take(5)->get();

        return view('customer.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'recentOrders'
        ));
    }
}
