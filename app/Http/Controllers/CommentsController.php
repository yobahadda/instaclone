<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request){

        $data = request()->validate([
            'comment' => 'required',
        ]);
        $comment = new Comment();
        $post_id = $request->get('post_id');
        $comment->create([
            'body' => $data['comment'],
            'user_id' =>  auth()->user()->id,
            'post_id' =>  $post_id,

        ]);

        return redirect('/p/' .  $post_id);

    }

    public function delete($id)
    {

        Comment::find($id)->delete();

      return redirect()->back();;;

    }

}
