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
            <nav class=" flex items-baseline">
                <div>
                    <x-nav-link href="/home" :active="request()->is('home')" >Home</x-nav-link>
                    <x-nav-link href="/posts" :active="request()->is('posts')">Posts</x-nav-link>
<<<<<<< HEAD
                    @auth
                        <x-nav-link href="/create-post" :active="request()->is('create-post')">Ask</x-nav-link>
                    @endauth
=======
>>>>>>> 3aff404677c0f5c79d07e8827f2a821a3697ef0a
                </div>
            </nav>
            <div>
                @guest
                    <x-nav-link href="/login" :active="request()->is('about')">Log In</x-nav-link>
                    <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                @endguest
                @auth
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button class="px-4 py-2 bg-red-600 text-white rounded-md text-sm font-medium
               hover:bg-red-700 active:bg-red-800 transition-colors duration-150" type="submit">Logout</button>
                    </form>
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
