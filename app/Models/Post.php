<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function LikedBy(){
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function isLiked(){
        return $this->LikedBy->contains(auth()->user()->id);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}