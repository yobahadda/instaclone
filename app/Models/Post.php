<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes(){

        return $this->belongsToMany(User::class, 'likes')->withPivot('is_dislike')->withTimestamps();
    }

    public function countLikes(){
        return  Like::where('is_dislike', '0')->count();;
    }





}
