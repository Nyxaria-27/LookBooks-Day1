@extends('layouts.app')
@section('title', 'Add New Book')
@section('content')

<div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-amber-50 p-6 pt-24">
    <div class="max-w-4xl mx-auto">

        <!-- Header Section -->
        <div class="mb-8">
            <nav class="flex items-center gap-2 text-sm text-gray-600 mb-4">
                <a href="{{ route('admin.dashboard') }}" class="hover:text-orange-500 transition-colors">Dashboard</a>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <a href="{{ route('admin.books.index') }}" class="hover:text-orange-500 transition-colors">Books</a>
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 111.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-orange-500 font-medium">Add New Book</span>
            </nav>

            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-2">
                        Add New Book
                    </h1>
                    <p class="text-gray-600 text-lg">
                        Fill in the details below to add a new book to your inventory
                    </p>
                </div>

                <div class="hidden lg:flex items-center gap-3">
                    <a href="{{ route('admin.books.index') }}"
                        class="bg-white/80 backdrop-blur-sm border border-white/20 text-gray-700 px-6 py-3 
                              rounded-xl font-semibold shadow-lg hover:shadow-xl hover:bg-white 
                              transition-all duration-300 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Books
                    </a>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-white/80 backdrop-blur-sm border border-white/20 rounded-2xl shadow-lg overflow-hidden">

            <!-- Form Header -->
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-800 flex items-center gap-3">
                    <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-lg 
                                flex items-center justify-center">
                        <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                    </div>
                    Book Information
                </h2>
                <p class="text-gray-600 mt-1">Enter the book details and upload a cover image</p>
            </div>

            <!-- Form Content -->
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <!-- Form Grid -->
                <div class="grid lg:grid-cols-3 gap-8">

                    <!-- Left Column - Main Information -->
                    <div class="lg:col-span-2 space-y-6">

                        <!-- Title Field -->
                        <div class="space-y-2">
                            <label for="title" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                                Book Title *
                            </label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                placeholder="Enter the book title"
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                          focus:ring-2 focus:ring-orange-400 focus:border-orange-400 
                                          transition-all duration-300 bg-white/50 backdrop-blur-sm">
                            @error('title')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                        <!-- Author and ISBN Row -->
                        <div class="grid md:grid-cols-2 gap-4">

                            <!-- Author Field -->
                            <div class="space-y-2">
                                <label for="author" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Author *
                                </label>
                                <input type="text" id="author" name="author" value="{{ old('author') }}" required
                                    placeholder="Enter the author's name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                              focus:ring-2 focus:ring-orange-400 focus:border-orange-400 
                                              transition-all duration-300 bg-white/50 backdrop-blur-sm">
                                @error('author')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- ISBN Field -->
                            <div class="space-y-2">
                                <label for="isbn" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    ISBN
                                </label>
                                <input type="text" id="isbn" name="isbn" value="{{ old('isbn') }}"
                                    placeholder="978-0-123456-78-9"
                                    maxlength="17"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                              focus:ring-2 focus:ring-orange-400 focus:border-orange-400 
                                              transition-all duration-300 bg-white/50 backdrop-blur-sm">
                                <p class="text-xs text-gray-500">International Standard Book Number (optional)</p>
                                @error('isbn')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                        </div>

                        <!-- Price and Stock Row -->
                        <div class="grid md:grid-cols-2 gap-4">

                            <!-- Price Field -->
                            <div class="space-y-2">
                                <label for="price" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                    Price * ($)
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 font-medium">$</span>
                                    <input type="number" id="price" name="price" value="{{ old('price') }}" required step="0.01" min="0"
                                        placeholder="0.00"
                                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-xl 
                                                  focus:ring-2 focus:ring-orange-400 focus:border-orange-400 
                                                  transition-all duration-300 bg-white/50 backdrop-blur-sm">
                                </div>
                                @error('price')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                            <!-- Stock Field -->
                            <div class="space-y-2">
                                <label for="stock" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                    </svg>
                                    Initial Stock
                                </label>
                                <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" min="0"
                                    placeholder="Enter initial stock quantity"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                              focus:ring-2 focus:ring-orange-400 focus:border-orange-400 
                                              transition-all duration-300 bg-white/50 backdrop-blur-sm">
                                @error('stock')
                                <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </p>
                                @enderror
                            </div>

                        </div>

                       

                        <!-- Description Field -->
                        <div class="space-y-2">
                            <label for="description" class="block text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                                Description
                            </label>
                            <textarea id="description" name="description" rows="4"
                                placeholder="Enter a detailed description of the book..."
                                class="w-full px-4 py-3 border border-gray-300 rounded-xl 
                                             focus:ring-2 focus:ring-orange-400 focus:border-orange-400 
                                             transition-all duration-300 bg-white/50 backdrop-blur-sm resize-none">{{ old('description') }}</textarea>
                            @error('description')
                            <p class="text-red-500 text-sm mt-1 flex items-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>

                    </div>

                    <!-- Right Column - Cover Image -->
                    <div class="lg:col-span-1">
                        <div class="bg-gradient-to-br from-gray-50 to-white border-2 border-dashed border-gray-300 
                                    rounded-xl p-6 text-center hover:border-orange-400 transition-colors duration-300">

                            <div class="space-y-4">
                                <div class="mx-auto w-16 h-16 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-xl 
                                            flex items-center justify-center">
                                    <svg class="w-8 h-8 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>

                                <div>
                                    <label for="cover" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Book Cover Image
                                    </label>
                                    <p class="text-sm text-gray-500 mb-4">
                                        Upload a high-quality book cover image
                                        <br>
                                        <span class="text-xs">Recommended: 400x600px, JPG/PNG</span>
                                    </p>
                                </div>

                                <div class="relative">
                                    <input type="file" id="cover" name="cover" accept="image/*"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                    <button type="button"
                                        class="bg-white border border-gray-300 text-gray-700 px-4 py-2 
                                                   rounded-lg font-medium hover:bg-gray-50 transition-colors duration-200 
                                                   flex items-center gap-2 mx-auto">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        Choose Image
                                    </button>
                                </div>

                                <!-- Preview Area -->
                                <div id="imagePreview" class="hidden mt-4">
                                    <img id="previewImg" src="" alt="Cover Preview"
                                        class="mx-auto max-w-full h-48 object-cover rounded-lg shadow-md">
                                    <p id="fileName" class="text-sm text-gray-600 mt-2"></p>
                                </div>

                            </div>

                            @error('cover')
                            <p class="text-red-500 text-sm mt-2 flex items-center justify-center gap-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                {{ $message }}
                            </p>
                            @enderror
                        </div>
                    </div>

                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row gap-4 justify-end mt-8 pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.books.index') }}"
                        class="order-2 sm:order-1 bg-white border border-gray-300 text-gray-700 px-6 py-3 
                              rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300 
                              flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancel
                    </a>

                    <button type="submit"
                        class="order-1 sm:order-2 bg-gradient-to-r from-yellow-400 to-orange-400 text-black px-8 py-3 
                                   rounded-xl font-bold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 
                                   transition-all duration-300 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Add Book to Inventory
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

<!-- Image Preview JavaScript -->
<script>
    document.getElementById('cover').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const fileName = document.getElementById('fileName');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                fileName.textContent = file.name;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
        }
    });
</script>

@endsection