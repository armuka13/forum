<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create(){
        return view('posts.create');
    }
    
    //storing a post in database
    public function store(){
        $id = Auth::id();
        
        request()->validate([
            'title' => ['required', 'min:3'], 
            'content' => ['required']
        ]);

        Post::create([
            'title' => request('title'),
            'content' => request('content'),
            'user_id' => $id
        ]);
        return redirect('/posts');
    }
    //editing and updating a post

}
