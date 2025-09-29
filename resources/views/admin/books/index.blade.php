@extends('layouts.app')
@section('title', 'Manage Books')
@section('content')

<div class="min-h-screen pt-28 bg-gradient-to-br from-gray-50 via-gray-100 to-amber-50 p-6">
    <div class="max-w-7xl mx-auto">

        <!-- Header Section -->
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-8">
            <div class="mb-4 lg:mb-0">
                <nav class="flex items-center gap-2 text-sm text-gray-600 mb-4">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-orange-500 transition-colors">Dashboard</a>
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-orange-500 font-medium">Books</span>
                </nav>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-2">
                    Books Management
                </h1>
                <p class="text-gray-600 text-lg">
                    Manage your book inventory and catalog
                </p>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3">
                <!-- <button class="bg-white/80 backdrop-blur-sm border border-white/20 text-gray-700 px-6 py-3 
                               rounded-xl font-semibold shadow-lg hover:shadow-xl hover:bg-white 
                               transition-all duration-300 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                    </svg>
                    Filter & Sort
                </button> -->

                <a href="{{ route('admin.books.create') }}"
                    class="bg-gradient-to-r from-yellow-400 to-orange-400 text-black px-6 py-3 
                          rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                          transition-all duration-300 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Book
                </a>
            </div>
        </div>

        <!-- Stats Cards (3 cols, category removed) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl p-4 shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-blue-400 to-blue-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-800">{{ $books->total() }}</p>
                        <p class="text-sm text-gray-600">Total Books</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl p-4 shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-green-400 to-green-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-800">{{ $books->where('stock', '>', 0)->count() }}</p>
                        <p class="text-sm text-gray-600">View per Page</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl p-4 shadow-lg">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-r from-orange-400 to-orange-600 rounded-lg flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-2xl font-bold text-gray-800">${{ number_format($books->avg('price'), 0) }}</p>
                        <p class="text-sm text-gray-600">Avg. Price</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Bar (category removed) -->
        <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl p-6 mb-8 shadow-lg">
            <form method="GET" class="flex flex-col lg:flex-row gap-4">
                <!-- Search Input -->
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search books by title, author, or ISBN..."
                            class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-xl 
                                      focus:ring-2 focus:ring-orange-400 focus:border-orange-400 
                                      transition-all duration-300 bg-white/50 backdrop-blur-sm">
                    </div>
                </div>

                <!-- Search Button -->
                <button type="submit"
                    class="bg-gradient-to-r from-yellow-400 to-orange-400 text-black px-6 py-3 
                               rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                               transition-all duration-300 flex items-center justify-center gap-2 lg:w-auto w-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Search
                </button>
            </form>
        </div>

        <!-- Books Table -->
        <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-xl shadow-lg overflow-hidden">
            <!-- Table Header -->
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-800">Book Inventory</h2>
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <span>Showing {{ $books->firstItem() ?? 0 }}-{{ $books->lastItem() ?? 0 }} of {{ $books->total() }} books</span>
                    </div>
                </div>
            </div>

            <!-- Table Content -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Cover</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Book Details</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Price</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Stock</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($books as $book)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <!-- Cover -->
                            <td class="px-6 py-4">
                                @if($book->cover)
                                <div class="w-16 h-20 rounded-lg overflow-hidden shadow-md group cursor-pointer">
                                    <img src="{{ asset('storage/' . $book->cover) }}"
                                        alt="{{ $book->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                                </div>
                                @else
                                <div class="w-16 h-20 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg flex items-center justify-center shadow-md">
                                    <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                @endif
                            </td>

                            <!-- Details -->
                            <td class="px-6 py-4">
                                <div class="max-w-xs">
                                    <h3 class="font-bold text-gray-800 mb-1 line-clamp-2">{{ $book->title }}</h3>
                                    <p class="text-sm text-gray-600 mb-1">by {{ $book->author }}</p>
                                    @if($book->isbn)
                                    <p class="text-xs text-gray-500">ISBN: {{ $book->isbn }}</p>
                                    @endif
                                </div>
                            </td>

                            <!-- Price -->
                            <td class="px-6 py-4">
                                <span class="text-lg font-bold text-gray-800">
                                    ${{ number_format($book->price, 2) }}
                                </span>
                            </td>

                            <!-- Stock -->
                            <td class="px-6 py-4">
                                @if($book->stock > 10)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                    {{ $book->stock }} In Stock
                                </span>
                                @elseif($book->stock > 0)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800 border border-yellow-200">
                                    {{ $book->stock }} Low Stock
                                </span>
                                @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                    Out of Stock
                                </span>
                                @endif
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('admin.books.edit', $book) }}"
                                        class="inline-flex items-center px-3 py-2 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg text-sm font-medium transition-colors duration-200 border border-blue-200 hover:border-blue-300">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.books.destroy', $book) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                            class="inline-flex items-center px-3 py-2 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg text-sm font-medium transition-colors duration-200 border border-red-200 hover:border-red-300">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <h3 class="text-lg font-medium text-gray-800 mb-2">No Books Found</h3>
                                <a href="{{ route('admin.books.create') }}"
                                    class="bg-gradient-to-r from-yellow-400 to-orange-400 text-black px-6 py-3 rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 flex items-center gap-2">
                                    Add Your First Book
                                </a>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($books->hasPages())
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $books->appends(request()->query())->links() }}
            </div>
            @endif
        </div>

    </div>
</div>

@endsection