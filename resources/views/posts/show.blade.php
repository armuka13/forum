<x-layout>
    <!-- Search Bar -->
    <div class="mb-6">
        <form method="GET" action="/posts" class="flex gap-2">
            <input 
                type="text" 
                name="search" 
                placeholder="Search posts..." 
                value="{{ request('search') }}"
                class="flex-1 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
            />
            <button 
                type="submit" 
                class="px-6 py-2 bg-indigo-500 text-white rounded-md hover:bg-indigo-600"
            >
                Search
            </button>
            @if(request('search'))
                <a href="/posts" class="px-6 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Clear</a>
            @endif
        </form>
    </div>
    <div>
        @foreach ($posts as $post)
            <div class="bg-white px-4 py-6 border border-gray-200 rounded-lg mb-4 items-center">
                <div class="font-bold text-blue-500">
                    <a href="/profile/{{ $post->user->id }}">{{ $post->user->name }}</a>
                </div>
                <a href="/posts/{{ $post['id']}}" class="block flex-1">                          
                    <div>
                        <strong> {{ $post->title }}</strong>
                    </div>
                </a>
            </div>  
        @endforeach
    </div>
    <div>
        {{ $posts->links() }}
    </div>
    
</x-layout>