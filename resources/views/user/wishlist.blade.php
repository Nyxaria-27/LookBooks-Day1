@extends('layouts.app')

@section('title', 'My Wishlist')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-amber-50">
    <div class="container mx-auto px-4 py-6 pt-28">

        <!-- Page Header -->
        <div class="mb-8">
            <div class="text-center mb-6">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-4 flex items-center justify-center gap-3">
                    <svg class="w-12 h-12 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                    </svg>
                    My Wishlist
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Books you've saved for later - your future reading collection
                </p>
            </div>

            <!-- Stats Bar -->
            @if($books->count() > 0)
            <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg mb-8">
                <div class="flex items-center justify-center gap-8 text-center">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 bg-gradient-to-r from-pink-400 to-red-400 rounded-full flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        <div>
                            <div class="text-2xl font-bold text-gray-800">{{ $books->count() }}</div>
                            <div class="text-sm text-gray-600">{{ $books->count() == 1 ? 'Book' : 'Books' }} Saved</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Wishlist Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-12">
            @forelse ($books as $book)
            <div class="group">
                <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl overflow-hidden 
                            shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500 
                            relative group-hover:border-red-200">

                    <!-- Remove from Wishlist Button -->
                    

                    <!-- Wishlist Heart Icon -->
                    <div class="absolute top-4 left-4 z-10">
                        <div class="w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full 
                                    flex items-center justify-center shadow-lg border border-red-200">
                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Book Cover -->
                    <div class="relative overflow-hidden bg-gradient-to-br from-gray-200 to-gray-300">
                        @if($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}"
                            alt="{{ $book->title }}"
                            class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                        <div class="w-full h-64 flex items-center justify-center bg-gradient-to-br from-gray-200 to-gray-300">
                            <svg class="w-16 h-16 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                        </div>
                        @endif

                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Book Details -->
                    <div class="p-6">
                        <!-- Title & Author -->
                        <div class="mb-3">
                            <h2 class="text-lg font-bold text-gray-800 mb-1 line-clamp-2 group-hover:text-red-600 transition-colors">
                                {{ $book->title }}
                            </h2>
                            <p class="text-sm text-gray-600 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                by {{ $book->author }}
                            </p>
                        </div>

                        <!-- Description -->
                        @if($book->description)
                        <p class="text-sm text-gray-700 line-clamp-3 mb-4 leading-relaxed">
                            {{ $book->description }}
                        </p>
                        @endif

                        <!-- Price & Actions -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex flex-col">
                                <span class="text-2xl font-bold text-gray-800">
                                    Rp {{ number_format($book->price, 0, ',', '.') }}
                                </span>
                                @if($book->stock && $book->stock > 0)
                                <span class="text-xs text-green-600 font-medium">{{ $book->stock }} in stock</span>
                                @else
                                <span class="text-xs text-red-600 font-medium">Out of stock</span>
                                @endif
                            </div>

                            <div class="flex flex-col gap-2">
                                <!-- View Details Button -->
                                <a href="{{ route('user.books.show', $book->id) }}"
                                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium
                                          hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 
                                          flex items-center justify-center gap-2 min-w-[100px]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View Details
                                </a>

                                <!-- Add to Cart Button -->
                                @auth
                                <form action="{{ route('user.books.addToCart', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        {{ !$book->stock || $book->stock <= 0 ? 'disabled' : '' }}
                                        class="w-full bg-gradient-to-r from-yellow-400 to-orange-400 text-black px-4 py-2 
                                               rounded-lg text-sm font-bold shadow-lg hover:shadow-xl 
                                               transform hover:-translate-y-0.5 transition-all duration-300 
                                               flex items-center justify-center gap-2 min-w-[100px]
                                               disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none disabled:shadow-none">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 4H20M7 13v6a2 2 0 002 2h6a2 2 0 002-2v-6"></path>
                                        </svg>
                                        {{ !$book->stock || $book->stock <= 0 ? 'Out of Stock' : 'Add to Cart' }}
                                    </button>
                                </form>
                                @else
                                <a href="{{ route('login') }}"
                                    class="w-full bg-gradient-to-r from-gray-600 to-gray-700 text-white px-4 py-2 
                                           rounded-lg text-sm font-bold shadow-lg hover:shadow-xl 
                                           transform hover:-translate-y-0.5 transition-all duration-300 
                                           flex items-center justify-center gap-2 min-w-[100px]">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    Login to Buy
                                </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <!-- Empty State -->
            <div class="col-span-full">
                <div class="text-center py-16">
                    <div class="mx-auto w-24 h-24 bg-gradient-to-br from-red-100 to-pink-200 rounded-full 
                                flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Your Wishlist is Empty</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        Start building your reading wishlist by browsing our book collection and clicking the heart icon on books you love.
                    </p>
                    <a href="{{ route('user.dashboard') }}"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-400 to-orange-400 text-black 
                              px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                              transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Discover Books
                    </a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Back to catalog -->
        <div class="text-center">
            <a href="{{ route('user.dashboard') }}"
                class="inline-flex items-center gap-2 text-gray-600 hover:text-orange-600 transition-colors duration-300 group">
                <svg class="w-5 h-5 transform group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                <span class="font-medium">Continue Shopping</span>
            </a>
        </div>

    </div>
</div>
@endsection