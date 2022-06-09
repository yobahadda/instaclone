<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use DB;

class LikesController extends Controller

{

    public function store(Request $request){

        $post_id = $request->get('post_id');
        $user =  auth()->user();


        $table = DB::table('likes');

        $dislike = $table->where( 'user_id' , $user->id)->where('post_id' , $post_id)->value('is_dislike');

        if ($dislike == 1 ) $dislike = 0;
        else $dislike = 1;

        $table->updateOrInsert([ 'user_id' =>  $user->id ,'post_id' =>  $post_id ], [
            'user_id' => $user->id,
            'post_id'=> $post_id,
            'is_dislike'=> $dislike,
        ]);



        return redirect()->back();
    }

}


