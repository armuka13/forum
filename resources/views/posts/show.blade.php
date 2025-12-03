<x-layout>
    <div>
        @foreach ($posts as $post)
            <a href="/posts/{{ $post['id']}}" class="block bg-white px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500">
                    {{ $post->user->name }}
                </div>            
                <div>
                    <strong> {{ $post->title }}</strong>
                </div>
            </a>
        @endforeach
    </div>
    <div>
        {{ $posts->links() }}
    </div>
    
</x-layout>