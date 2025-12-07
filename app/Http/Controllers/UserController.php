<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

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

    public function settings(){
        return view('User.settings');
    }

    public function updateProfile(Request $request){
        $attributes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        Auth::user()->update($attributes);

        return redirect('/settings')->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::min(8), 'confirmed'],
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/settings')->with('success', 'Password changed successfully');
    }

}