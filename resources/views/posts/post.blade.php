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
        @guest
          <b><p class="text-red-500">LOG IN TO COMMENT</p></b>
          <br><hr>
        @endguest
        @auth
            <div>
            </div>
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
                        required  
                        oninput="autoGrow(this);
                                togglePostButton(this);"
                        ></textarea>
                    <x-form-error name="content" />

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
          <div class="mb-4" id="comment-{{ $comment->id }}">
            <div class="flex justify-between items-start">
              <div class="flex-1">
                <h3 class="font-bold">{{ $comment->user->name }}</h3>

                <!-- Display mode -->
                <div id="comment-display-{{ $comment->id }}" class="mt-1">
                  <p class="comment-content">{{ $comment->content }}</p>
                </div>

                <!-- Edit mode (hidden) -->
                <div id="comment-edit-{{ $comment->id }}" class="mt-1 hidden">
                  <form method="POST" action="/comments/{{ $comment->id }}">
                    @csrf
                    @method('PUT')
                    <textarea name="content" rows="3" class="w-full border rounded p-2" required>{{ $comment->content }}</textarea>
                    <div class="mt-2 flex gap-2">
                      <button type="submit" class="px-3 py-1 bg-green-600 text-white rounded">Save</button>
                      <button type="button" onclick="closeEdit({{ $comment->id }})" class="px-3 py-1 bg-gray-200 rounded">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>

              @auth
                @if(auth()->id() === $comment->user_id)
                  <div class="flex items-start gap-3 ml-4">
                    <button type="button" onclick="openEdit({{ $comment->id }})" class="text-sm text-indigo-600 hover:underline">Edit</button>
                    <form method="POST" action="/comments/{{ $comment->id }}" class="inline m-0">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-sm text-red-600 hover:underline" onclick="return confirm('Delete this comment?')">Delete</button>
                    </form>
                  </div>
                @endif
              @endauth
            </div>
            <hr class="my-3">
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

<script>
  function openEdit(id){
    document.getElementById('comment-display-' + id).classList.add('hidden');
    document.getElementById('comment-edit-' + id).classList.remove('hidden');
    const textarea = document.querySelector('#comment-edit-' + id + ' textarea');
    if(textarea) textarea.focus();
  }

  function closeEdit(id){
    document.getElementById('comment-edit-' + id).classList.add('hidden');
    document.getElementById('comment-display-' + id).classList.remove('hidden');
  }
</script>