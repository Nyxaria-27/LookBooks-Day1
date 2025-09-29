<x-guest-layout>
    <!-- Register Section with Bookstore Vibes -->
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
                    border border-white/10 shadow-2xl rounded-3xl overflow-hidden min-h-[85vh]">

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
                            Begin Your
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-orange-400">
                                Reading Adventure
                            </span>
                        </h2>
                        <p class="text-xl text-gray-200 leading-relaxed">
                            Join our community of book lovers and unlock access to thousands of
                            carefully curated stories, personalized recommendations, and exclusive content.
                        </p>
                    </div>
                </div>

                <!-- Membership Benefits -->
                <div class="space-y-6">
                    <h3 class="text-2xl font-semibold text-white mb-4">What you'll get:</h3>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full 
                                    flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-lg">Unlimited Access</h4>
                            <p class="text-gray-300 text-sm">Browse and read from our entire collection of 15,000+ books</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-orange-400 to-amber-400 rounded-full 
                                    flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-lg">Easy Book Shopping</h4>
                            <p class="text-gray-300 text-sm">Browse and shop from our collection of 15,000+ books with easy search</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-amber-400 to-yellow-400 rounded-full 
                                    flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-lg">Secure Shopping Cart</h4>
                            <p class="text-gray-300 text-sm">Add books to cart, manage your orders, and track delivery status easily</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-yellow-400 to-orange-400 rounded-full 
                                    flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-lg">Customer Support</h4>
                            <p class="text-gray-300 text-sm">Contact our admin team for assistance with orders, questions, and book inquiries</p>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Side - Register Form -->
            <div class="lg:col-span-5 p-8 lg:p-12 flex flex-col justify-center 
                        bg-white/95 backdrop-blur-sm border-l border-white/20">

                <!-- Form Header -->
                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Create Account</h1>
                    <p class="text-gray-600">Start your literary journey today</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <!-- Name Input -->
                    <div class="space-y-2">
                        <label for="name" class="text-sm font-medium text-gray-700 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Full Name
                        </label>
                        <x-text-input id="name"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 
                                   focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20 focus:outline-none 
                                   transition-all duration-300 bg-gray-50 hover:bg-white"
                            type="text" name="name" :value="old('name')"
                            placeholder="Enter your full name" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-1" />
                    </div>

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
                            placeholder="Enter your email address" required autocomplete="username" />
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
                            placeholder="Create a strong password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-1" />
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="text-sm font-medium text-gray-700 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Confirm Password
                        </label>
                        <x-text-input id="password_confirmation"
                            class="w-full border border-gray-300 rounded-xl px-4 py-3 text-gray-700 
                                   focus:border-orange-400 focus:ring-2 focus:ring-orange-400/20 focus:outline-none 
                                   transition-all duration-300 bg-gray-50 hover:bg-white"
                            type="password" name="password_confirmation"
                            placeholder="Confirm your password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                    </div>

                    <!-- Terms & Privacy -->
                    <div class="flex items-start gap-3 py-2">
                        <input type="checkbox" required
                            class="w-4 h-4 mt-1 text-orange-400 border border-gray-300 rounded 
                                      focus:ring-orange-400 focus:ring-2 focus:ring-offset-0">
                        <label class="text-sm text-gray-600 leading-relaxed">
                            I agree to the
                            <a href="#" class="text-orange-500 hover:text-orange-600 font-medium hover:underline">Terms of Service</a>
                            and
                            <a href="#" class="text-orange-500 hover:text-orange-600 font-medium hover:underline">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-yellow-400 to-orange-400 text-black font-bold py-3 
                                   rounded-xl hover:from-yellow-500 hover:to-orange-500 transform hover:-translate-y-0.5 
                                   transition-all duration-300 shadow-lg hover:shadow-xl">
                        Create My Account
                    </button>

                  

                    <!-- Login Link -->
                    <div class="text-center pt-4">
                        <p class="text-gray-600">
                            Already have an account?
                            <a href="{{ route('login') }}"
                                class="text-orange-500 font-semibold hover:text-orange-600 hover:underline 
                                      transition-colors duration-200">
                                Sign in here
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