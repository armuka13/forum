<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Change this method to a property so Eloquent recognizes it
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts()
        {
            return $this->hasMany(Post::class);
        }
    
    public function comments()
        {
            return $this->hasMany(Comment::class);
        }
    
}
