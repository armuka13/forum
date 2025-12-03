<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //displaying all the posts to guests and users
    public function show(){
        $posts = Post::with('user')->latest()->paginate(3);

        return view('posts.show', [
            'posts' => $posts
        ]);
    }

    //displaying a specific job
    public function expand(Post $post){
        return view('posts.post', [
            'post' => $post,
            'comments' => $post->comments()->latest()->get()
        ]);
    }

    //creating a post

    //editing and updating a post

}
