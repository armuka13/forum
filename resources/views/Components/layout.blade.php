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
                        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAJQAlAMBIgACEQEDEQH/xAAbAAEAAwEBAQEAAAAAAAAAAAAAAwQFAgEGB//EADIQAAICAQICCQMDBAMAAAAAAAABAgMEESESMQUTIjJBUVJhcRRCkYGhsTRicqIjU8H/xAAUAQEAAAAAAAAAAAAAAAAAAAAA/8QAFBEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A/cQAAAI7bYVRcpvRfyBIQXZVVW0pay8kUMjNst2hrCHtzZVAu2dIzb/44qPzuV5ZN8+9bL9NiIAeuTlzbb92ebgAdxtsjyskvhk0M66PN8XyVgBp1dIQltZFwftui3CcZxUotNPxRgnVdk6pcUJNMDeBTxs2NjUbOzN/hlwAAAAAAAHF1kaoOcnokBxk5EKK+KXN8o+ZkXWzulxTe/7IXWytsc5c/wCDgAAAAAAAAAAAAAAF7DzHFqu56x8JPw+SiAPoAZ+Bk8qZvf7WaAAAADJ6Qv623gi+zD92X8y3qaJSXeeyMYAAAAAAElVFlvcjqvPwLWHh8a47o9nwj5mikktEtEgM2HRs335xXxudvo1/9v8AqaAAyLMG6HJKa9is009GtH5H0BBkY1d8e0tJeElzAxgd3VSpnwT5+HucAAAATa5PR+Zs4l3XVKX3LZmMWcC3q70vtls//ANcHh6BmdJz1sjD0rUpEuVLjybH/dp+CIAAABYwaOut1fcju/f2K5rdH18GNF+MtwLKPQAAAAAACvmUddU9F21vFmOfQGNmw6vImlstdUBAAAATaeq5gAbtM+OqM/NanhX6OsX0+jfKTQAzJPik34ttngAAAADbxv6ev/FGIbODLixYey0AnAAAAAAAAMrpP+oX+JqmR0hNSyZafbsBWAAAAAT0W8EGvcEUYtrYAe3R4brF5SOCz0hDhyW/VuVgAAAF3o27hm65PaW6+SkE2mmtmgPoAVMPKVqUZvSz+S2AAAAA5nOMIuU2kkBzfYqqnN+HIxG3JuT5smy8h3z22guSIAAAAAAC9g08dLl/cC3hQ4MaC5arUAQ9J18VcZrnF6foZhvTipwcZLVNaMw7a3VNwlzTA5AAAAlhj22d2uXy1oBEW6c+yGimuNfO5z9DkehflD6HI9K/KAuRz6X3tYv3R087H9f+rKP0OR6F+UPocj0r8oCxZ0jHlXBv3lsUrrrLpa2S18kvAl+hyPSvyh9DkelflAVgTyw8iO7hqvZ6kMk4vSSafk1oB4AAB3RW7bYw9TODR6Mp0TufN7IC8uW2wPQAKfSFHWQ44Ltx8PNFwAfPnVdcrZqEFq3+xczsVxbtrXZfeS8Pcm6OVSp1i9Z/cB3j4ldSTfal5vw+CyAAAAAAAAAAOLK4WR0nFSXudgDJy8N0vjhvX+6KpvySaaa203MeVKnkuvH7S128kBzjUu+xRXd8WbUYqKSjslyRHj0RorUY7vxfmSgAAAAAAo34sq59bi7S8Yl4AVMfMjN8FnYs5aPxLZBfjV395aS9S5lfhy8buvrYLwAvgpw6Qrb4bE4SLMLa592cX8MDsAAAeNpc2l8kNmXRDnYn7LcCc4sshXHWbSRU+rtu2xqn/kxXhOcuPJm5y8lyA5lbbmvgpTjX9zLdFEKIaQW/i/MkilFaJJJeR6AAAAAAAAAAAAAAcTqrmu3BS+UVrMCjTWPFH4YAFO2DqekJzX6kanOXOcvyeAC3RiV26Obk/wBS1DDor5Vp/O56AJktNvI9AAAAAAAAAA//2Q=="
                         alt="Profile Picture" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
                    </button>

                    <!-- Dropdown menu -->
                    <div class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-10">
                        <a href="/profile/{{ Auth::user()->id }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your profile</a>
                        <a href="/settings" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
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