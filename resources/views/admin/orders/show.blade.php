@extends('layouts.app')

@section('title', 'Order Detail')

@section('content')
<div class="max-w-5xl mx-auto pt-20 p-6">
    <h1 class="text-2xl font-bold mb-6">Order #{{ $order->id }}</h1>

    <div class="mb-6">
        <p><strong>User:</strong> {{ $order->user->name }}</p>
        <p><strong>Email:</strong> {{ $order->user->email }}</p>
        <p><strong>Email:</strong> {{ $order->address }}</p>
        <p><strong>Status:</strong>
        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="inline-block">
            @csrf 
            @method('PUT')

            <select name="status" onchange="this.form.submit()"
                class="border rounded px-2 py-1 text-sm">
                <option value="pending" {{ $order->status=='pending' ? 'selected':'' }}>Pending</option>
                <option value="processed" {{ $order->status=='processed' ? 'selected':'' }}>Processed</option>
                <option value="shipped" {{ $order->status=='shipped' ? 'selected':'' }}>Shipped</option>
                <option value="completed" {{ $order->status=='completed' ? 'selected':'' }}>Completed</option>
            </select>
        </form>
        </p>
    </div>

    <h2 class="text-xl font-semibold mb-4">Order Items</h2>
    <table class="w-full border-collapse border border-gray-300 text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Book</th>
                <th class="border px-4 py-2">Quantity</th>
                <th class="border px-4 py-2">Price</th>
                <th class="border px-4 py-2">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
            <tr>
                <td class="border px-4 py-2">{{ $item->book->title }}</td>
                <td class="border px-4 py-2">{{ $item->quantity }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 text-right">
        <strong>Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</strong>
    </div>

    <a href="{{ route('orders.invoice', $order->id) }}"
        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
        Download Invoice
    </a>

</div>
@endsection