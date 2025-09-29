<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Show all orders of logged-in user
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->with('items.book')
            ->latest()
            ->paginate(10);

        return view('user.orders.index', compact('orders'));
    }

    /**
     * Show detail of specific order
     */
    public function show($id)
    {
        $order = Order::where('user_id', Auth::id())
            ->with('items.book')
            ->findOrFail($id);

        return view('user.orders.show', compact('order'));
    }

    public function adminIndex()
    {
        $orders = Order::with('user', 'items.book')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function adminShow($id)
    {
        $order = Order::with('user', 'items.book')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function adminUpdateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processed,shipped,completed'
        ]);

        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);


        return redirect()->route('admin.orders.index')->with('success', 'Order status updated.');
    }
}
