<x-layout>
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