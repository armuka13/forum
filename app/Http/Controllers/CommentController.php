<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //store the comment and link it to the post
    public function store(Post $post){
        $id = Auth::id();
        $redirect_id = $post->id;
        
        request()->validate([
            'content' => ['required']
        ]);

        Comment::create([
            'content' => request('content'),
            'user_id' => $id,
            'post_id' => $post->id
        ]);
        return redirect("/posts/{$post->id}");
    }

    // update an existing comment (owner only)
    public function update(Request $request, Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            abort(403);
        }

        $request->validate([
            'content' => ['required']
        ]);

        $comment->update([
            'content' => $request->input('content'),
        ]);

        return redirect("/posts/{$comment->post_id}");
    }

    // delete a comment (owner only)
    public function destroy(Comment $comment)
    {
        if (Auth::id() !== $comment->user_id) {
            abort(403);
        }

        $postId = $comment->post_id;
        $comment->delete();

        return redirect("/posts/{$postId}");
    }
}
