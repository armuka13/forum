<x-layout>
    <div class="mx-auto py-20 px-4 text-center bg-white">
        <header class="mb-8">
            <h1 class="text-4xl font-extrabold text-gray-900">Welcome to the Community Forum</h1>
            <p class="mt-4 text-lg text-gray-600">A friendly place to ask questions, share knowledge, and help others. Browse topics, follow users, and contribute answers to grow the community.</p>
        </header>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            @auth
                <a href="/posts/create" class="inline-flex items-center px-5 py-3 bg-green-600 text-white rounded-md hover:bg-green-700">Ask a Question</a>
                <a href="/profile/{{ auth()->user()->id }}" class="text-sm text-gray-700 hover:underline">View Profile</a>
            @else
                <a href="/register" class="inline-flex items-center px-5 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Get Started</a>
                <a href="/login" class="text-sm text-gray-700 hover:underline">Already have an account? Log in</a>
            @endauth
        </div>

        <section class="mt-12 text-center">
            <h2 class="text-2xl font-semibold text-gray-800 mb-3">How it works</h2>
            <ul class="list-disc list-inside text-gray-700 space-y-2">
                <li>Ask clear, specific questions to get helpful answers.</li>
                <li>Upvote helpful answers and mark accepted solutions.</li>
                <li>Follow topics and users to see relevant discussions.</li>
            </ul>
        </section>
    </div>
</x-layout>