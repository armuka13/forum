<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //show user profile
    public function show(User $user){
        $id = $user->id;
        $posts = Post::where('user_id', $id);
        $comments = Comment::where('user_id', $id);
        return view('User.profile', [
            'user' => $user,
            'posts' => $posts,
            'comments' => $comments
        ]);
    }

}
