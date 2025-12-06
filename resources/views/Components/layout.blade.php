<head>
    <title>Forum</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
</head>
<body class="min-h-screen bg-gray-100 text-gray-900 font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="text-2xl font-bold text-blue-600">
                <a href="/">Forum</a>
            </div>
            <nav class="flex items-baseline">
                <div>
                    <x-nav-link href="/home" :active="request()->is('home')">Home</x-nav-link>
                    <x-nav-link href="/posts" :active="request()->is('posts')">Posts</x-nav-link>
                    @auth
                        <x-nav-link href="/create-post" :active="request()->is('create-post')">Ask</x-nav-link>
                        <x-nav-link href="/your-posts/{{ Auth::user()->id }}" :active="request()->is('your-posts')">Your Posts</x-nav-link>
                    @endauth
                </div>
            </nav>
            <div>
                @guest
                    <x-nav-link href="/login" :active="request()->is('login')">Log In</x-nav-link>
                    <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                @endguest

                @auth
                <!-- Profile dropdown -->
                <div class="relative ml-3 group">
                    <button class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                    </button>

                    <!-- Dropdown menu -->
                    <div class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10">
                        <a href="/profile/{{ Auth::user()->id }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <form method="POST" action="/logout" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</button>
                        </form>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8 bg-gray-200 shadow rounded-md mt-6">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white mt-10 border-t">
        <div class="max-w-7xl mx-auto px-4 py-4 text-sm text-gray-500 text-center">
            © {{ date('Y') }} Forum. All rights reserved.
        </div>
    </footer>

</body>
</html>