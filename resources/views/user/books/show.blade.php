@extends('layouts.app')

@section('title', $book->title)

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-amber-50">
    <div class="container mx-auto px-4 py-6 pt-28">

        {{-- Flash messages --}}
        @if(session('success'))
        <div class="mb-6 bg-green-50/90 backdrop-blur-sm border border-green-200 rounded-2xl p-4 shadow-lg">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-green-800 font-medium">{{ session('success') }}</span>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="mb-6 bg-red-50/90 backdrop-blur-sm border border-red-200 rounded-2xl p-4 shadow-lg">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-red-800 font-medium">{{ session('error') }}</span>
            </div>
        </div>
        @endif

        {{-- Back navigation --}}
        <div class="mb-6">
            <a href="{{ url()->previous() }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-orange-600 transition-colors duration-300 group">
                <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="font-medium">Back to Catalog</span>
            </a>
        </div>

        {{-- Main content --}}
        <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl overflow-hidden shadow-xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">

                {{-- Book Image Section --}}
                <div class="relative bg-gradient-to-br from-gray-200 to-gray-300 lg:min-h-[600px] flex items-center justify-center p-8">
                    {{-- Wishlist Button --}}
                    <form action="{{ route('wishlist.store', $book->id) }}" method="POST"
                        class="absolute top-6 right-6 z-10">
                        @csrf
                        <button type="submit"
                            class="w-12 h-12 bg-white/90 backdrop-blur-sm rounded-full 
                                       flex items-center justify-center shadow-lg hover:shadow-xl 
                                       transform hover:scale-110 transition-all duration-300 
                                       border border-white/50 hover:border-red-200 group">
                            @if(auth()->check() && auth()->user()->wishlist->contains($book->id))
                            <svg class="w-6 h-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg>
                            @else
                            <svg class="w-6 h-6 text-gray-400 group-hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            @endif
                        </button>
                    </form>

                    @if($book->cover)
                    <img src="{{ asset('storage/'.$book->cover) }}"
                        alt="{{ $book->title }}"
                        class="max-w-full max-h-full object-cover rounded-xl shadow-2xl transform hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-80 h-96 bg-gradient-to-br from-gray-300 to-gray-400 rounded-xl shadow-2xl flex items-center justify-center">
                        <svg class="w-20 h-20 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    @endif
                </div>

                {{-- Book Details Section --}}
                <div class="p-8 lg:p-12">
                    {{-- Title and Author --}}
                    <div class="mb-6">
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-4 leading-tight">
                            {{ $book->title }}
                        </h1>
                        <div class="flex items-center gap-2 text-xl text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span>by {{ $book->author }}</span>
                        </div>
                    </div>

                    {{-- Price and Stock --}}
                    <div class="mb-8 p-6 bg-gradient-to-r from-amber-50 to-orange-50 rounded-2xl border border-amber-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-3xl font-bold text-gray-800 mb-1">
                                    Rp {{ number_format($book->price, 0, ',', '.') }}
                                </div>
                                @if($book->isbn)
                                <div class="text-sm text-gray-600">
                                    ISBN: {{ $book->isbn }}
                                </div>
                                @endif
                            </div>

                            <div class="text-right">
                                @if($book->stock > 10)
                                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-800 font-semibold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    In Stock ({{ $book->stock }})
                                </div>
                                @elseif($book->stock > 0)
                                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-yellow-100 text-yellow-800 font-semibold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    Low Stock ({{ $book->stock }})
                                </div>
                                @else
                                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-800 font-semibold">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Out of Stock
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Description --}}
                    @if($book->description)
                    <div class="mb-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            About This Book
                        </h3>
                        <div class="text-gray-700 leading-relaxed text-lg whitespace-pre-line">
                            {{ $book->description }}
                        </div>
                    </div>
                    @endif

                    {{-- Actions --}}
                    <div class="space-y-4">
                        @auth
                        <form action="{{ route('user.books.addToCart', $book->id) }}" method="POST">
                            @csrf
                            <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-end">
                                <div class="flex-shrink-0">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Quantity</label>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ max(1, $book->stock) }}"
                                        class="w-20 px-3 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-orange-400 transition-all duration-300 bg-white/50 backdrop-blur-sm text-center font-semibold"
                                        {{ $book->stock == 0 ? 'disabled' : '' }}>
                                </div>

                                <div class="flex flex-col sm:flex-row gap-3 flex-1">
                                    <button type="submit"
                                        class="flex-1 bg-gradient-to-r from-yellow-400 to-orange-400 text-black px-8 py-3 
                                                   rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                                                   transition-all duration-300 flex items-center justify-center gap-3 text-lg
                                                   disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none disabled:shadow-none"
                                        {{ $book->stock == 0 ? 'disabled' : '' }}>
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 4H20M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6"></path>
                                        </svg>
                                        {{ $book->stock == 0 ? 'Out of Stock' : 'Add to Cart' }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        {{-- Buy Now Option --}}
                        <!-- @if($book->stock > 0)
                        <form action="{{ route('user.checkout.buyNow', $book->id) }}" method="POST">
                            @csrf
                            
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-green-500 to-green-600 text-white px-8 py-3 
                                           rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                                           transition-all duration-300 flex items-center justify-center gap-3 text-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                Buy Now
                            </button>
                        </form>
                        @endif -->

                        <p class="text-sm text-gray-600 bg-blue-50 rounded-lg p-3 border border-blue-200">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Stock is reduced only after checkout is processed by admin.
                        </p>

                        @else
                        <a href="{{ route('login') }}"
                            class="w-full bg-gradient-to-r from-gray-600 to-gray-700 text-white px-8 py-3 
                                  rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                                  transition-all duration-300 flex items-center justify-center gap-3 text-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Login to Purchase
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Quantity validation script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const qty = document.getElementById('quantity');
        if (!qty) return;

        qty.addEventListener('input', function() {
            const max = parseInt(this.max) || 1;
            const min = parseInt(this.min) || 1;

            if (parseInt(this.value) > max) this.value = max;
            if (parseInt(this.value) < min) this.value = min;
        });
    });
</script>

@endsection