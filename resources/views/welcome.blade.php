@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<!-- Hero Section -->
<main class="">

    <section class="relative flex justify-center gap-10 items-center min-h-screen  border-black border-b-2">

        <!-- Background Image -->
        <img src="bg-hero2.jpg" alt="Hero Background"
            class="absolute inset-0 w-full h-full object-cover -z-10">

        <!-- Decorative Element -->
        <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-orange-400/20 to-yellow-400/20 
                rounded-full blur-xl"></div>

        <!-- Overlay (opsional: buat lebih gelap biar teks lebih kebaca) -->
        <div class="absolute inset-0 bg-black/30 -z-10"></div>

        <!-- Content with Glassmorphism -->
        <div class="bg-black/20 backdrop-blur-md border flex justify-center flex-col border-white/30 shadow-lg rounded-2xl p-8">

            <!-- Logo -->
            <div class="flex items-center justify-center">
                <div class="flex flex-col">
                    <h1 class="text-7xl font-bold mr-4 text-white">L</h1>
                    <p class="text-[#FACC15] font-bold -mb-2 text-center">AT</p>
                    <h1 class="text-7xl font-bold mb-5 mr-4 text-white">B</h1>
                </div>
                <div class="h-40 w-[50px] border-8 rotate-12 border-[#E5E7EB] rounded-3xl"></div>
                <div class="h-40 w-[50px] border-8 border-[#111827] rounded-3xl"></div>
                <div class="flex flex-col">
                    <h1 class="text-7xl font-bold ml-4 text-white">K</h1>
                    <p class="text-[#FACC15] font-bold -mb-2 text-center">THE</p>
                    <h1 class="text-7xl font-bold mb-5 ml-4 text-white">KS</h1>
                </div>
            </div>

            <!-- Text -->
            <p class="text-white text-xl font-bold mb-10">
                Not sure what to read next?
                Explore <a href="#" class="text-[#FACC15]">our catalog</a> <br>of domain books with our editors.
            </p>

            <a href="/login" class="border-2 border-white text-[#FACC15] text-center py-2 px-6 rounded-3xl font-semibold 
                                  hover:bg-white hover:text-black transition-all duration-500">
                Let's Adventure
            </a>
        </div>

    </section>

    <!-- About Us Section with Popular Books -->
   <!-- About Us Section with Popular Books -->
