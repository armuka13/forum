<x-layout>
    <!-- Displaying the post -->
    <div class="max-w-7xl mx-auto px-4 py-8 bg-white shadow rounded-md mt-6">
<<<<<<< HEAD
        <b><h1 class="text-blue-500">{{ $post->user->name }}</h1></b>        
=======
        <b><h1>{{ $post->user->name }}</h1></b>        
>>>>>>> 3aff404677c0f5c79d07e8827f2a821a3697ef0a
        <b><h2>{{ $post->title }}</h2></b>
        <hr>
        <p>{{ $post->content }}</p>
    </div>
    <!-- Showing comments -->
     <div class="max-w-7xl mx-auto px-4 py-8 bg-white shadow rounded-md mt-6">
        @foreach ($comments as $comment)
            <div>
                <b><h3>{{ $comment->user->name }}</h3></b>
                <p>{{ $comment->content }}</p>
                <hr><br>
            </div>
        @endforeach
     </div>
</x-layout>