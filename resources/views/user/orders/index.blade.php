@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="container mx-auto px-4 py-6 pt-28">
    <h1 class="text-2xl font-bold mb-6">My Orders</h1>

    @forelse ($orders as $order)
    <div class="bg-white shadow rounded-lg p-4 mb-4">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500">Order #{{ $order->id }}</p>
                <p class="text-sm text-gray-600">Status:
                    <span class="font-semibold capitalize">{{ $order->status }}</span>
                </p>
                <p class="text-sm text-gray-600">Total:
                    <span class="font-bold text-blue-600">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </span>
                </p>
            </div>
            <a href="{{ route('user.orders.show', $order->id) }}"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                View
            </a>
        </div>
    </div>
    @empty
    <p class="text-gray-500">You have no orders yet.</p>
    @endforelse

    <div class="mt-6">
        {{ $orders->links() }}
    </div>
</div>
@endsection