@extends('layouts.app')

@section('title', 'Order Detail')

@section('content')
<div class="container mx-auto px-4 py-6 pt-28">
    <h1 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h1>

    <!-- Order Info -->
    <div class="bg-white shadow rounded-lg p-4 mb-6">
        <p><span class="font-semibold">Status:</span> {{ ucfirst($order->status) }}</p>
        <p><span class="font-semibold">Payment:</span> {{ ucfirst($order->payment_method) }}</p>
        <p><span class="font-semibold">Total:</span> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
        <p><span class="font-semibold">Date:</span> {{ $order->created_at->format('d M Y H:i') }}</p>
    </div>

    <!-- Items -->
    <div class="bg-white shadow rounded-lg p-4">
        <h2 class="text-lg font-semibold mb-4">Items</h2>
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="p-2">Book</th>
                    <th class="p-2">Price</th>
                    <th class="p-2">Quantity</th>
                    <th class="p-2">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                <tr class="border-b">
                    <td class="p-2">{{ $item->book->title }}</td>
                    <td class="p-2">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td class="p-2">{{ $item->quantity }}</td>
                    <td class="p-2 font-semibold">
                        Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('orders.invoice', $order->id) }}"
        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
        Download Invoice
    </a>

</div>
@endsection