<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){

        return view('comments.create');
    }

    public function store(Post $post){

        $data = request()->validate([
            'comment' => 'required',
        ]);

        $post->comments()->create([
            'body' => $data['comment'],
            'user_id' =>  auth()->user()->id,
            'post_id' =>  $post->id,

        ]);

        return redirect('/p/' . $post->id);

    }
}
