
@extends('layouts.app')
@section('content')
<div class="container">
    <div>
        <div class="row ps-5">
            <div class="col-3 p-5">
                <img class="rounded-circle w-100" src="{{$user->profile->profileImage()}}" alt="">
            </div>
            <div class="pt-5 col-9 ">
                <div class="d-flex justify-content-between align-baseline">

                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ $user->username }}</div>


                        <follow-button user-id="{{ $user->id }}" follows="{{ $user->follows() }}"></follow-button>
                    </div>

                    @can('update',$user->profile)
                        <a href="/p/create" >Add new post</a>
                    @endcan
                </div>

                @can('update',$user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
                @endcan
                <div class="d-flex">

                    <div class="pe-5"><strong>{{  $postCount  }}</strong> post</div>
                    <div class="pe-5"><strong>{{  $followersCount }}</strong> followers</div>
                    <div class="pe-5"><strong>{{ $followingCount }}</strong> following</div>
                </div>
                <div class="pt-4 fw-bold">{{ $user->profile->title }}</div>
                <div>{{ $user->profile->description }}</div>
                <div><a href="#"> {{ $user->profile->url }}</a></div>
            </div>
        </div>

        <!--posts -->
        <div class="row pt-5">

            @foreach($user->posts as $post)
                <div class="col-4 pb-4">
                    <a href="/p/{{$post->id}}">
                        <img class="w-100" src="/storage/{{$post -> image}}" >
                    </a>
                </div>

            @endforeach
        </div>


    </div>
</div>
@endsection
