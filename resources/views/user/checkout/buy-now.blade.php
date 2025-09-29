@extends('layouts.app')

@section('title', 'Buy Now Checkout')

@section('content')
<div class="container mx-auto px-4 py-6 pt-28">
    <h1 class="text-2xl font-bold mb-6">Checkout - Buy Now</h1>

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex gap-4">
            <img src="{{ $book->cover ? asset('storage/'.$book->cover) : 'https://via.placeholder.com/150' }}"
                alt="{{ $book->title }}"
                class="w-28 h-40 object-cover rounded">
            <div class="flex-1">
                <h2 class="text-lg font-semibold">{{ $book->title }}</h2>
                <p class="text-gray-600">by {{ $book->author }}</p>
                <p class="mt-2 text-gray-700">{{ Str::limit($book->description, 120) }}</p>
                <p class="mt-3">
                    <span class="font-semibold">Quantity:</span> {{ $quantity }}
                </p>
                <p class="mt-1 text-blue-600 font-bold">
                    Rp {{ number_format($book->price * $quantity, 0, ',', '.') }}
                </p>
            </div>
        </div>

        <div class="mt-6 border-t pt-4 flex justify-between items-center">
            <span class="text-lg font-semibold">Total:</span>
            <span class="text-xl font-bold text-blue-600">
                Rp {{ number_format($book->price * $quantity, 0, ',', '.') }}
            </span>
        </div>

        <form action="{{ route('checkout.buyNow.confirm') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit"
                class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
                Confirm Order
            </button>
            <a href="{{ route('user.dashboard') }}"
                class="ml-3 text-gray-600 hover:underline">Cancel</a>
        </form>
    </div>
</div>
@endsection