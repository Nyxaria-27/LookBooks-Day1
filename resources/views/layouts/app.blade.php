<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Book Store')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white text-gray-800 relative">
    <!-- Navbar -->
    <header class="w-full text-white bg-black/50 backdrop-blur-md 
                shadow-md shadow-gray-700 absolute top-0 z-50 ">
        <div class="h-full w-full flex justify-center">
            <div class="bg-slate-200  absolute bottom-0 h-[2px] w-[90vw]"></div>
        </div>
        <div class=" max-w-7xl mx-auto py-4 flex items-center justify-between">
            <!-- Left: Logo -->
            <div class="flex items-center space-x-2 rounded-3xl border-2 border-black px-3 ">
                <div class="rounded-full h-7 w-7 bg-gray-800 grayscale">👁️</div>
                <a href="/" class="text-2xl font-bold tracking-tight ">
                    <span>Look</span>
                    <span class="ml-1">Books</span>
                </a>
            </div>

            <!-- Center: Menu -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium ">


                @auth
                <!-- Auth -->

                @if (auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="hover:text-pink-600">Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="hover:text-pink-600">Account</a>
                <a href="{{ route('admin.books.index') }}" class="hover:text-pink-600">Books</a>
                <a href="{{ route(name: 'admin.orders.index') }}" class="hover:text-pink-600">Order</a>
                <a href="{{ route(name: 'admin.contacts.index') }}" class="hover:text-pink-600">Contact</a>
                @else
                <a href="{{ route('user.dashboard') }}" class="hover:text-pink-600">Dashboard</a>
                <!-- Wishlist -->
                <a href="{{ route('user.wishlist') }}" class="relative inline-block">
                    <span class="text-2xl">❤️</span>
                    @if(auth()->user()->wishlist->count() > 0)
                    <span
                        class="absolute -top-1 -right-2 bg-red-600 text-white text-xs px-1.5 py-0.5 rounded-full">
                        {{ auth()->user()->wishlist->count() }}
                    </span>
                    @endif
                </a>
                <a href="{{ route('user.cart.index') }}" class="hover:text-pink-600">Cart</a>
                <a href="{{ route('user.orders.index') }}" class="hover:text-pink-600">Order</a>
                <a href="{{ route('user.contact.index') }}" class="hover:text-pink-600">Contact</a>
                @endif

                @endauth
                <a href="{{ route('welcome') }}" class="hover:text-pink-600">About us</a>

            </nav>

            <!-- Right: Search + Auth -->
            <div class="flex items-center space-x-4">
                <!-- Search -->


                <!-- Auth -->
                @auth
                <div class="relative group ">
                    <button class="flex items-center space-x-2">
                        @php $pp = optional(auth()->user())->pp; @endphp
                        <img
                            src="{{ $pp ? asset('storage/'.$pp) : asset('images/default-avatar.png') }}"
                            alt="Profile Picture"
                            class="w-8 h-8 rounded-full">
                        <span class="hidden md:inline text-sm">{{ Auth::user()->name }}</span>
                    </button>

                    <div class="hidden group-hover:block group-active:block group-focus-within:block absolute right-0 mt-2 w-40 bg-white text-black border rounded shadow-lg z-50">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-500 hover:bg-red-50">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="font-bold px-4 py-1 text-sm rounded-full border border-pink-500 text-pink-600 hover:bg-pink-600 hover:text-white transition-all duration-200 ">Login</a>
                <a href="{{ route('register') }}" class=" font-bold px-4 py-1 text-sm rounded-full bg-pink-600 text-white hover:bg-white hover:text-pink-600 transition-all duration-200">Sign up</a>
                @endauth
            </div>
        </div>

    </header>

    <!-- Main Content -->
    <main class="">
        <!-- Flash message -->
        @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <!-- Page content -->
        @yield('content')
    </main>

    @if (session('success'))
    <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 3000)"
        class="fixed bottom-5 right-5 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
        {{ session('success') }}
    </div>
    @endif

</body>

</html>