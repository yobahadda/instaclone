
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
               <img class="w-100" src="/storage/{{$post->image}}" alt="">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pe-3">
                        <img class="rounded-circle w-100" src="{{ $post->user->profile->profileImage()}}" alt="" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="fw-bold d-flex">
                            <a  class="text-decoration-none" href=/profile/{{$post->user->id}}><span class="text-dark">{{$post->user->username}}</span></a>
                            <follow-button user-id="{{ $post->user->id }}" follows="{{ $post->user->follows() }}"></follow-button>
                        </div>
                    </div>
                </div>
                    <hr>
                    <p>
                        <span class="fw-bold">
                            <a class="text-decoration-none" href=/profile/{{$post->user->id}}>
                                <span class="text-dark">{{$post->user->username}}
                                </span>
                            </a>
                        </span>
                        {{$post->caption}}
                    </p>
                    <hr>
                    @foreach($post->comments as $comment)
                        <div class="d-flex align-items-center">
                            <div class="pe-3 pb-3">
                                <img class="rounded-circle w-100" src="{{$comment->user->profile->profileImage()}}" alt="" style="max-width: 40px">
                            </div>

                                <p class="fw-bold pe-2"> {{$comment->user->username}} :</p>
                                <p> {{$comment->body}}</p>

                        </div>

                    @endforeach

                <x-comment-button :post="$post"/>
            </div>
        </div>
    </div>
</div>
@endsection
