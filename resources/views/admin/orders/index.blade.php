@extends('layouts.app')

@section('title', 'All Orders')

@section('content')
<div class="max-w-7xl mx-auto pt-20 p-6">
    <h1 class="text-2xl font-bold mb-6">All Orders</h1>

    <table class="w-full border-collapse border border-gray-300 text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Total</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td class="border px-4 py-2">{{ $order->id }}</td>
                <td class="border px-4 py-2">{{ $order->user->name }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                <td class="border px-4 py-2">
                    <span class="px-2 py-1 rounded text-white 
                        @if($order->status === 'pending') bg-yellow-500 
                        @elseif($order->status === 'processed') bg-blue-500
                        @elseif($order->status === 'shipped') bg-purple-500
                        @else bg-green-600 @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.orders.show', $order->id) }}"
                        class="text-blue-600 hover:underline">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection