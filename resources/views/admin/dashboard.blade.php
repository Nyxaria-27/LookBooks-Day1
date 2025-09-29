@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')

<div class="min-h-screen bg-gradient-to-br pt-28 from-gray-50 via-gray-100 to-amber-50 p-6">
    <div class="max-w-7xl mx-auto">

        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-2">
                        Admin Dashboard
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Welcome back! Here's what's happening at Look Books today.
                    </p>
                </div>

                <!-- Quick Actions -->
                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('admin.books.create') }}"
                        class="bg-gradient-to-r from-yellow-400 to-orange-400 text-black px-6 py-3 
                              rounded-xl font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                              transition-all duration-300 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Add New Book
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

            <!-- Total Books Card -->
            <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 
                        shadow-lg hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-blue-600 rounded-xl 
                                flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-2xl lg:text-3xl font-bold text-gray-800 mb-1">{{ $booksCount }}</p>
                    <p class="text-gray-600 font-medium">Total Books</p>
                    <p class="text-sm text-gray-500 mt-1">Available in store</p>
                </div>
            </div>



            <!-- Total Users Card -->
            <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 
                        shadow-lg hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-400 to-purple-600 rounded-xl 
                                flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-2xl lg:text-3xl font-bold text-gray-800 mb-1">{{ $usersCount }}</p>
                    <p class="text-gray-600 font-medium">Registered Users</p>
                    <p class="text-sm text-gray-500 mt-1">Active customers</p>
                </div>
            </div>

            <!-- Total Orders Card -->
            <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl p-6 
                        shadow-lg hover:shadow-xl transition-all duration-300 group">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-orange-400 to-orange-600 rounded-xl 
                                flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l-1 12H6L5 9z"></path>
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-2xl lg:text-3xl font-bold text-gray-800 mb-1">{{ $ordersCount }}</p>
                    <p class="text-gray-600 font-medium">Total Orders</p>
                    <p class="text-sm text-gray-500 mt-1">All time orders</p>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="grid lg:grid-cols-3 gap-8">

            <!-- Latest Books Section -->
            <div class="lg:col-span-2">
                <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg overflow-hidden">

                    <!-- Section Header -->
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                                    <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-lg 
                                                flex items-center justify-center">
                                        <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    Latest Books
                                </h2>
                                <p class="text-gray-600 mt-1">Recently added to inventory</p>
                            </div>
                            <a href="{{ route('admin.books.index') }}"
                                class="text-orange-500 hover:text-orange-600 font-medium flex items-center gap-2 
                                      hover:underline transition-colors duration-200">
                                <span>View All Books</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>

                    <!-- Books Table -->
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Cover</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Book Details</th>
                                    <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Price</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach ($latestBooks as $book)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4">
                                        @if($book->cover)
                                        <div class="w-12 h-16 rounded-lg overflow-hidden shadow-md">
                                            <img src="{{ asset('storage/' . $book->cover) }}"
                                                alt="{{ $book->title }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                        @else
                                        <div class="w-12 h-16 bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg 
                                                    flex items-center justify-center shadow-md">
                                            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div>
                                            <h3 class="font-semibold text-gray-800 mb-1">{{ $book->title }}</h3>
                                            <p class="text-sm text-gray-600">by {{ $book->author }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="font-semibold text-gray-800">
                                            ${{ number_format($book->price, 2) }}
                                        </span>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            <!-- Quick Actions -->
            <div class="lg:col-span-1  ">
                <div class="stat-card rounded-2xl p-6 bg-white shadow-lg">
                    <h3 class="text-xl font-bold text-black mb-6">Quick Actions</h3>

                    <div class="space-y-4">
                        <a href="{{ route('admin.books.create') }}" class="block p-4 bg-blue-500/20 hover:bg-blue-500/30 rounded-xl transition-all duration-300 group">
                            <div class="flex items-center">
                                <div class="bg-blue-500 p-2 rounded-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-black font-medium">Tambah Buku</p>
                                    <p class="text-black/60 text-sm">Tambah buku baru ke koleksi</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.users.index') }}" class="block p-4 bg-purple-500/20 hover:bg-purple-500/30 rounded-xl transition-all duration-300 group">
                            <div class="flex items-center">
                                <div class="bg-purple-500 p-2 rounded-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-black font-medium">Kelola User</p>
                                    <p class="text-black/60 text-sm">Manajemen pengguna sistem</p>
                                </div>
                            </div>
                        </a>

                        <a href="{{ route('admin.contacts.index') }}" class="block p-4 bg-green-500/20 hover:bg-green-500/30 rounded-xl transition-all duration-300 group">
                            <div class="flex items-center">
                                <div class="bg-green-500 p-2 rounded-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-black font-medium">Manajemen Pesan</p>
                                    <p class="text-black/60 text-sm">Pesan & Feedback User</p>
                                </div>
                            </div>
                        </a>

                        <a href="admin.orders.index" class="block p-4 bg-yellow-500/20 hover:bg-yellow-500/30 rounded-xl transition-all duration-300 group">
                            <div class="flex items-center">
                                <div class="bg-yellow-500 p-2 rounded-lg group-hover:scale-110 transition-transform duration-300">
                                    <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-black font-medium">Lihat Pesanan</p>
                                    <p class="text-black/60 text-sm">Monitor pesanan terbaru</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection