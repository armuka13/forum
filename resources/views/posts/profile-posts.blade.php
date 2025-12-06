<x-layout>
    <div>
        @foreach ($posts as $post)
            <div class="bg-white px-4 py-6 border border-gray-200 rounded-lg mb-4 flex items-center justify-between">
                <a href="/posts/{{ $post->id }}" class="block flex-1">
                    <div class="font-bold text-blue-500">
                        {{ $post->user->name }}
                    </div>            
                    <div>
                        <strong>{{ $post->title }}</strong>
                    </div>
                </a>
                <div class="ml-4">
                    @csrf
                    @can('edit', $post)
                    <form action="/posts/{{ $post->id }}/edit" method="GET" class="inline">
                        <button type="submit"
                            class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-black
                                    hover:bg-indigo-600
                                    active:bg-indigo-700
                                    focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            Edit
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
        @endforeach
        {{ $posts->links() }}
    </div>
</x-layout>