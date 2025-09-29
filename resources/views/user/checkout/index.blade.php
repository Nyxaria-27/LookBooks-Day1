@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="max-w-3xl mx-auto pt-20 p-6 bg-white shadow rounded-lg">
    <h1 class="text-2xl font-bold mb-6">Checkout</h1>

    <form action="{{ route('checkout.store') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Alamat -->
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
            <textarea id="address" name="address" rows="3" required
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('address') }}</textarea>
            @error('address')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Metode Pembayaran -->
        <div>
            <label for="payment_method" class="block text-sm font-medium text-gray-700">Metode Pembayaran</label>
            <select id="payment_method" name="payment_method" required
                class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="cod">Cash on Delivery (COD)</option>
                <option value="bank_transfer">Transfer Bank</option>
                <option value="qris">QRIS</option>
            </select>
            @error('payment_method')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ringkasan -->
        <div class="bg-gray-50 p-4 rounded-lg">
            <h2 class="font-semibold text-gray-800 mb-2">Ringkasan Pesanan</h2>
            @foreach($cart->items as $item)
            <p class="text-sm text-gray-600">
                {{ $item->book->title }} × {{ $item->quantity }} = Rp{{ number_format($item->book->price * $item->quantity, 0, ',', '.') }}
            </p>
            @endforeach
            <p class="mt-2 font-bold text-lg">Total: Rp{{ number_format($total, 0, ',', '.') }}</p>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 shadow">
                Konfirmasi Pesanan
            </button>
        </div>
    </form>
</div>
@endsection