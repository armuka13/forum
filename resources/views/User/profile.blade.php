<x-layout>
    <div class="w-full bg-white py-10">
        <div class="text-center">
            <div class="text-center flex flex-col items-center">
            <!-- <img 
            
                src="{{ $user->profile_picture ?? '/default-profile.png' }}" 
                alt="Profile picture"
                class="w-24 h-24 rounded-full object-cover mb-4 shadow"
            /> -->
           

            <p class="text-2xl font-bold text-gray-800 mb-2">{{ $user->name }}</p>
            <p class="text-md text-gray-600 mb-4">Posts: {{ $user->posts()->count() }}</p>
            <p class="text-md text-gray-600 mb-4">Comments: {{ $user->comments()->count() }}</p>

            <p class="text-md text-gray-600 mb-4">A member since: {{ $user->created_at->format('d-m-y') }}</p>
            <a href="/your-posts/{{ $posts->first()->user->id }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                View Posts
            </a>
        </div>
    </div>
</x-layout>