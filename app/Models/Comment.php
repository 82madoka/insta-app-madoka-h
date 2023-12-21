<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // to get the owner of the comment
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    //to get all of the comment of a post
    public function comments(){
        return $this->hasMany(Comment::class)->withTrashed();
    }
}
