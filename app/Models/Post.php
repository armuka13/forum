<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    use HasFactory;

<<<<<<< HEAD
    protected $guarded = []; 

=======
>>>>>>> 3aff404677c0f5c79d07e8827f2a821a3697ef0a
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    
}