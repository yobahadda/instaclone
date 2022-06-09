<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    //


    public function index(User $user,Request $request)
    {


        $postCount = Cache::remember('count.posts.'. $user->id,
            now()->addSecond(30),

            function () use ($user){
            return $user->posts->count();
        });

        $followersCount = Cache::remember('count.followers.'. $user->id,
            now()->addSecond(30),

            function () use ($user){
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember('count.following.'. $user->id,
            now()->addSecond(30),
            function () use ($user){
                return $user->following->count();
            });

        return view('profiles/index',compact('user','postCount','followersCount','followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);

        return view('profiles/.edit',compact('user'));

    }

    public function update(User $user)
    {
        $this->authorize('update',$user->profile);

      $data = request()->validate([
          'title' => 'required',
          'description' => 'required',
          'url' => 'nullable|url',
          'image' => '',
      ]);


        if(request('image'))
        {
            $imagePath = request('image')->store('profile','public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();


            $imageArray =   [
                'image' => $imagePath,
            ];
        }


        auth()->user()->profile->update(array_merge(

            $data ,
          $imageArray ?? [],
        ));

        return redirect("/profile/{$user->id}");
    }

    public function search(Request $request)
    {
        $username = $request->get('searchname');

        $user  = User::query()
            ->where('username', 'LIKE', "%$username%")
            ->orwhere('username', $username)
            ->get()->first();

        if($user){
            return redirect("/profile/{$user->id}");
        }

        else return redirect()->back();

    }


}
