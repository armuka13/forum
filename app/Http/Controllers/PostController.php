<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    
    //displaying all the posts to guests and users
    public function show(){
        $posts = Post::with('user')->latest()->paginate(3);

        return view('posts.show', [
            'posts' => $posts
        ]);
    }

    //displaying a specific post
    public function expand(Post $post){
        return view('posts.post', [
            'post' => $post,
            'comments' => $post->comments()->latest()->get()
        ]);
    }

    //accessing you own posts
    public function self(){
        $id = Auth::id();
        $posts = Post::where('user_id', $id)->latest()->paginate(3);
        return view('posts.your-posts', compact('posts'));
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
    public function edit(Post $post){

        if($post->user->isNot(Auth::user())){
            abort(403);
        }
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post){
         // validate
    request()->validate([
        'title' => ['required', 'min:3'], 
        'content' => ['required']
    ]);
    // update the post
    $post->update([
        'title' => request('title'),
        'content' => request('content')
    ]);
    

    return redirect('/posts/'. $post->id);
    }

    //Delete post
    public function destroy(Post $post){
    if($post->user->isNot(Auth::user())){
        abort(403);
    }
    
    $post->delete();
    
    return redirect('/your-posts');
}
}
