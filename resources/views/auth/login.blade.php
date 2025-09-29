<x-guest-layout>
    <!-- Login Section with Bookstore Vibes -->
    <div class="min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

        <!-- Background Image -->
        <img src="https://images.unsplash.com/photo-1481833761820-0509d3217039?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
            alt="Cozy Bookstore Background"
            class="absolute inset-0 w-full h-full object-cover -z-10">

        <!-- Warm Overlay -->
        <div class="absolute inset-0 bg-gradient-to-br from-amber-900/50 via-orange-900/40 to-yellow-900/50 -z-10"></div>

        <!-- Floating Particles -->
        <div class="absolute inset-0 -z-5">
            <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-yellow-400/30 rounded-full animate-pulse delay-100"></div>
            <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-orange-400/20 rounded-full animate-pulse delay-300"></div>
            <div class="absolute bottom-1/4 right-1/4 w-2 h-2 bg-amber-400/40 rounded-full animate-pulse delay-500"></div>
        </div>

        <!-- Main Container -->
        <div class="w-full max-w-6xl mx-auto grid lg:grid-cols-12 gap-0 bg-black/20 backdrop-blur-xl 
                    border border-white/10 shadow-2xl rounded-3xl overflow-hidden min-h-[80vh]">

            <!-- Left Side - Welcome Content -->
            <div class="lg:col-span-7 p-12 lg:p-16 flex flex-col justify-center relative">

                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5">
                    <div class="absolute top-10 left-10 w-20 h-20 border border-white rounded-full"></div>
                    <div class="absolute bottom-20 right-20 w-16 h-16 border border-white rounded-full"></div>
                    <div class="absolute top-1/2 left-1/4 w-12 h-12 border border-white rounded-full"></div>
                </div>

                <!-- Brand Logo & Title -->
                <div class="mb-12">
                    <!-- Look Books Logo -->
                    <div class="flex items-center justify-start mb-8">
                        <div class="flex flex-col">
                            <h1 class="text-5xl font-bold mr-3 text-white">L</h1>
                            <p class="text-yellow-400 font-bold -mb-1 text-center text-xs">AT</p>
                            <h1 class="text-5xl font-bold mb-4 mr-3 text-white">B</h1>
                        </div>
                        <div class="h-28 w-[40px] border-8 ml-1 rotate-12 border-[#E5E7EB] rounded-3xl"></div>
                        <div class="h-28 w-[40px] border-8 border-[#111827] rounded-3xl"></div>
                        <div class="flex flex-col">
                            <h1 class="text-5xl font-bold ml-3 text-white">K</h1>
                            <p class="text-yellow-400 font-bold -mb-1 text-center text-xs">THE</p>
                            <h1 class="text-5xl font-bold mb-4 ml-3 text-white">KS</h1>
                        </div>
                    </div>

                    <!-- Welcome Text -->
                    <div class="space-y-6">
                        <h2 class="text-4xl lg:text-5xl font-bold text-white leading-tight">
                            Welcome Back to Your
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-400">
                                Literary Journey
                            </span>
                        </h2>
                        <p class="text-xl text-gray-200 leading-relaxed">
                            Browse our extensive catalog and easily purchase your favorite books
                            with secure payment and reliable delivery service.
                        </p>
                    </div>
                </div>

                <!-- Features Highlight -->
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full 
                                    flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-lg">Easy Book Search</h4>
                            <p class="text-gray-300 text-sm">Find books quickly by title, author, or category</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-orange-400 to-amber-400 rounded-full 
                                    flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-lg">Shopping Cart System</h4>
                            <p class="text-gray-300 text-sm">Add multiple books to cart and manage your orders</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-amber-400 to-yellow-400 rounded-full 
                                    flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-lg">Secure Payment & Delivery</h4>
                            <p class="text-gray-300 text-sm">Safe transactions with payment on delivery option</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side - Login Form -->
            <div class="lg:col-span-5 p-8 lg:p-12 flex flex-col justify-center 
                        bg-white/95 backdrop-blur-sm border-l border-white/20">

                <!-- Form Header -->
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Sign In</h1>
                    <p class="text-gray-600">Access your bookstore account</p>
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Input -->
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-gray-700 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                            Email Address
                        </label>
                        <x-text-input id="email"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 
                                   focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20 focus:outline-none 
                                   transition-all duration-300 bg-gray-50 hover:bg-white"
                            type="email" name="email" :value="old('email')"
                            placeholder="Enter your email address" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-1" />
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-2">
                        <label for="password" class="text-sm font-medium text-gray-700 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Password
                        </label>
                        <x-text-input id="password"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 
                                   focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20 focus:outline-none 
                                   transition-all duration-300 bg-gray-50 hover:bg-white"
                            type="password" name="password"
                            placeholder="Enter your password" required />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-2 text-sm text-gray-600">
                            <input type="checkbox" name="remember"
                                class="w-4 h-4 text-orange-400 border border-gray-300 rounded 
                                          focus:ring-orange-400 focus:ring-2 focus:ring-offset-0">
                            <span>Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                            class="text-sm text-orange-500 hover:text-orange-600 font-medium hover:underline 
                                  transition-colors duration-200">
                            Forgot password?
                        </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-yellow-400 to-orange-400 text-black font-bold py-3 
                                   rounded-xl hover:from-yellow-500 hover:to-orange-500 transform hover:-translate-y-0.5 
                                   transition-all duration-300 shadow-lg hover:shadow-xl">
                        Sign In to Look Books
                    </button>

                
         

                    <!-- Sign Up Link -->
                    <div class="text-center pt-4">
                        <p class="text-gray-600">
                            New to Look Books?
                            <a href="{{ route('register') }}"
                                class="text-orange-500 font-semibold hover:text-orange-600 hover:underline 
                                      transition-colors duration-200">
                                Create an account
                            </a>
                        </p>
                    </div>
                </form>

            </div>

        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-10 left-10 w-20 h-20 bg-gradient-to-br from-yellow-400/10 to-orange-400/10 
                    rounded-full blur-xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-gradient-to-br from-orange-400/10 to-amber-400/10 
                    rounded-full blur-xl animate-pulse delay-1000"></div>

    </div>
</x-guest-layout>