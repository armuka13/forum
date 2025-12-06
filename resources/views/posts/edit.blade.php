<x-layout>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="text-center text-2xl/9 font-bold tracking-tight text-black">Edit Post</h2>
        </div>

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <form method="POST" action="/posts/{{ $post->id }}" class="space-y-6">
                @csrf
                @method('PATCH')

                <div>
                    <label for="title" class="block text-sm/6 font-medium text-black">Title</label>
                    <div class="mt-2">
                        <x-form-input id="title" type="text" name="title" value="{{ $post->title }}" required></x-form-input>
                        <x-form-error name="title" />
                    </div>
                </div>

                <div>
                    <label for="content" class="block text-sm/6 font-medium text-black">Content</label>
                    <div class="mt-2">
                        <textarea id="content" name="content" rows="6" required class="block w-full rounded-md border-0 px-3 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ $post->content }}</textarea>
                        <x-form-error name="content" />
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="flex-1 rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Update Post</button>
                </div>
            </form>

            <div class="mt-6">
                <form method="POST" action="/posts/{{ $post->id }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full rounded-md bg-red-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-red-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">Delete Post</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>