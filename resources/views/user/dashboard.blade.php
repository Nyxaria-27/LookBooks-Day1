@extends('layouts.app')
@section('title', 'Book Catalog')
@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-amber-50">
    <div class="container mx-auto px-4 py-6 pt-28">

        <!-- Page Header -->
        <div class="mb-8">
            <div class="text-center mb-6">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-4">
                    Book Catalog
                </h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Discover your next favorite book from our carefully curated collection
                </p>
            </div>

            <!-- Search & Filter Bar -->
            <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 shadow-lg mb-8">
                <div class="flex flex-col lg:flex-row gap-4 items-center">

                    <!-- Search Form -->
                    <form method="GET" action="{{ route('user.dashboard') }}" class="flex-1 w-full lg:w-auto">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" placeholder="Search books by title, author, or genre..."
                                value="{{ request('search') }}"
                                class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl 
                                          focus:ring-2 focus:ring-orange-400 focus:border-orange-400 
                                          transition-all duration-300 bg-white/50 backdrop-blur-sm">
                        </div>

                        <!-- Hidden inputs to preserve other filters -->
                        <input type="hidden" name="sort" value="{{ request('sort') }}">
                    </form>

                    <!-- Sort Dropdown -->
                    <form method="GET" action="{{ route('user.dashboard') }}" class="w-full lg:w-auto">
                        <select name="sort" onchange="this.form.submit()"
                            class="w-full lg:w-48 px-4 py-3 border border-gray-300 rounded-xl 
                                       focus:ring-2 focus:ring-orange-400 focus:border-orange-400 
                                       transition-all duration-300 bg-white/50 backdrop-blur-sm">
                            <option value="">Sort by...</option>
                            <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>Newest First</option>
                            <option value="oldest" {{ request('sort')=='oldest' ? 'selected' : '' }}>Oldest First</option>
                            <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                            <option value="price_desc" {{ request('sort')=='price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                            <option value="title_asc" {{ request('sort')=='title_asc' ? 'selected' : '' }}>Title: A to Z</option>
                            <option value="title_desc" {{ request('sort')=='title_desc' ? 'selected' : '' }}>Title: Z to A</option>
                        </select>

                        <!-- Hidden inputs to preserve search -->
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    </form>

                    <!-- Search Button -->
                    <button type="submit" form="search-form"
                        class="w-full lg:w-auto bg-gradient-to-r from-yellow-400 to-orange-400 text-black px-6 py-3 
                                   rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                                   transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Search Books
                    </button>
                </div>

                <!-- Active Filters Display -->
                @if(request('search') || request('sort'))
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="text-sm font-medium text-gray-600">Active filters:</span>

                        @if(request('search'))
                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                            Search: "{{ request('search') }}"
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}" class="text-blue-600 hover:text-blue-800">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        </span>
                        @endif

                        @if(request('sort'))
                        <span class="inline-flex items-center gap-1 px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">
                            Sort: {{ ucwords(str_replace('_', ' ', request('sort'))) }}
                            <a href="{{ request()->fullUrlWithQuery(['sort' => null]) }}" class="text-green-600 hover:text-green-800">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </a>
                        </span>
                        @endif

                        <a href="{{ route('user.dashboard') }}"
                            class="text-sm text-gray-500 hover:text-gray-700 underline">
                            Clear all filters
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Results Info -->
        <div class="flex justify-between items-center mb-6">
            <div class="text-gray-600">
                @if($books->total() > 0)
                <p class="text-lg">
                    Showing <span class="font-semibold text-gray-800">{{ $books->firstItem() ?? 0 }}-{{ $books->lastItem() ?? 0 }}</span>
                    of <span class="font-semibold text-gray-800">{{ $books->total() }}</span> books
                </p>
                @endif
            </div>
        </div>

        <!-- Books Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 mb-12">
            @forelse ($books as $book)
            <div class="group">
                <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl overflow-hidden 
                            shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500 
                            relative group-hover:border-orange-200">

                    <!-- Wishlist Button -->
                    <form action="{{ route('wishlist.store', $book->id) }}" method="POST"
                        class="absolute top-4 right-4 z-10">
                        @csrf
                        <button type="submit"
                            class="w-10 h-10 bg-white/80 backdrop-blur-sm rounded-full 
                                       flex items-center justify-center shadow-lg hover:shadow-xl 
                                       transform hover:scale-110 transition-all duration-300 
                                       border border-white/50 hover:border-red-200">
                            @if(auth()->check() && auth()->user()->wishlist->contains($book->id))
                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                            </svg>
                            @else
                            <svg class="w-5 h-5 text-gray-400 hover:text-red-500 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                            @endif
                        </button>
                    </form>

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
                            <h2 class="text-lg font-bold text-gray-800 mb-1 line-clamp-2 group-hover:text-orange-600 transition-colors">
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
                                    Rp.{{ number_format($book->price) }}
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <!-- Empty State -->
            <div class="col-span-full">
                <div class="text-center py-16">
                    <div class="mx-auto w-24 h-24 bg-gradient-to-br from-gray-200 to-gray-300 rounded-full 
                                flex items-center justify-center mb-6">
                        <svg class="w-12 h-12 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">No Books Found</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">
                        We couldn't find any books matching your search criteria. Try adjusting your filters or search terms.
                    </p>
                    <a href="{{ route('user.dashboard') }}"
                        class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-400 to-orange-400 text-black 
                              px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                              transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                        </svg>
                        Browse All Books
                    </a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($books->hasPages())
        <div class="flex justify-center">
            <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-4 shadow-lg">
                {{ $books->appends(request()->query())->links() }}
            </div>
        </div>
        @endif

    </div>
</div>

@endsection