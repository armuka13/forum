<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

//Home page
Route::get('/home', function () {
    return view('guest.home');

});

//Post routes
Route::get('/posts', [PostController::class, 'show']);
Route::get('/posts/{post}', [PostController::class, 'expand']);
Route::get('/create-post', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');

//Auth

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


//Comment routes
Route::post('/posts/{post}', [CommentController::class, 'store']);
