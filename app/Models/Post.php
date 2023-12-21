<?php

namespace App\Models;

use App\Http\Controllers\CommentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //posts belongs to user
    //one to many(inverse)
    //to get the owner of the post
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    //to get the categories selected
    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);

    }

    //to get likes of posts

    public function likes(){
        return $this->hasMany(Like::class);
    }

    //to check if user already like the post
    public function isLiked(){
        return $this->likes()->where('user_id',Auth::user()->id)->exists();
    }
}
