
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

                        <div class="fw-bold d-flex  justify-content-between " style="width: 70%">

                                <a  class="text-decoration-none" href=/profile/{{$post->user->id}}><span class="text-dark">{{$post->user->username}}</span></a>

                                @if($post->user_id != auth()->user()->id)
                                    <follow-button user-id="{{ $post->user->id }}" follows="{{ $post->user->follows() }}"></follow-button>
                                @else

                                    <form action="/p/delete/{{$post->id}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <button class="deleteButton"> <svg class="deleteSvg" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.7929 7.49998L1.14645 1.85353L1.85356 1.14642L7.50001 6.79287L13.1465 1.14642L13.8536 1.85353L8.20711 7.49998L13.8536 13.1464L13.1465 13.8535L7.50001 8.20708L1.85356 13.8535L1.14645 13.1464L6.7929 7.49998Z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif





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
                <div style="overflow-y: auto ;max-height: 400px;"  >
                    @foreach($post->comments as $comment)
                        <div class="d-flex align-items-center">
                            <div class="pe-3 pb-3">
                                <img class="rounded-circle w-100" src="{{$comment->user->profile->profileImage()}}" alt="" style="max-width: 40px">
                            </div>

                            <div class="d-flex align-items-baseline">
                                <p  style="width: 270px; overflow-wrap: break-word;" class="pe-2 "><strong>{{$comment->user->username}} </strong>{{$comment->body}}</p>


                                @if($comment->user_id == auth()->user()->id)
                                    <form action="/c/delete/{{$comment->id}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                     <button class="deleteButton"> <svg class="deleteSvg" width="15px" height="15px" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M6.7929 7.49998L1.14645 1.85353L1.85356 1.14642L7.50001 6.79287L13.1465 1.14642L13.8536 1.85353L8.20711 7.49998L13.8536 13.1464L13.1465 13.8535L7.50001 8.20708L1.85356 13.8535L1.14645 13.1464L6.7929 7.49998Z" />
                                         </svg>
                                     </button>
                                    </form>

                                @endif

                            </div>

                        </div>

                    @endforeach
                </div>


                <x-comment-button :post="$post"/>
            </div>
        </div>
    </div>
</div>
@endsection
