@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="container mx-auto px-4 py-6 pt-28">
    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

    @if ($items->count() > 0)
    <div class="bg-white shadow rounded-lg p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3 text-left">Book</th>
                    <th class="p-3 text-center">Price</th>
                    <th class="p-3 text-center">Quantity</th>
                    <th class="p-3 text-center">Subtotal</th>
                    <th class="p-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach ($items as $item)
                @php
                $subtotal = $item->book->price * $item->quantity;
                $total += $subtotal;
                @endphp
                <tr class="border-t">
                    <td class="p-3">
                        <div class="flex items-center space-x-3">
                            <img src="{{ asset('storage/' . $item->book->cover) }}"
                                alt="{{ $item->book->title }}"
                                class="w-16 h-20 object-cover rounded">
                            <div>
                                <p class="font-semibold">{{ $item->book->title }}</p>
                                <p class="text-sm text-gray-500">by {{ $item->book->author }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="p-3 text-center">Rp {{ number_format($item->book->price, 0, ',', '.') }}</td>
                    <td class="p-3 text-center">
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="inline-flex">
                            @csrf
                            @method('PUT')
                            <input type="number" name="quantity" value="{{ $item->quantity }}"
                                min="1"
                                class="w-16 border rounded px-2 py-1 text-center">
                            <button type="submit"
                                class="ml-2 px-2 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Update
                            </button>
                        </form>
                    </td>
                    <td class="p-3 text-center font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    <td class="p-3 text-center">
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Remove this item?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                Remove
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total & Checkout -->
        <div class="flex justify-between items-center mt-6">
            <p class="text-xl font-bold">Total: Rp {{ number_format($total, 0, ',', '.') }}</p>
            <form action="{{ route('checkout.index') }}" method="GET">
                <button type="submit"
                    class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Checkout
                </button>
            </form>
        </div>
    </div>
    @else
    <p class="text-gray-500">Your cart is empty.</p>
    @endif
</div>
@endsection