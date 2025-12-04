<x-layout>
    <!-- Displaying the post -->
    <div class="max-w-7xl mx-auto px-4 py-8 bg-white shadow rounded-md mt-6">
        <b><h1 class="text-blue-500">{{ $post->user->name }}</h1></b>        
        <b><h2>{{ $post->title }}</h2></b>
        <hr>
        <p>{{ $post->content }}</p>
    </div>
    <!-- Showing comments -->
     <div class="max-w-7xl mx-auto px-4 py-8 bg-white shadow rounded-md mt-6" >
        <!-- Posting a comment -->
        @auth
            <div class="max-w-2xl mx-auto px-4 py-6">
                <form class="flex items-start space-x-3" method="POST" action="">
                    @csrf
                    <!-- Textarea -->
                    <div class="flex-1 min-w-0">
                    <div class="relative">
                        <textarea
                        rows="1"
                        name="content"
                        placeholder="Add a comment..."
                        class="w-full resize-none bg-white text-sm text-gray-900 placeholder-gray-400
                                outline-none border-0 pb-3 pl-5 pr-12 pt-3
                                leading-relaxed overflow-hidden
                                shadow-lg rounded-xl
                                min-h-12 max-h-32
                                scrollbar-hide"
                        style="height: 48px;"
                        oninput="autoGrow(this);
                                togglePostButton(this);"
                        ></textarea>
                    </div>
                    </div>

                    <!-- Post button (always visible, ↑ arrow) -->
                    <div class="flex items-center">
                    <button id="postBtn"
                            type="submit"
                            class="mt-1 text-white font-bold text-3xl bg-blue-500 transition-all duration-200 opacity-80 hover:opacity-100">
                        &nbsp↑&nbsp 
                    </button>
                    </div>
                </form>
                </div>
            <br><br>
        @endauth
        @foreach ($comments as $comment)
            <div>
                <b><h3>{{ $comment->user->name }}</h3></b>
                <p>{{ $comment->content }}</p>
                <hr><br>
            </div>
        @endforeach
     </div>
</x-layout>
<script>
  function autoGrow(textarea) {
    textarea.style.height = 'auto';                    // Reset height
    textarea.style.height = textarea.scrollHeight + 'px'; // Set to content height
  }

  function togglePostButton(textarea) {
    const postBtn = document.getElementById('postBtn');
    if (textarea.value.trim().length > 0) {
      postBtn.classList.remove('opacity-80');
      postBtn.classList.add('opacity-100');
    } else {
      postBtn.classList.remove('opacity-100');
      postBtn.classList.add('opacity-80');
    }
  }

  // Optional: Run on page load in case of pre-filled value
  document.querySelector('textarea').dispatchEvent(new Event('input'));
</script>

<style>
  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }
</style>