<section class="relative min-h-screen py-20 overflow-hidden">
    
    <!-- Background with Bookshelf Atmosphere -->
    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80" 
         alt="Elegant Bookstore Background"
         class="absolute inset-0 w-full h-full object-cover -z-10">
    
    <!-- Sophisticated Overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900/60 via-amber-900/40 to-orange-900/50 -z-10"></div>
    
    <!-- Floating Particles Effect -->
    <div class="absolute inset-0 -z-5">
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-yellow-400/30 rounded-full animate-pulse delay-100"></div>
        <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-orange-400/20 rounded-full animate-pulse delay-300"></div>
        <div class="absolute bottom-1/4 left-1/3 w-2 h-2 bg-amber-400/40 rounded-full animate-pulse delay-500"></div>
    </div>
    
    <!-- Content Container -->
    <div class="container mx-auto px-6 z-10">
        
        <!-- Section Header -->
        <div class="text-center mb-16">
            <div class="flex items-center justify-center gap-4 mb-6">
                <div class="h-0.5 w-16 bg-gradient-to-r from-transparent via-yellow-400 to-transparent"></div>
                <span class="text-yellow-400 font-semibold tracking-widest uppercase text-sm">About Look Books</span>
                <div class="h-0.5 w-16 bg-gradient-to-r from-transparent via-yellow-400 to-transparent"></div>
            </div>
            <h2 class="text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                Where Literature
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 via-orange-400 to-amber-500">
                    Comes Alive
                </span>
            </h2>
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                Discover a world where every page holds a new adventure, carefully curated by passionate literary connoisseurs
            </p>
        </div>
        
        <!-- Main Content Grid -->
        <div class="grid lg:grid-cols-12 gap-12 items-start mb-20">
            
            <!-- Left Story Content -->
            <div class="lg:col-span-5">
                <div class="bg-black/20 backdrop-blur-xl border border-white/10 shadow-2xl rounded-3xl p-10 h-full">
                    
                    <!-- Our Story -->
                    <div class="mb-10">
                        <h3 class="text-3xl font-bold text-white mb-6 flex items-center gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            Our Story
                        </h3>
                        
                        <div class="space-y-4 text-gray-200 text-lg leading-relaxed">
                            <p>
                                Founded in the heart of literary passion, <span class="text-yellow-400 font-semibold">Look Books</span> 
                                began as an innovative online bookstore dedicated to bringing the finest collection of books directly to your doorstep.
                            </p>
                            <p>
                                Our journey started with a simple belief: every book deserves the right reader, 
                                and every reader deserves convenient access to quality books through our comprehensive e-commerce platform.
                            </p>
                        </div>
                    </div>
                    
                    <!-- Mission -->
                    <div class="mb-10">
                        <h3 class="text-2xl font-bold text-white mb-4 flex items-center gap-3">
                            <div class="w-6 h-6 bg-gradient-to-r from-orange-400 to-amber-400 rounded-full"></div>
                            Our Mission
                        </h3>
                        <p class="text-gray-200 leading-relaxed">
                            To provide book lovers with easy access to quality literature through our online platform, 
                            offering secure transactions, reliable delivery, and exceptional customer service.
                        </p>
                    </div>
                    
                    <!-- Stats Row -->
                    <div class="grid grid-cols-3 gap-4">
                        <div class="text-center">
                            <div class="text-2xl font-bold text-yellow-400">15K+</div>
                            <div class="text-xs text-gray-400 uppercase tracking-wide">Books</div>
                        </div>
                        <div class="text-center border-x border-white/20">
                            <div class="text-2xl font-bold text-orange-400">8K+</div>
                            <div class="text-xs text-gray-400 uppercase tracking-wide">Readers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-2xl font-bold text-amber-400">100+</div>
                            <div class="text-xs text-gray-400 uppercase tracking-wide">Genres</div>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!-- Right Popular Books Showcase -->
            <div class="lg:col-span-7">
                <div class="bg-black/20 backdrop-blur-xl border border-white/10 shadow-2xl rounded-3xl p-8 h-full">
                    
                    <!-- Popular Books Header -->
                    <div class="flex items-center justify-between mb-8">
                        <h3 class="text-3xl font-bold text-white flex items-center gap-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-lg flex items-center justify-center">
                                <svg class="w-4 h-4 text-black" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            </div>
                            Popular This Month
                        </h3>
                        <a href="/catalog" class="text-yellow-400 hover:text-orange-400 font-medium flex items-center gap-2 transition-colors">
                            View All
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                    
                    <!-- Books Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-8">
                        
                        <!-- Book 1 -->
                        <div class="group cursor-pointer">
                            <div class="relative overflow-hidden rounded-xl shadow-lg transform transition-all duration-300 
                                        group-hover:scale-105 group-hover:shadow-2xl">
                                <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                     alt="The Silent Patient" class="w-full h-40 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent 
                                            opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-2 left-2 right-2 text-white opacity-0 group-hover:opacity-100 
                                            transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                    <p class="text-xs font-semibold">The Silent Patient</p>
                                    <p class="text-xs opacity-80">Alex Michaelides</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Book 2 -->
                        <div class="group cursor-pointer">
                            <div class="relative overflow-hidden rounded-xl shadow-lg transform transition-all duration-300 
                                        group-hover:scale-105 group-hover:shadow-2xl">
                                <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                     alt="Educated" class="w-full h-40 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent 
                                            opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-2 left-2 right-2 text-white opacity-0 group-hover:opacity-100 
                                            transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                    <p class="text-xs font-semibold">Educated</p>
                                    <p class="text-xs opacity-80">Tara Westover</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Book 3 -->
                        <div class="group cursor-pointer">
                            <div class="relative overflow-hidden rounded-xl shadow-lg transform transition-all duration-300 
                                        group-hover:scale-105 group-hover:shadow-2xl">
                                <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                     alt="Atomic Habits" class="w-full h-40 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent 
                                            opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-2 left-2 right-2 text-white opacity-0 group-hover:opacity-100 
                                            transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                    <p class="text-xs font-semibold">Atomic Habits</p>
                                    <p class="text-xs opacity-80">James Clear</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Book 4 -->
                        <div class="group cursor-pointer">
                            <div class="relative overflow-hidden rounded-xl shadow-lg transform transition-all duration-300 
                                        group-hover:scale-105 group-hover:shadow-2xl">
                                <img src="https://images.unsplash.com/photo-1589998059171-988d887df646?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                     alt="Where the Crawdads Sing" class="w-full h-40 object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent 
                                            opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                <div class="absolute bottom-2 left-2 right-2 text-white opacity-0 group-hover:opacity-100 
                                            transform translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                                    <p class="text-xs font-semibold">Where the Crawdads Sing</p>
                                    <p class="text-xs opacity-80">Delia Owens</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <!-- Reading Recommendations -->
                    <div class="bg-gradient-to-r from-yellow-400/10 to-orange-400/10 border border-yellow-400/20 
                                rounded-2xl p-6">
                        <h4 class="text-white font-semibold mb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.663 17h4.673a1.5 1.5 0 001.2-2.4l-2.3-3.073a1.5 1.5 0 00-1.2-.6h-2.146a1.5 1.5 0 00-1.2.6l-2.3 3.073a1.5 1.5 0 001.2 2.4z"></path>
                                <path d="M11 3a1 1 0 10-2 0v3.586l-.293-.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 6.586V3z"></path>
                            </svg>
                            Curated Just For You
                        </h4>
                        <p class="text-gray-300 text-sm leading-relaxed mb-4">
                            Our expert team handpicks every book in our collection, ensuring you discover 
                            hidden gems alongside bestsellers that will captivate your imagination.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-yellow-400/20 text-yellow-400 text-xs rounded-full border border-yellow-400/30">
                                Mystery & Thriller
                            </span>
                            <span class="px-3 py-1 bg-orange-400/20 text-orange-400 text-xs rounded-full border border-orange-400/30">
                                Self-Development
                            </span>
                            <span class="px-3 py-1 bg-amber-400/20 text-amber-400 text-xs rounded-full border border-amber-400/30">
                                Literary Fiction
                            </span>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
        <!-- Bottom CTA Section -->
        <div class="text-center">
            <div class="bg-black/30 backdrop-blur-xl border border-white/10 rounded-3xl p-10 max-w-4xl mx-auto">
                <h3 class="text-3xl font-bold text-white mb-4">
                    Ready to Start Your Next
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-400">
                        Literary Journey?
                    </span>
                </h3>
                <p class="text-gray-300 mb-8 text-lg max-w-2xl mx-auto">
                    Join thousands of readers who have discovered their favorite books through our carefully curated collection
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="/catalog" 
                       class="inline-flex items-center gap-3 bg-gradient-to-r from-yellow-400 to-orange-400 text-black 
                              py-4 px-8 rounded-full font-bold text-lg shadow-lg hover:shadow-xl 
                              transform hover:-translate-y-1 transition-all duration-300">
                        <span>Browse Collection</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                    <a href="/recommendations" 
                       class="inline-flex items-center gap-3 border-2 border-white/30 text-white 
                              py-4 px-8 rounded-full font-semibold text-lg hover:bg-white/10 
                              transition-all duration-300">
                        <span>Get Recommendations</span>
                    </a>
                </div>
            </div>
        </div>
        
    </div>
    
</section>  
</main>
@endsection