<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }
    public function store(){
    $attributes = request()->validate([
        'name' => ['required'],
        'email' => ['required', 'email'],
        'password' => ['required', Password::min(8), 'confirmed'],
    ]);
    // Hash password explicitly to be safe
    $attributes['password'] = Hash::make($attributes['password']);
    //create the user
    $user = User::create($attributes);
    //log in 
    Auth::login($user);
    //redirect
    return redirect('/home');
}   
}
